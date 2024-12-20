<?php
class user extends Controller{
    public function profile(){
        self::view('profile');
    }
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
                                window.location = 'http://localhost/Black-Aries-Project/user/code';
                            </script>
                        <?php
                    }else{
                        ?>
                            <script type="text/javascript">
                                window.location = 'http://localhost/Black-Aries-Project/user/forgetPassword&&act=error';
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
                            window.location = 'http://localhost/Black-Aries-Project/user/code&&act=error';
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
                            window.location = 'http://localhost/Black-Aries-Project/login';
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
        self::view('fogotPassword',$data);
    }
    public function code(){
        //data2
        $data['check']=2;
        self::view('fogotPassword',$data);
        if(isset($_GET['act'])&&$_GET['act']=="error"){
            ?>
                <script type="text/javascript">
                    alert("Please enter correct code");
                </script>
            <?php
        }
    }
}
?>