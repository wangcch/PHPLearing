<?php require_once 'functions.php'?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="adduser.html">add user</a>
<table style='text-align: left;' border='1'>
    <tr><th>ID</th><th>NAME</th><th>AGE</th><th>EDIT</th><th>DELETE</th></tr>
<?php
$conn = connectDb();
mysql_select_db('demo');
$result =  mysql_query("SELECT * FROM users ORDER BY id ASC ");//ASC 升序  DESC 降序
$dataCount = mysql_num_rows($result);

for($i=0;$i<$dataCount;$i++){
    $result_arr = mysql_fetch_assoc($result);
    $id = $result_arr['id'];
    $name = $result_arr['name'];
    $age = $result_arr['age'];
    echo "<tr><td>$id</td><td>$name</td><td>$age</td><td><a href='edituser.php?id=$id'>edit</a></td><td><a href='deleteuser.php?id=$id'>delete</a></td></tr>";
}

?>
</table>
</body>
</html>