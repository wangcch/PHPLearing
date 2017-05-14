<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/14
 * Time: 20:25
 *
 * 预处理语句执行插入操作
 */

require_once 'config.php';

$sql = "INSERT users(name,age) VALUES(?,?)";

//s:string  i:int  d:double
$mysqli_stmt = $mysqli->prepare($sql);

$name = 'king';
$age = '18';
//绑定参数
$mysqli_stmt->bind_param('si',$name,$age);

//执行预处理语句
if ($mysqli_stmt->execute()){
    echo $mysqli_stmt->insert_id;
    echo '<br>';
}else{
    $mysqli_stmt->error;
}
