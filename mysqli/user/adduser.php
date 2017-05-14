<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 14:33
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add user</title>
</head>
<body>
<form action="doAction.php?act=addUser" method="post">
    <table border="1">
        <tr>
            <td>name</td>
            <td><input type="text" name="name" placeholder="name" required="required"></td>
        </tr>
        <tr>
            <td>age</td>
            <td><input type="text" name="age" placeholder="age" required="required"></td>
        </tr>
        <tr><td><input type="submit" value="提交"></td></tr>
    </table>
</form>

</body>
</html>
