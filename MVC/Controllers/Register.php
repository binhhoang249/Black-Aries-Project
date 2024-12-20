<?php
class Register extends Controller
{
    static public function index()
    {
        self::view('RegisterPage');
    }

    static public function registerUser()
    {
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

        // Gửi mã xác minh qua email
        $emailService = self::sendMail();
        $verificationCode = $emailService->sendCode($userData);
        if (empty($verificationCode)) {
            echo "Failed to send verification email. Please try again later.";
            return;
        }

        // Lưu thông tin vào session để xác minh sau
        $_SESSION['verification'] = [
            'userData' => $userData,
            'code'     => $verificationCode,
        ];
        ?>
            <script type="text/javascript">
                window.location = 'http://localhost/Black-Aries-Project/Register/showVerificationForm';
            </script>
            <?php
    }

    // Hàm xử lý xác nhận mã xác minh
    static public function processVerification()
    {
        $inputCode = $_POST['verification_code'] ?? null;
        if (isset($_SESSION['verification'])) {
            $sessionData = $_SESSION['verification'];
            if ($sessionData['code'] == $inputCode) {
                $userModel = self::model('registerModel');
                $name = $sessionData['userData'];
                if (!$userModel->addUser($name['username'], $name['fullname'], $name['mail'], $name['password'])) {
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
            }
        }
        ?>
        <script type="text/javascript">
            window.location = 'http://localhost/Black-Aries-Project/login';
        </script>
        <?php
    }

    // Hàm hiển thị form nhập mã xác minh
    static public function showVerificationForm()
    {
        echo '
            <form method="POST" action="http://localhost/Black-Aries-Project/Register/processVerification">
                <label for="verification_code">Enter verification code:</label>
                <input type="text" id="verification_code" name="verification_code" required>
                <button type="submit">Verify</button>
            </form>
        ';
    }

    // Kiểm tra dữ liệu đầu vào
    static private function validateData($data)
    {
        if (empty($data['username']) || empty($data['password']) || empty($data['fullname']) || empty($data['mail'])) {
            return false;
        }

        if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
}
?>