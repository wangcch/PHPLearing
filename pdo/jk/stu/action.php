<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/26
 * Time: 11:48
 */
header('content-type:text/html;charset=utf-8');
require_once 'connect.php';

switch ($_GET['act']){
    case 'add':
        $name=$_POST['name'];
        $age=$_POST['age'];
        $sql="INSERT users(name,age) VALUES(?,?)";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$age);
        $row=$stmt->execute();
        if ($row) {
            echo "<script>alert('添加成功');window.location='index.php';</script>";
        }else{
            echo "<script>alert('添加失败');window.history.back();</script>";
        }

        break;
    case 'del':
        $id=$_GET['id'];
        $sql="DELETE FROM users WHERE id={$id}";
        $pdo->exec($sql);
        header("Location:index.php");
        break;
    case 'edit':
        $id=$_POST['id'];
        $name=$_POST['name'];
        $age=$_POST['age'];
        $sql="UPDATE users SET name='{$name}',age='{$age}' WHERE id={$id}";
        $row=$pdo->exec($sql);
        if ($row){
            echo "<script>alert('修改成功');window.location='index.php';</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back();</script>";
        }


        break;
}
