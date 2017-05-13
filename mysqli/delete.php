<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 13:21
 *
 */
$mysqli = new mysqli('localhost', 'root', '', 'demo');
if ($mysqli->connect_errno) {
    die('Connect error' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql = "DELETE FROM users WHERE id=3";
$res = $mysqli->query($sql);
if ($res) {
    echo $mysqli->affected_rows.'item deleted';
}else{
    echo "error".$mysqli->errno.":".$mysqli->error;
}
$mysqli->close();

/*
 * affected_rows 值
 * 1.受影响记录的条数
 * 2.-1 SQL语句有问题
 * 3. 0 没有受影响记录的条数
 */
