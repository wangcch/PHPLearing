<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/21
 * Time: 2:07
 */
$pStartTime=microtime(true);
for($i=0;$i<100;$i++) {
    $pdo = new PDO('mysql:host:localhost;dbname=demo', 'root', '');
}
$pEndTime=microtime(true);
$res1=$pEndTime-$pStartTime;

$mStartTime=microtime(true);
for ($i=0;$i<100;$i++) {
    mysql_connect('localhost', 'root', '');
    mysql_select_db('demo');
}
$mEndTime=microtime(true);
$res2=$mEndTime-$mStartTime;

$miStartTime=microtime(true);
for ($i=0;$i<100;$i++) {
    mysqli_connect('localhost', 'root', '','demo');
}
$miEndTime=microtime(true);
$res3=$miEndTime-$miStartTime;

echo 'PDO:'.$res1.'<br>';
echo 'MYSQL:'.$res2.'<br>';
echo 'MYSQLI:'.$res3;