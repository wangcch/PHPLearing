<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/15
 * Time: 0:33
 *
 * 事务处理
 */

require_once 'config.php';

//关闭自动提交功能
$mysqli->autocommit(false);

$sql1 = "UPDATE account SET money=money-200 WHERE name='king'";
$res1 = $mysqli->query($sql1);
$res1_affect = $mysqli->affected_rows;

$sql2 = "UPDATE account SET money=money+200 WHERE name='queen'";
$res2 = $mysqli->query($sql2);
$res2_affect = $mysqli->affected_rows;

if ($res1 && $res1_affect > 0 && $res2 && $res2_affect > 0) {
    $mysqli->commit();
    echo 'success';
    //
    $mysqli->autocommit(true);
} else {
    $mysqli->rollback();
    echo 'failure';
}

$mysqli->close();