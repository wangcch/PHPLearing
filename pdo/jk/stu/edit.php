<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改信息</title>
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
<?php
include 'menu.php';
require_once 'connect.php';
$id=$_GET['id'];
$sql="SELECT id,name,age FROM users WHERE id=".$id;
$stmt=$pdo->query($sql);
if ($stmt->rowCount()>0){
    $stu=$stmt->fetch(PDO::FETCH_ASSOC);
}else{
    die('没有要修改的数据');
}
?>
<hr>
<h3>修改信息</h3>
<form action="action.php?act=edit" method="post">
    <table>
        <tr>
            <td>id:</td>
            <td><input type="text" name="id" value="<?php echo $stu['id']?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>name:</td>
            <td><input type="text" name="name" value="<?php echo $stu['name']?>"></td>
        </tr>
        <tr>
            <td>age:</td>
            <td><input type="text" name="age" value="<?php echo $stu['age']?>"></td>
        </tr>

    </table>
    <input type="submit" value="修改">

</form>

</body>
</html>