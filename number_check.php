<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>發票兌換</title>
</head>
<body>
    <?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=invoice";
    $pdo = new pdo($dsn,'root','');

    //echo $_POST['sp1'];
    $period = $_POST['period'];
    $sql = "SELECT * FROM `deposited` WHERE period='$period'";
    $row = $pdo->query($sql)->fetchAll();
    ?>


    <div>
        <div>
            <div>
            <tr>
            <td>年分:<?=$_POST['year']?></td><br>
            <td>期別:<?=$period?></td><br>
            </tr>
            <h3>兌獎結果</h3>
            </div>
        </div>
        <div>
            <table>
                <tr>
                    <td>中獎金額</td>
                    <td>中獎發票</td>
                </tr>
            </table>
        </div>
    </div>

    <?php
    foreach($row as $check){
        if($check['num'] == $_POST['sp1']){
            echo "一千萬";
            echo $check['num'];
        }else if($check['num'] == $_POST['sp2']){
            echo "兩百萬";
            echo $check['num']; 
        }else if($check['num'] == $_POST['jackpot1']){
            echo "20萬";
            echo $check['num']; 
        }else if($check['num'] == $_POST['jackpot2']){
            echo "20萬";
            echo $check['num']; 
        }else if($check['num'] == $_POST['jackpot3']){
            echo "20萬";
            echo $check['num'];
        }else if(substr($check['num'],1,7) == substr($_POST['jackpot1'],1,7) 
        || substr($check['num'],1,7) == substr($_POST['jackpot2'],1,7) || substr($check['num'],1,7) == substr($_POST['jackpot3'],1,7)){
            echo "四萬元";
        }else{
            echo "未中獎";
        }
    }
    //頭炸了 反正就一直判斷下去
    ?>
    
</body>
</html>