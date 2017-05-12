<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/10
 * Time: 18:01
 *
 * 文件操作
 */

////write data
//$f = fopen('data','w');
//
//if($f) {
//    fwrite($f, 'Hello php');
//    fclose($f);
//    echo 'ok';
//}else{
//    echo 'error';
//}


echo "<br>";

//read data
// $f2 = fopen('data','r');
////$content = fgets($f2); //only read one line
////echo $content;
//
//while(!feof($f2)){
//    $content = fgets($f2);
//    echo $content;
//}
//fclose($f2);


//get content

echo file_get_contents('data');