<?php
if(isset($_POST['submit'])) 
{

$name= .$_POST['name'];
$cName= .$_POST['cName'];
$gender= .$_POST['sex'];
$abilities = implode(', ', $_POST['group1']);
$secondaries = implode(', ', $_POST['group2']);

    require "phpmailer/class.phpmailer.php"; //include phpmailer class
      
    // Instantiate Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization 
    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection  
    $mail->Host = 'smtp.gmail.com';  //Gmail SMTP server address
    $mail->Port = 587;  //Gmail SMTP port
    
    // Authentication  
    $mail->Username   = 'danelerhostcrexcum@gmail.com'; // Your full Gmail address
    $mail->Password   = 'Daneler4'; // Your Gmail password

    $mail->From = 'danelerhostcrexcum@gmail.com';
    $mail->addAddress("danelerhostcrexcum@gmail.com"); // Where to send it - Recipient
	$mail->addBCC('email'); // Where to send blind carbon copy

	$mail->isHTML(true);
	
    $mail->Subject = 'New Character';      // Subject (which isn't required)
	$mail->Body     = '<html><body>
                                    <table>
                                    <tr><td><strong>Name:</strong> </td><td>' .$name. '</td></tr>
                                    <tr><td><strong>Character name:</strong> </td><td>' .$cName. '</td></tr>
                                    <tr><td><strong>Gender:</strong> </td><td>' .$gender. '</td></tr>
                                    <tr><td><strong>Abilities:</strong> </td><td>' .$abilities. '</td></tr>
									<tr><td><strong></strong> </td><td>' .$secondaries. '</td></tr>
                                    </table>
                                    </body></html>';
    $result = $mail->Send();		// Send!  
	$message = $result ? 'Successfully Sent!' : 'Sending Failed!';      
	unset($mail);
    
}
?>