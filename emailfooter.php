
<?php
require("class.PHPMailer.php");
require("class.smtp.php");
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  
$mail->SMTPSecure = "tls";// specify main and backup server
$mail->SMTPAuth = true;   
$mail->Port = 587;    // turn on SMTP authentication
$mail->Username = "arpitg.gupta8@gmail.com";  // SMTP username
$mail->Password = "KHOJESH9693"; // SMTP password
$mail->AddAddress("arpitg.gupta8@gmail.com", "Josh Adams");
$email = $_REQUEST['email'];
$mail->IsHTML(true); 
$mail->Body = $email."<br>"."hello";
if(!$mail->Send()) {

echo "Mailer Error: " . $mail->ErrorInfo;

} else {
/*header('Location: contact.php');  */
header('location:index.php');
}
  
?>