<?php
	
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$from = 'Contact Form';
		$to = 'speicj@rpi.edu';
		$subject = "Contact Form $name";

		$body = "From: $name, $email\n Message:\n $message";

		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}

		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}

		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}

		if(!$errName && !$errEmail && !$errMessage) {
			if (mail ($to, $subject, $body, $from)) {
				$result='<div class="alert alert-success">Thank you!</div>';
			}
			else {
				$result='<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again.</div>';
			}
		}
	}

?>

<!DOCTYPE html>

<html>
	<head>
		<title>
			Jacob Speicher
		</title>
		<link rel="stylesheet" type="text/css" href="main_style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	</head>

	<body>

		<header class="container">
			<div class="row">
				<h1 class="col-sm-12">
					<a class="title_link" href="index.html"> 
						Jacob Speicher
					</a>
				</h1>

				<nav class="col-sm-12">
					<p>
						<a class="btn btn-primary" target="_blank" href="https://github.com/jacobspeicher" role="button">
							GitHub
						</a>
					</p>
					<p>
						<a class="btn btn-primary" href="#" role="button">
							Blog
						</a>
					</p>
					<p>
						<a class="btn btn-primary" href="resume.html" role="button">
							Résumé
						</a>
					</p>
					<p>
						<a class="btn btn-primary" href="contact.html" role="button">
							Contact
						</a>
					</p>
				</nav>
			</div>
		</header>
		
		<section class="container">
			<div class="row">

				<form class="form-horizontal" role="form" method="post" action="contact.php">
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="name" name="name" placeholder="First and Last Name" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email</label>
						<div class="col-sm-4">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="message" class="col-sm-4 control-label">Message</label>
						<div class="col-sm-4">
							<textarea class="form-control" rows="4" name="message" id="message"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-4">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-4">
						</div>
					</div>
				</form>

			</div>
		</section>
		

		<footer class="container">
			<div class="row">
				<p class="col-sm-4">
					&copy Jacob Speicher 2016
				</p>
			</div>
		</footer>
	</body>
</html>