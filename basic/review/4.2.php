<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/6
 * Time: 21:14
 *
 * 变量与常量
 */

$a = 10;
$b = 20;
echo $a + $b;

echo "<br>";

//php 5 申明常量    常量不可改变
const THE_VALUE = 100;
echo THE_VALUE;

echo "<br>";

//php 4 申明变量
define('THE_VALUE2',200);
echo THE_VALUE2;