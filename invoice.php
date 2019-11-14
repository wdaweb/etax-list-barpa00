<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=invoice";
$pdo = new pdo($dsn,'root','');

$year = $_POST['year'];
$period = $_POST['period'];
$Enum = $_POST['Enum'];
$num = $_POST['num'];
$expend = $_POST['expend'];
$sql = "INSERT INTO `deposited`(`year`,`period`,`Enum`,`num`,`expend`) 
VALUES ('$year','$period','$Enum','$num','$expend')"; 
$pdo->query($sql);
header("location:index.html");
?>
</body>
</html>