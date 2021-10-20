<?php
// cài đặt môi trường để sử dụng php mail ler
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// chỉnh lại đường dẫn phù hợp với phầm tổ chức thư mục( tên ở trc) phpmailer
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
function sendEmail($recipient,$code){
// Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);

// xử lý quá trình gửi email thông qua đối tượng mail
// có thể có lỗi phát sinh, dừng thực thi chương trình
try {
    
    $mail->SMTPDebug = 0;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'ngocanhsaker@gmail.com';// SMTP username
    $mail->Password = 'gkjujfbqjuyrmbyr'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    //cấu hình thuộc tính người gửi và người nhận
    $mail->setFrom('ngocanhsaker@gmail.com', 'Nguyễn Ngọc Anh -STT:05');

    $mail->addReplyTo('ngocanhsaker@gmail.com', 'Nguyễn Ngọc Anh -STT:05');
      
    $mail->addAddress($recipient); // sau này nó sẽ là biến
    
    // Attachments(đính kèm tệp tin gửi đi)
    // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
    $mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $tieude = '[Ngọc Anh] Chúc Mừng Tiến Vều được kích hoạt tk';
    $mail->Subject = $tieude;//tiêu đề mail
    
    // Mail body content 
    
    $mail->Body = 'Nhấp vào đây để kích hoạt: <a href="http://localhost/project12/activation.php?email='.$recipient.'&code='.$code.'">Nhấp vào đây</a>';
    
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if($mail->send()){
        echo 'Thư đã được gửi đi';
    }else{
        echo 'Lỗi. Thư chưa gửi được';
    }  

} catch (Exception $e) //lấy lõi ngoại lệ
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>