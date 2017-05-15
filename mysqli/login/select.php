<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/15
 * Time: 0:03
 *
 * 预处理语句执行查询语句
 */

require_once 'insert/include.php';

$sql = "SELECT id,name,age FROM users WHERE id>=?";
$mysqli_stmt = $mysqli->prepare($sql);
$id=1;
$mysqli_stmt->bind_param('i',$id);
if($mysqli_stmt->execute()){
    $mysqli_stmt->bind_result($id,$name,$age);
    while($mysqli_stmt->fetch()) {
        echo 'id:' . $id . '<br>';
        echo 'name:' . $name . '<br>';
        echo 'age:' . $age;
        echo '<br>';
    }
}

$mysqli_stmt->free_result();
$mysqli_stmt->close();
$mysqli->close();