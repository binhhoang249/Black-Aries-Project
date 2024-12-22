<?php
class userController extends Controller{
    //Profile //////////////////////////////////////////////////////////////////////////////////
    public function profile(){
        self::view('pages/userModel/profile');
    }
    //Forgotpassword/////////////////////////////////////////////////////////////////////////////
    public function forgetPassword(){
        $model=self::model('userModel');
        if($_SERVER['REQUEST_METHOD']==="POST"){
            if(isset($_POST['con_email'])){
                $c_email=$_POST['email'];
                $liUs=$model->getUsers();
                $ob=[];
                foreach($liUs as $value){
                    if($value['email']==$c_email){
                        $ob=$value;
                        break;
                    }
                }
                if(!empty($ob)){
                    $f_user=['mail'=>$ob['email'],'user_id'=>$ob['user_id'],'fullname'=>$ob['fullname']];
                    $emailService = self::sendMail();
                    $verificationCode = $emailService->sendCode($f_user);
                    if(!empty($verificationCode)){
                        $_SESSION['fo_user']=['f_user'=>$f_user,'code'=>$verificationCode];
                        ?>
                            <script type="text/javascript">
                                window.location = 'http://localhost/Black-Aries-Project/userController/code';
                            </script>
                        <?php
                    }else{
                        ?>
                            <script type="text/javascript">
                                window.location = 'http://localhost/Black-Aries-Project/userController/forgetPassword&&act=error';
                            </script>
                        <?php
                    }
                }else{
                    ?>
                        <script type="text/javascript">
                            alert("Email isn't exited");
                        </script>
                    <?php
                    //data1
                    $data['check']=1;
                }
            }else if(isset($_POST['con_code'])){
                if($_POST['code']== $_SESSION['fo_user']['code']){
                    //data3
                    $data['check']=3;
                }else{
                    ?>
                        <script type="text/javascript">
                            window.location = 'http://localhost/Black-Aries-Project/userController/code&&act=error';
                        </script>
                    <?php
                }
            }else if(isset($_POST['change_password'])){
                $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $condi= "user_id = ".$_SESSION['fo_user']['f_user']['user_id'];
                $res=$model->setUser('Users',['password'=>$hashedPassword],$condi);
                if($res){
                    ?>
                        <script type="text/javascript">
                            window.location = 'http://localhost/Black-Aries-Project/userController/login';
                        </script>
                    <?php
                }else{
                    ?>
                        <script type="text/javascript">
                            alert("Don't update password");
                        </script>
                    <?php
                    //data 3
                    $data['check']=3;
                }
            }
        }else{
            //data1
            $data['check']=1;
            if(isset($_GET['act'])&&$_GET['act']=="error"){
                ?>
                    <script type="text/javascript">
                        alert("Please enter correct email");
                    </script>
                <?php
            }
        }

        self::view('pages/userModel/fogotPassword',$data);
    }
    public function code(){
        //data2
        $data['check']=2;
        self::view('pages/userModel/fogotPassword',$data);
        if(isset($_GET['act'])&&$_GET['act']=="error"){
            ?>
                <script type="text/javascript">
                    alert("Please enter correct code");
                </script>
            <?php
        }
    }
    //Login//////////////////////////////////////////////////////////////////////////////////////////
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model=self::model('userModel');
            $result = $model->authenticateUser ($username, $password);

            if ($result['status']) {
                // Đăng nhập thành công, có thể lưu thông tin người dùng vào session
                $_SESSION['userIDB'] = $result['user']['user_id'];
                header("Location: http://localhost/Black-Aries-Project/home"); // Chuyển hướng đến trang chính
                exit();
            } else {
                // Đăng nhập thất bại, hiển thị thông báo lỗi
                $data['error'] = $result['message'];
                self::view("pages/userModel/login", $data);
            }
        } else {
            // Hiển thị trang login
            self::view("pages/userModel/login");
        }
    }
    //Register////////////////////////////////////////////////////////////////////////////////////
    static public function register()
    {
        if($_SERVER['REQUEST_METHOD']==="POST"){
            $userData = [
                'username' => $_POST['username'] ?? null,
                'password' => $_POST['password'] ?? null,
                'fullname' => $_POST['fullname'] ?? null,
                'mail'     => $_POST['email'] ?? null,
            ];
    
            if (!self::validateData($userData)) {
                echo "Invalid data. Please check your inputs and try again.";
                return;
            }
    
            $emailService = self::sendMail();
            $verificationCode = $emailService->sendCode($userData);
            if (empty($verificationCode)) {
                echo "Failed to send verification email. Please try again later.";
                return;
            }
    
            $_SESSION['verification'] = [
                'userData' => $userData,
                'code'     => $verificationCode,
            ];
            ?>
                <script type="text/javascript">
                    window.location = 'http://localhost/Black-Aries-Project/userController/showVerificationForm';
                </script>
            <?php
        }
        self::view('pages/userModel/register');
    }

    static public function processVerification()
    {
        $inputCode = $_POST['verification_code'] ?? null;

        if (isset($_SESSION['verification'])) {
            $sessionData = $_SESSION['verification'];
            if ($sessionData['code'] == $inputCode) {
                $userModel = self::model('userModel');
                $name = $sessionData['userData'];
                $hashedPassword = ($name['password']);

                if (!$userModel->addUser($name['username'], $name['fullname'], $name['mail'], $hashedPassword)) {
                    echo "Failed to save user data. Please try again.";
                    return;
                }

                $emailService = self::sendMail();
                if ($emailService->informRegister($sessionData['userData'])) {
                    echo "Registration successful! A confirmation email has been sent.";
                } else {
                    echo "Registration successful, but failed to send confirmation email.";
                }

                unset($_SESSION['verification']);
            } else {
                echo "Invalid verification code.";
            }
        } else {
            echo "No verification session found.";
        }
        ?>
            <script type="text/javascript">
                window.location = 'http://localhost/Black-Aries-Project/userController/login';
            </script>
        <?php
    }

    static public function showVerificationForm()
    {
        echo '
            <form method="POST" action="http://localhost/Black-Aries-Project/userController/processVerification">
                <label for="verification_code">Enter verification code:</label>
                <input type="text" id="verification_code" name="verification_code" required>
                <button type="submit">Verify</button>
            </form>
        ';
    }

    static private function validateData($data)
    {
        if (empty($data['username']) || empty($data['password']) || empty($data['fullname']) || empty($data['mail'])) {
            return false;
        }

        if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (strlen($data['password']) < 6) {
            return false;
        }

        return true;
    }
}
?>