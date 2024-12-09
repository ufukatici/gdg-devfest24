<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../../vendor/autoload.php';

loadEnv(__DIR__ . '/../../.env');

$host = getenv('ADMIN_HOST');
$username = getenv('ADMIN_MAIL');
$password = getenv('ADMIN_PASSWD');
$port = getenv('ADMIN_PORT');

function send_email($to_email, $subject, $body, $attachment_path) {
    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "{$host}";
        $mail->SMTPAuth = true;
        $mail->Username = "{$username}";
        $mail->Password = "{$password}";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $port;

        $mail->setFrom("{$username}", 'GDG - WTM | Kutahya');
        $mail->addAddress($to_email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->addAttachment($attachment_path);

        $mail->send();
        echo "E-posta gönderildi: $to_email\n";
    } catch (Exception $e) {
        echo "E-posta gönderilemedi. Mailer Error: {$mail->ErrorInfo}\n";
    }
}
?>

