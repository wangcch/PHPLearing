<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/16
 * Time: 13:28
 */
header('content-type:text/html;charset=utf-8');

$link = mysqli_connect('localhost','root','','demo') or die("connect error:".mysqli_errno().":".mysqli_error());
mysqli_set_charset($link,'UTF8');

$sql = "SELECT　id,name,age FROM users";
$result = mysqli_query($link,$sql);
if ($result && mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
//        print_r($row);
        $rows[]=$row;
    }
}
//print_r($rows);

mysqli_free_result($result);
mysqli_close($link);