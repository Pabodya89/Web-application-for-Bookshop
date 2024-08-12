<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" assets/css/login1.css">
    <link rel="stylesheet" href=" assets/images/Books-1.webp">
    <title>Forgot_Password</title>
</head>
<body>
<body class="back-colr" >
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-title"></div>
                    <h3>Reset Password</h3>
                    <div class="body"></div>

                    <form method="post" id="passwordform">
                        <label>Email Address</label>
                        <input type="emailone" class="emailone" placeholder="Email" name="emailone" ><br>
                        <div class="resetemail" id="resetemail">ReEnter your Email</div>
                        <input type="emailtwo" class="emailtwo" placeholder="Confirm Email" name="emailtwo" ><br>
                        <?php if (!empty($errors)) : ?>
							<span style="color: red; font-weight: bold; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; background-color: #ffe6e6;">
								<?= implode('<br>', $errors) ?>
							</span>
						<?php endif; ?>

                        <button type ="submit" class="btn-btn-primary" name="password_reset_link" >Confirm</button><br>                      
                    </form>

                    <div id="otp-popup" style="display: none;">
				<h3>Enter OTP</h3>
				<form id="otp-form">
					<input type="text" id="otp-input" placeholder="Enter OTP">
					<button type="submit">Submit</button>
				</form>
			</div>
        </div>
    </div>
</body>
