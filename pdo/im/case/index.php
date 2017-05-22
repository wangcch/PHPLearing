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
    <div id="container">
        <div id="login">
            <form action="doAction.php?act=login" method="post">
                <h1>Log in</h1>
                <p>
                    <label for="username" class="uname">Your Name</label><br>
                    <input type="text" name="username" id="username">
                </p>
                <p>
                    <label for="password" class="upassword">Password</label><br>
                    <input type="password" name="password" id="password">
                </p>
                <input type="submit" value="LOGIN">
            </form>
        </div>


        <div id="register">
            <form action="doAction.php?act=reg">
                <h1>Sign up</h1>
                <p>
                    <label for="username" class="uname">Your Name</label><br>
                    <input type="text" name="username" id="username">
                </p>
                <p>
                    <label for="email" class="uemail">Your Email</label><br>
                    <input type="email" name="email" id="eamil">
                </p>
                <p>
                    <label for="password" class="upassword">Password</label><br>
                    <input type="password" name="password" id="password">
                </p>
                <input type="submit" value="REGISTER">

            </form>
        </div>
    </div>
</body>
</html>