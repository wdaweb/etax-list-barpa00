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
    ?>
    <div>
        <td><a href="my_invoice.php?period=1">1~2月</a></td>
        <td><a href="my_invoice.php?period=2">3~4月</a></td>
        <td><a href="my_invoice.php?period=3">5~6月</a></td>
        <td><a href="my_invoice.php?period=4">7~8月</a></td>
        <td><a href="my_invoice.php?period=5">9~10月</a></td>
        <td><a href="my_invoice.php?period=6">11~12月</a></td>
        <td><a href="./index.html">回首頁</a></td>
    </div>
    <?php
        if(!empty($_GET['period'])){
            $period = $_GET['period'];
        }else{
            exit();
        }

        $sql = "SELECT `Enum`, `num`, `expend` FROM `deposited` WHERE period='$period'";
        $row = $pdo->query($sql)->fetchAll();
        
    ?>
    <div>
        <table>
            <tr>
                <td>發票號碼</td>
                <td>金額</td>
            </tr>
        <?php
        foreach($row as $myinvoice){
        ?>
            <tr>
                <td><?=$myinvoice['Enum']."-".$myinvoice['num']?></td>
                <td><?=$myinvoice['expend']?></td>
            </tr>
        <?php
        }
        ?>   
        </table>
    </div>
</body>
</html>