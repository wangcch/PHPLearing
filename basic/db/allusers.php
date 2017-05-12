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
    <tr><th>id</th><th>name</th><th>age</th></tr>
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
    echo "<tr><td>$id</td><td>$name</td><td>$age</td></tr>";
}

?>
</table>
</body>
</html>