<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/11
 * Time: 20:11
 */

//print_r($_FILES);

$file = $_FILES['file'];
$fileName = $file['name'];
move_uploaded_file($file['tmp_name'], $fileName);

echo "<img src='$fileName'>";

?>
</body>
</html>

