<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>增加学生信息</title>
    <style type="text/css">
        body{
            text-align: center;
        }
        table{
            margin:auto;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php include 'menu.php'?>
<hr>
<h3>添加信息</h3>
<form action="action.php?act=add" method="post">
    <table>
        <tr>
            <td>name:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>age:</td>
            <td><input type="text" name="age"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" value="添加">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>


</body>
</html>