<?php
//database connect
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'portfolio_database';

$conn = mysqli_connect($host, $user, $password, $dbname);

$username = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$usermail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
$usermessage = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
$currentDateTime = date('Y-m-d H:i:s');
    
$sql = "INSERT INTO data_table(username, usermail, usermessage, datesent) VALUES ('$username', '$usermail', '$usermessage', '$currentDateTime')";


require 'Mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                             
$mail->Username = 'iyiadeboluwatife8@gmail.com';    
$mail->Password = 'zhalxajtfkgohzrz';               
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                    

$mail->setFrom('iyiadeboluwatife8@gmail.com', 'Boluwatife');
$mail->addAddress($usermail, 'User');    
$mail->isHTML(true);                        

$mail->Subject = 'Thank you for reaching out!';
$mail->Body    = "Hi " . htmlspecialchars($username) . ",<br> Thank you for getting in touch through my portfolio! I’ve received your message and will get back to you as soon as possible.<br>

In the meantime, feel free to explore more of my works.<br> I’m excited to connect and discuss how I can help with your project or answer any questions you may have.<br>

Best regards,<br>
Iyiade boluwatife.";
$mail->AltBody = "Hi " . htmlspecialchars($username) . ",<br> Thank you for getting in touch through my portfolio! I’ve received your message and will get back to you as soon as possible.<br>

In the meantime, feel free to explore more of my works.<br> I’m excited to connect and discuss how I can help with your project or answer any questions you may have.<br>

Best regards,<br>
Iyiade boluwatife.";
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    header("Location:../error.html");
} else {
    echo 'Message has been sent';
    mysqli_query($conn, $sql);
    header("Location:../confirmation.html");
}

mysqli_close($conn)
?>