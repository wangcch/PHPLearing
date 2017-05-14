<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 14:19
 */
require_once '../config.php';

$sql = "SELECT id,name,age FROM users";
$mysqli_result = $mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
    while($row = $mysqli_result->fetch_assoc()){
        $rows[] = $row;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user list</title>
</head>
<body>
<h1>用户列表</h1><a href="adduser.php">添加用户</a>
<table border="1">
    <tr>
        <td>ID</td>
        <td>NAME</td>
        <td>AGE</td>
        <td>EDIT</td>
    </tr>
    <?php foreach ($rows as $row):?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><a href="update.php?id=<?php echo $row['id']?>">update</a>|<a href="doAction.php?act=delUser&id=<?php echo $row['id']?>">delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
