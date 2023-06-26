<?php
header('Content-Type: application/json; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$data = file_get_contents("php://input");
$request = json_decode($data);

$name = $request->name;
$subject = $request->subject;
$email = $request->email;
$message = $request->message;

$mail = new PHPMailer();


// $mail->IsSMTP();
// $mail->Mailer = "smtp";
// $mail->SMTPDebug  = 3;
// $mail->SMTPAuth   = TRUE;
// $mail->SMTPSecure = "tls";
// $mail->Port       = 587;
// $mail->Host       = "smtp.gmail.com";
// $mail->Username   = "dharmitan88@gmail.com";
// $mail->Password   = "qsrbotylksltwxka";
// // $mail->Host       = "alliedinfosoft.com";
// // $mail->Username   = "satyam@alliedinfosoft.com";
// // $mail->Password   = "Satyam@Allied";
// $mail->SMTPOptions = array(
// 	'ssl' => array(
// 		'verify_peer' => false,
// 		'verify_peer_name' => false,
// 		'allow_self_signed' => true
// 	)
// );
// $mail->IsHTML(true);

//SMTP configuration
$mail->isSMTP();
$mail->Mailer = 'smtp';
$mail->Host = 'alliedinfosoft.com';
$mail->SMTPAuth = true;
$mail->Username = 'satyam@alliedinfosoft.com';
$mail->Password = 'Satyam@Allied';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true,
	),
);
$mail->setFrom('satyam@alliedinfosoft.com', 'ADMIN');

// Add a recipient
$mail->addAddress('satyam@alliedinfosoft.com');

// Email subject
$mail->Subject = 'Contact Detail';

// Set email format to HTML
$mail->isHTML(true);
$mail->AddAddress("viralsvideostudios@gmail.com");
$mail->SetFrom("satyam@alliedinfosoft.com");
$mail->Subject = "Contact Detail";
$mail->Body = "<html><head><style>
			.bordr{border-top: 0.3px solid lightgray; padding-top:12px; margin:8px;}
			h1{margin:10px;text-transform:uppercase; color:#0D2B4C}
			p,h3{padding:4px; margin:0;}
			h3{color: #0D2B4C;}
			</style></head>
			<body style='background:rgba(77, 186, 47, 0.2); padding:3%; text-align: center'>
				<table role='presentation' align='center' border='0' cellspacing='0' cellpadding='0' width='100%' style='table-layout:fixed'>
					<tbody> 
						<tr> 
							<center style='width:100%;'>
								<table role='presentation' cellspacing='5' cellpadding='0' width='515' style='background-color:#ffff;margin:0 auto;padding:2.5%;max-width:515px;width:inherit'> 
									<tbody>
										<tr>
											<th colspan='2'><img src='https://www.freepnglogos.com/uploads/email-png/email-logo-communications-brands-and-logotypes-gmail-14.png' height='60px' width='auto'></th>
										</tr>
										<tr><th colspan='2'><h1>Contact Detail</h1></th></tr>
										<tr>
											<td width='20%'><h3>Name:</h3></td>
											<td><p>".$name."</p></td>
										</tr>
										<tr>
											<td><h3>Email:</h3></td>
											<td><p>".$email."</p></td>
										</tr>
										<tr>
											<td><h3>Subject:</h3></td>
											<td><p>".$subject."</p></td>
										</tr>
										<tr>
											<td style='vertical-align:top;'><h3>Message:</h3></td>
											<td><p>".$message."</p></td>
										</tr>
									</tbody>
								</table>
							</center>
						</tr>
					</tbody>
				</table>
			</body>
			</html>";
			
if ($mail->send()) {
	$response = array("message" => "success");
	echo json_encode($response);
} else {
	$response = array("message" => "fail");
	echo json_encode($response);
}
