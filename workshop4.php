<!DOCTYPE html>
<?php include "connect.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop4</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>

    <div style="display:inline-block">

         <?php

            $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ? ");
             
             if(!empty($_GET)){
                $value = "%".$_GET["keyword"]."%";
             }
             $stmt->bindParam(1, $value);
             $stmt->execute();
        ?>

        <?php while($row = $stmt->fetch()):?>
            <div>
                ชื่อสมาชิก: <?=$row["name"]?><br>
                ที่อยู่  <?=$row["address"]?><br>
                email:  <?=$row["email"]?><br>
                <img src='imgMember/<?=$row["username"]?>.jpg' width='100'><hr>
            </div>
         <?php endwhile; ?>

        
    </div>
    
    
</body>
</html>