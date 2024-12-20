<?php
// PasswordResetController.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'UserModel.php';

class PasswordResetController {
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userEmail = $_POST['email'];
            
            // Kiểm tra xem email có hợp lệ không
            if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                echo "Email không hợp lệ. Vui lòng nhập lại.";
                return;
            }

            $userModel = new UserModel();
            // Gọi phương thức checkIfEmailExists
            if ($userModel->checkIfEmailExists($userEmail)) {
                $this->sendVerificationEmail($userEmail);
            } else {
                echo "Email không tồn tại trong hệ thống. Vui lòng kiểm tra lại.";
            }
        }
    }

    private function sendVerificationEmail($userEmail) {
        $verificationCode = rand(100000, 999999); // Mã xác thực ngẫu nhiên

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hien.vo26@student.passerellesnumeriques.org';
            $mail->Password   = 'xuon tymi vduv fshu';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('hien.vo26@student.passerellesnumeriques.org', 'Black_aries');
            $mail->addAddress($userEmail);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Mã xác thực để đặt lại mật khẩu';
            $mail->Body    = "Chào bạn,<br><br>
                              Đây là mã xác thực của bạn: <strong>$verificationCode</strong><br>
                              Vui lòng nhập mã này để đặt lại mật khẩu.<br><br>
                              Nếu bạn không yêu cầu, vui lòng bỏ qua email này.";

            $mail->send();
            session_start();
            $_SESSION['verification_code'] = $verificationCode;

            header("Location: verify-code.php?email=$userEmail");
            exit;
        } catch (Exception $e) {
            echo "Không thể gửi email: {$mail->ErrorInfo}";
        }
    }
}
?>