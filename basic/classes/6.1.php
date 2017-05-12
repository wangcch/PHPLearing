<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/6
 * Time: 22:33
 *
 * 类
 */

require_once 'hello.php';
require_once 'jkxy/Hello.php';
require_once 'Man.php';

$h = new Hello();
$h->sayHello();

$w = new Desktop();
$w->work();

$h2 = new \jkxy\Hello();
$h2->sayHello();

$m = new Man();