<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/14
 * Time: 21:28
 */
require_once 'include.php';

$sql = "SELECT id,username,password FROM user";
$mysqli_result = $mysqli->query($sql);

if ($mysqli_result && $mysqli_result->num_rows>0){
    while($row = $mysqli_result->fetch_assoc()){
        $rows[]=$row;
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
<a href="insert.php">adduser</a>
<table border="1">
    <tr>
        <td>id</td>
        <td>username</td>
        <td>password</td>
    </tr>
    <?php foreach ($rows as $row):?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['password'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
