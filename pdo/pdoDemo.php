<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 18:35
 *
 * 单态类  为了产生唯一的对象 不是用构造方法
 */

class A{
    private static $a = null;
    private function __construct()
    {
    }

    static function makeA(){
        if (self::$a == null){
            self::$a = new self();
        }
        return self::$a;

    }
}

print_r(A::makeA());// A Object()