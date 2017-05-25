<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/22
 * Time: 21:45
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DEMO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a class="hiddenanchor" id="toregister"></a>
<a class="hiddenanchor" id="tologin"></a>
    <div id="container">
        <div id="login" class="animate">
            <form action="doAction.php?act=login" method="post">
                <h1>Log in</h1>
                <p>
                    <label for="username" class="uname">Your Name</label><br>
                    <input type="text" name="username" id="username" required="required">
                </p>
                <p>
                    <label for="password" class="upassword">Password</label><br>
                    <input type="password" name="password" id="password" required="required">
                </p>

                <input type="submit" class="button" value="LOGIN">
                <p>
                    <a href="#toregister">join us</a>
                </p>
            </form>
        </div>


        <div id="register" class="animate">
            <form action="doAction.php?act=reg" method="post">
                <h1>Sign up</h1>
                <p>
                    <label for="username" class="uname">Your Name</label><br>
                    <input type="text" name="username" id="username" required="required">
                </p>
                <p>
                    <label for="email" class="uemail">Your Email</label><br>
                    <input type="email" name="email" id="eamil" required="required">
                </p>
                <p>
                    <label for="password" class="upassword">Password</label><br>
                    <input type="password" name="password" id="password" required="required">
                </p>
                <input type="submit" class="button" value="REGISTER">
                <p>
                    <a href="#tologin">sign in</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
