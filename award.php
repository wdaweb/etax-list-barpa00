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
        <td><a href="award.php?period=1">1~2月</a></td>
        <td><a href="award.php?period=2">3~4月</a></td>
        <td><a href="award.php?period=3">5~6月</a></td>
        <td><a href="award.php?period=4">7~8月</a></td>
        <td><a href="award.php?period=5">9~10月</a></td>
        <td><a href="award.php?period=6">11~12月</a></td>
        <td><a href="./index.html">回首頁</a></td>
    </div>
    <form action="./number_check.php" method="POST">
    <?php
        if(!empty($_GET['period'])){
            $period = $_GET['period'];
            $sql = "SELECT `year`,`period`, `sp1`, `sp2`, `jackpot1`, `jackpot2`, `jackpot3`, `six1`, `six2`, `six3` FROM `award` WHERE period='$period'";
            $invoice = $pdo->query($sql)->fetch();
        }else{
            exit();
        }
        
       
    
    ?>
    <table>
            <tr>
                <td>年度</td>
                <td><?=$invoice['year']?></td>
                <td></td>
            </tr>
            <tr>
                <td>月份</td>
                <td><?=$invoice['period']?></td>
                <td>獎金</td>
            </tr>
            <tr>
                <td>特別獎</td>
                <td><?=$invoice['sp1']?></td>
                <td>1000萬元</td>
            </tr>
            <tr>
                <td>特獎</td>
                <td><?=$invoice['sp2']?></td>
                <td>200萬元</td>
            </tr>
            <tr>
                <td>頭獎</td>
                <td><?=$invoice['jackpot1']?><br>
                    <?=$invoice['jackpot2']?><br>
                    <?=$invoice['jackpot3']?></td>
                <td>20萬元</td>
            </tr>
            <tr>
                <td>二獎</td>
                <td>末 7 位數號碼與頭獎中獎號碼末 7 位相同者</td>
                <td>四萬元</td>
            </tr>
            <tr>
                <td>三獎</td>
                <td>末 6 位數號碼與頭獎中獎號碼末 6 位相同者</td>
                <td>一萬元</td>
            </tr>
            <tr>
                <td>四獎</td>
                <td>末 5 位數號碼與頭獎中獎號碼末 6 位相同者</td>
                <td>一萬元</td>
            </tr>
            <tr>
                <td>五獎</td>
                <td>末 4 位數號碼與頭獎中獎號碼末 6 位相同者</td>
                <td>一萬元</td>
            </tr>
            <tr>
                <td>六獎</td>
                <td>末 3 位數號碼與頭獎中獎號碼末 6 位相同者</td>
                <td>200元</td>
            </tr>
            <tr>
                <td>增開六獎</td>
                <td><?=$invoice['six1']?><br>
                    <?=$invoice['six2']?><br>
                    <?=$invoice['six3']?></td>
                <td>200元</td>
            </tr>
            <?php
            
            ?>
        </table>
    </form>
</body>
</html>