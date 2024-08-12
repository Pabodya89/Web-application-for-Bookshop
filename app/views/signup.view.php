<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" assets/css/login1.css">
    <link rel="stylesheet" href=" assets/images/Books-1.webp">
    <title>Login</title>
</head>
<body>
<body class="back-colr" >
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-title"></div>
                    <h3>Sign Up</h3>
                    <div class="body"></div>

                    <form method="post" id="passwordform">
                        <label for="name">Username</label>
                        <input type="text" class="form" placeholder="Username" name="username" id ="username"><br>

                        <label for="email">Email</label>
                        <input type="email" class="form" placeholder="Email" name="email1" id ="email"><br>

                        <label for="password">Password</label>
                        <input type="password" class="form" placeholder="Password" name="password1" id = "password1"><br>
                        
                        <label for="password">Confirm password</label>
                        <input type="password" class="form" placeholder="Confirm Password" name="password2" id = "password2"><br>

                        <button type="submit" class="submit">Sign Up</button>              
                    </form>

                    <div id="message"> <div class="asklogin">Are you're already have Acoount?
                    <a href="<?=ROOT?>/Login">Login</a><br>

                    <?php
                        if(isset($data['error']))
                        {?>
                            <br><div class="error">*<?= $data['error']; ?></div>
                    <?php }
                     ?>
                </div>
            </div>
        </div>
    </div>
<script src="assets/js/log.js"></script>
</body>
