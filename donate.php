<?php  

require_once "pdo.php";
session_start();


if (isset($_POST['name'])&& isset($_POST['phoneno'])&& isset($_POST['units'])&& isset($_POST['address']) ){
    $sql = $pdo->query("SELECT * FROM `doner` WHERE `D_NAME` = '".$_POST['name']."'");
    $rows2 = $sql->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows2)>0){
        $stmt1 = $pdo->prepare('INSERT INTO blood_bank (BLOOD_ID ,UNITS,ADDRESS) VALUES ( :bid, :units, :adrs)');
        $stmt1->execute(array(
        ':bid' =>$rows2[0]['blood_id'],
        ':units' =>$_POST['units'],
        ':adrs' =>$_POST['address'])
        );
        $_SESSION['success'] = "data inserted";
         header('Location: index.php');
            return;
        }
    else{
        echo "data not found please signup first";
        header('Location: donorsignup.php');
        return;
    }
}

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
   <P> <label for="NAME"> NAME:</label>
    <input type="text" id="name" name="name">
    <br>
    </P>
    <P> <label for="PHONENO"> PHONE NO:</label>
    <input type="text" id="phoneno" name="phoneno">
    <br>
    </P>
    <P> <label for="UNITS"> UNITS:</label>
    <input type="text" id="UNITS" name="units">
    <br>
    </P>
    <P> <label for="address"> ADDRESS:</label>
    <input type="text" id="address" name="address">
    <br>
    <input type="submit" value ="add" id="submit">
    <input type="submit" value ="Cancel" name="cancel" id="cancel">
    

</body>
</html>