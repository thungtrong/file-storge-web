<?php
    session_start();
    if (isset($_SESSION['Login'])){
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HOME</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- link file JS -->
        <link rel="stylesheet" href="CSS/1.css">
        <script src="JS/jquery-3.4.1.min.js"></script>
        <script src="JS/login.js"></script>
        <!-- Link thư viện để dùng icon -->
        <script src="JS/290545dfed.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- form đăng ký -->
        <div class="signup" id="signup">
            <div class="top-header">
                <h2>Sign Up</h2>
            </div>
            <form action="" method="POST" class="signup-input">
                <input class='TKsignup' type="text" name="TaiKhoan" placeholder="User Name">
                <input class='FullName' type="text" name="FullName" placeholder="Your Full Name">
                <input class='Emailsignup' type="text" name="Email" placeholder="Your email">
                <input class='MKsignup' type="password" name="MatKhau" placeholder="Password">
                <input class='RepeatMK' type="password" name="XMatKhau" placeholder="Repeat Password">
                <p class="alertSU"></p>
                <input type="submit" name="Signup" value="Submit" class="SubmitDK">
            </form>
            <!-- <div class="bottom-header">
                <h3>OR</h3>
            </div> -->
            <!-- Icon link mang xa hoi -->
            <!-- <div class="social-link">
                <ul>
                
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                </ul>
            </div> -->
            <div class="bottom-text">
                <h4>
                    Have account yet?
                    <a id='toSignIn' href="#">Sign In</a>
                </h4>
            </div>
        </div>

        <!-- form đăng nhập -->
        <div class="login">
            <div class="top-header">
                <h2>sign in</h2>
            </div>
            <form action="" method="POST" class="login-input">
                <input class="TK" type="text" name="TaiKhoan" placeholder="Email or SĐT">
                <input class="MK" type="password" name="MatKhau" placeholder="Password">
                <p class="alert"></p>
                <input type="submit" name="Login" value="Submit" class="submitDN">
            </form>
            <!-- <div class="bottom-header">
                <h3>OR</h3>
            </div> -->
            <!-- Icon link mang xa hoi -->
            <!-- <div class="social-link">
                <ul>
                   
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                </ul>
            </div> -->

            <div class="bottom-text">
                <p>
                    No account yet?
                    <a href="#">Sign Up</a>
                </p>
                <h4>
                    <a href="#">Forgot your password?</a>
                </h4>
            </div>
        </div>
        
</body></html>