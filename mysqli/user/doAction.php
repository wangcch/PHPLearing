<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 14:35
 */

require_once '../config.php';

$act = $_GET['act'];

switch ($act){
    case 'addUser':
//        echo 'add';
        $name = $_POST['name'];
        $name = $mysqli->escape_string($name);
        $age = $_POST['age'];

        $sql="INSERT users(name,age) VALUES('{$name}','{$age}')";
        $res = $mysqli->query($sql);
        if($res){
            $insert_id = $mysqli->insert_id;
            echo "<script type='text/javascript'> alert('添加成功，你是网站的第{$insert_id}用户');location.href='userlist.php';</script>";
        }else{
            echo "<script type='text/javascript'> alert('添加失败，请重新添加');location.href='adduser.php';</script>";
        }
        break;
    case 'delUser':
//        echo 'delete';
        $id = $_GET['id'];

        $sql = "DELETE FROM users WHERE id=".$id;
        $res = $mysqli->query($sql);
        if($res){
            $message="删除成功";
        }else{
            $message="删除失败";
        }
        $url='userlist.php';
        echo "<script type='text/javascript'>alert('{$message}');location.href='{$url}';</script>";

        break;
    case 'editUser':
        $name = $_POST['name'];
        $name = $mysqli->escape_string($name);
        $age = $_POST['age'];
        $id = $_GET['id'];

        $sql = "UPDATE users SET name='{$name}',age='{$age}' WHERE id='{$id}'";
        $res = $mysqli->query($sql);

        if($res){
            $message="更新成功";
        }else{
            $message="更新失败";
        }
        $url='userlist.php';
        echo "<script type='text/javascript'>alert('{$message}');location.href='{$url}';</script>";


        break;
}