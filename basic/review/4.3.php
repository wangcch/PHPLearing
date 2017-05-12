<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/6
 * Time: 21:23
 *
 * 函数的使用
 */

function traceHelloPHP(){
    echo "PHP";
}

traceHelloPHP();

//echo "<br>";
//$func = 'traceHelloPHP';
//$func();

echo "<br>";

function sayHelloTo($name){
    echo "Hello".$name;
}

sayHelloTo("zhangsan");

echo "<br>";

function add($a,$b){
    return $a+$b;
}

echo add(1,2);