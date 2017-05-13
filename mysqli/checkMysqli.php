<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 9:48
 */

var_dump(extension_loaded('mysqli')); //bool(true)

echo '<br>';

var_dump(function_exists('mysqli_connect')); //bool(true)

echo '<br>';

print_r(get_loaded_extensions());
