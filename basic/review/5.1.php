<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/6
 * Time: 21:58
 *
 * php 字符串
 */

$str = 'Hello';
echo $str;

echo "<br>";

echo strpos($str,'o'); //第四位

echo '<br>'; //4

$str1 = substr($str,2,3);

echo $str1.'<br>'; //llo

$result = str_split($str,2);

print_r($result);//Array ( [0] => He [1] => ll [2] => o )

echo '<br>';

$str2 = "java c php c++";
$result2 = explode(' ',$str2);
print_r($result2);//Array ( [0] => java [1] => c [2] => php [3] => c++ )

