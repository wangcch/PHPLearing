<?php require_once 'functions.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 13:18
 */

//if (isset($_GET['id'])&&!empty($_GET['id']))

if(!empty($_GET['id'])){
    connectDb();
    $id = intval($_GET['id']);
    $result = mysql_query("SELECT * FROM users WHERE id = $id");
    if(mysql_errno()){
        die('can not connect db');
    }
    $arr = mysql_fetch_assoc($result);
//    print_r($arr);

}else{
    die('id not define');
}
?>

<form action="edituser_server.php" method="post">
    <input type="text" name="id" value="<?php echo $arr['id']?>" readonly><br>
    <input type="text" name="name" value="<?php echo $arr['name']?>"><br>
    <input type="text" name="age" value="<?php echo $arr['age']?>"><br>
    <input type="submit">
</form>


</body>
</html>

