<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 18:19
 *
 * $mysqli->multi_query($sql)
 *
 */

require_once 'config.php';

$sql="INSERT users(name,age) VALUES('demo',5)";
$sql.="";
$sql.="";

//针对多条SQL语句
$res = $mysqli->multi_query($sql); //第一个SQL语句正确，返回TRUE
var_dump($res);


