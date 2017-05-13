<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 13:34
 */

header('content-type:text/html;charset=utf-8');
$mysqli = new mysqli('localhost', 'root', '', 'demo');
if ($mysqli->connect_errno) {
    die('Connect error' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
