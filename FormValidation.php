<?php
// Initialize variables to null.
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";

// On submit form, below function will execute.
// Submit Scope starts from here.
if (isset($_POST['submit'])) {
	if (empty($_POST['name'])) {
		$NameError = "Name is required";
	} else {
		$Name = Test_User_Input($_POST['name']);

		// check Name only contains letters and whitespace.
		if (!preg_match("/^[A-Za-z\. ]*$/", $Name)) {
			$NameError = "Only Letters and white sapace are allowed";
		}
	}

	if (empty($_POST['email'])) {
		$EmailError = "Email is required";
	} else {
		$Email = Test_User_Input($_POST['email']);

		// check if e-mail address syntax is valid or not
		if (!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email)) {
			$EmailError = "Invalid Email Format";
		}
	}

	if (empty($_POST['gender'])) {
		$GenderError= "Gender is required";
	} else {
		$Gender = Test_User_Input($_POST['gender']);		
	}

	if (empty($_POST['website'])) {
		$WebsiteError= "Website is required";
	} else {
		$Website = Test_User_Input($_POST['website']);

		// check Website address syntax is valid or not
		if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $Website)) {
			$WebsiteError = "Invalid Webside Address Format";
		}
	}

	if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['website'])) {
		if ((preg_match("/^[A-Za-z\. ]*$/", $Name) == true) && (preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email) == true) && (preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $Website)== true)) {
			echo "<h2>Your Submit Information</h2> <br>";
			echo "Name:".ucwords ($_POST["name"])."<br>";
			echo "Email: {$_POST["email"]}<br>";
			echo "Gender: {$_POST["gender"]}<br>";
			echo "Website: {$_POST["website"]}<br>";
			echo "Comments: {$_POST["comment"]}<br>";

			$emailTo = "truongtuan829@gmail.com";
			$subject = "testing";
			$body = "A person name : ". $_POST['name']. "With the Email : ". $_POST['email']. "have Gender : " . $_POST['gender']. "have website of : ". $_POST['website']. "Added Comment :: ". $_POST['comment'];	
			$hesders = "From: truongtuan829@gmail.com";
			if (mail($emailTo, $subject, $body, $hesders)) {
				echo 'Mail sent successfully!';
			} else {
				echo 'Mail not send';
			}


		} else {
			echo '<span class="error">* Please Complete & Correct your Form & Try Again *</span>';
		}
	}
}
function Test_User_Input ($data) {
	return $data;
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style type="text/css">
	input[type = "text"], input[type = "email"], textarea {
		border: 1px solid dashed;
		background-color: rgb(221, 216, 212);
		width: 600px;
		padding: .5em;
		font-size: 1.0em;
	}

	.error {
		color: red;
	}
</style>

<body>
	<h2>Form Validation with php</h2>
	<form action="FormValidation.php" method="post">
		<legend>* Please Fill Out the following Fields. </legend>
		<fieldset>
			Name: <br>
			<input type="text" name="name"> <span class="error">* <?php echo $NameError; ?> </span> <br> 
			<br>
			E-mail: <br>
			<input type="text" name="email"> <span class="error">* <?php echo $EmailError; ?> </span> <br>
			<br>
			Gender: <br>
			<input type="radio" name="gender" value="Female"> Female
			<input type="radio" name="gender" value="Male"> Male  <span class="error">* <?php echo $GenderError; ?> </span> <br>
			<br>
			Website: <br>
			<input type="text" name="website"> <span class="error"> <?php echo $WebsiteError; ?> </span>* <br>
			<br>
			Comment: <br>
			<textarea name="comment" id="" cols="30" rows="10">
				
			</textarea> <br>
			<br>
			<input type="submit" name="submit" value="Submited">
		</fieldset>
	</form>
</body>
</html>