<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/14
 * Time: 21:23
 *
 */

header('content-type:text/html;charset=utf-8');
$mysqli = new mysqli('localhost','root','','demo');
if($mysqli->connect_errno){
    echo "$mysqli->connect_error";
}
$mysqli->set_charset('utf8');
