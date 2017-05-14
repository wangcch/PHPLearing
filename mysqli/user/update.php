<?php
require_once '../config.php';
$id = $_GET['id'];
$sql = "SELECT id,name,age FROM users WHERE id=".$id;
$mysqli_result = $mysqli->query($sql);

if($mysqli_result && $mysqli_result->num_rows>0){
    $row = $mysqli_result->fetch_assoc();
}else{
    echo 'null error';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit user</title>
</head>
<body>
<form action="doAction.php?act=editUser&id=<?php echo $id;?>" method="post">
    <table border="1">
        <tr>
            <td>name</td>
            <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
        </tr>
        <tr>
            <td>age</td>
            <td><input type="text" name="age" value="<?php echo $row['age']; ?>"></td>
        </tr>
        <tr><td><input type="submit" value="编辑"></td></tr>
    </table>
</form>

</body>
</html>