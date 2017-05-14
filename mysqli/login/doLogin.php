<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/14
 * Time: 22:47
 *
 * 预处理语句防止sql注入
 */

require_once 'insert/include.php';
$username = $_POST['username'];
$username = $mysqli->escape_string($username);
$password = md5($_POST['password']);



//$sql = "SELECT * FROM user WHERE username='{$username}' AND password='{$password}' ";
//$mysqli_result = $mysqli->query($sql);
//if($mysqli_result && $mysqli_result->num_rows>0){
//    echo 'success';
//}else{
//    echo 'failure';
//}


$sql = "SELECT * FROM user WHERE username=? AND password=?";
$mysqli_stmt = $mysqli->prepare($sql);
$mysqli_stmt->bind_param('ss',$username,$password);
if ($mysqli_stmt->execute()){
    $mysqli_stmt->store_result();
    if($mysqli_stmt->num_rows>0){
        echo 'success';
    }else{
        echo 'failure';
    }
}

//释放结果集
$mysqli_stmt->free_result();
//关闭预处理语句
$mysqli_stmt->close();

$mysqli->close();