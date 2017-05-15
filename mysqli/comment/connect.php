<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/15
 * Time: 22:49
 */

$mysqli=new mysqli('localhost','root','','comment');
if($mysqli->errno){
    die('connect error'.$mysqli->error);
}else {
    $mysqli->set_charset('utf8');
}