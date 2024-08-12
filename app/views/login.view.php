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
    <!-- <img src="assets/images/Books-1.webp" alt="Books" class="image"> -->
<body class="back-colr" style="background-image: url('assets/images/Books-1.webp'); width: 100%; height: 100vh; background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-title"></div>
                    <h3>Suraksha Login System</h3>
                    <div class="body"></div>

                    <form method="post" id="passwordform">
                        <input type="text" class="form" placeholder="Username" name="name" id ="username"><br>
                        <span id="togglePassword" class="toggle-password">&#12065;</span>
                        <input type="password" class="form" placeholder="Password" name="password" id = "password"><br>
                        <button type="submit" class="submit">Log</button><br>

                        <form action="forgotpassword" method="post">
                            <div class="links" id="forgot" >
                                <a href="<?ROOT?>/Reset" class="forgot">Forgot Your Password?</a>
                            </div>
                        </form>                        
                    </form>

                    <div id="message"> 
                        <div class="askaccount">Don't have account?
                            <a href="<?=ROOT?>/Sign_Up" class="signup">Sign Up</a>
                        </div>
                    </div>
                    <?php if(isset($data['error']))
                          { ?>
                            <br><div class="error"><?=$data['error'] ?></div>  
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
<script src="assets/js/log.js"></script>
</body>
</html>
