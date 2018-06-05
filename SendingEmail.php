<?php
//mail ('truongtuan829@gmail.com', 'Testing', 'this is just a test to check localhost email', 'From: truongtuan829@gmial.com');

$emailTo = "truongtuan829@gmail.com";
$subject = "testing";
$body = "lest check its working or not";
$hesders = "From: truongtuan829@gmail.com";
if (mail($emailTo, $subject, $body, $hesders)) {
	echo 'Mail sent successfully!';
} else {
	echo 'Mail not send';
}
?>