
<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "pmc_global";

$email = $_REQUEST['email'];
$name=$_REQUEST['name'];
$cnumber=$_REQUEST['cnumber'];
$subject="PMC GLOBAL";
$message = $_REQUEST['message'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "INSERT INTO contact(name, email, mobile, message)
VALUES ('$name', '$email', $cnumber, '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



<?php



require("PHPMailer-master/class.phpmailer.php");
require("PHPMailer-master/class.smtp.php");
require("PHPMailer-master/PHPMailerAutoload.php");

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl';// secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587urn on SMTP authentication
$mail->Username = "aritg.gupta8@gmail.com";  // SMTP username
$mail->Password = "xyzabc123"; // SMTP password
$mail->AddAddress("arpitg.gupta8@gmail.com", "Josh Adams");
$email = $_REQUEST['email'];
$name=$_REQUEST['name'];
$cnumber=$_REQUEST['cnumber'];
$subject="PMC GLOBAL";
$message = $_REQUEST['message'];
$mail->From = $email;
$mail->FromName =$name;
$mail->IsHTML(true); 
$mail->Subject = $subject;
$mail->Body = $email."<br>".$name."<br>".$subject."<br> <b>Mobile No- </b> ".$cnumber."<br> <b>Message</b> - <br> ".$message;
if(!$mail->Send()) {

echo "Mailer Error: " . $mail->ErrorInfo;

} else {
/*header('Location: contact.php');  */
header('location:contact.php?status=success');
}
  
?>