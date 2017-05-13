<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 10:21
 */

$mysqli = new mysqli('localhost','root','','demo');
if($mysqli->connect_errno){
    die('Connect error'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');

//SQL select
//
$sql=<<<EOF
    "CREATE TABLE IF NOT EXISTS test(
        id TINYINT UNSIGNED ANTO_INCREMENT KEY,
        username VARCHAR(20) NOT NULL
    );"
EOF;

//$sql = 'SHOW TABLES';

$res = $mysqli->query($sql);
var_dump($res);

//SELECT / DESC / DESCRIBE / SHOW / EXPLAIN z执行成功返回mysqli_result对象，执行失败返回false
//其他SQL语句 ，成功返回true 失败返回false

$mysqli->close();