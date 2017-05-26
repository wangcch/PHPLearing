<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/26
 * Time: 11:48
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>信息管理系统</title>
    <style type="text/css">
        body{
            text-align: center;
        }
        table{
            margin:auto;
        }
        a{
            text-decoration: none;
        }
    </style>
    <script type="text/javascript">
        function doDel(id){
            if(confirm("确定要删除吗？")){
                window.location='action.php?actds=del&id='+id;
            }
        }
    </script>
</head>
<body>
<?php include 'menu.php'?>
<hr>
<h3>浏览学生信息</h3>
<table width="600" border="1">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>AGE</th>
        <th>EDIT</th>
    </tr>
    <?php
        require_once 'connect.php';
        $sql="SELECT id,name,age FROM users";
        $rows=$pdo->query($sql);
        foreach ($rows as $row){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td><a href='javascript:doDel({$row['id']})'>DELETE </a>|
                  <a  href='edit.php?id={$row['id']}'>UPDATE</a></td>";
            echo "</tr>";
        }
    ?>
</table>

</body>
</html>
