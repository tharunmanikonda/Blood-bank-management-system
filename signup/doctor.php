<?php
require_once "../pdo.php";
session_start();

  if(isset($_POST['cancel'])){
    header('Location: ../index.php');
    return;
  }

if ( isset($_POST['username'])) {
    if((strlen($_POST['username'])>0) && strlen($_POST['password']>=0)){

        if (isset($_POST['name'])&& isset($_POST['phoneno'])&& isset($_POST['email'])&& isset($_POST['address']) ){
            $sql = "INSERT INTO doctor (NAME,PHONENO,EMAIL,address) VALUES (:name ,:pno,:email,:address)";
            echo ("<pre>\n".$sql."\n</pre>\n");
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':name' => $_POST['name'],
            ':pno'=> $_POST['phoneno'],
            ':email' => $_POST['email'],
            ':address' =>$_POST['address']));
            $stmt3 = $pdo->query("SELECT * FROM `doctor` WHERE `NAME` = '".$_POST['name']."'");
            $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    
    
                $stmt1 = $pdo->prepare('INSERT INTO doctor_signin(USERNAME,PASSWORD,D_ID) VALUES ( :ur, :pw, :dn)');
                $stmt1->execute(array(
                    ':ur' => $_POST['username'],
                    ':pw' => $_POST['password'],
                    ':dn' => $rows2[0]['D_ID'],)
                    );$_fal="Record inserted";
    
                   
                    $_SESSION['success'] = "data inserted";
                    header('Location: ../login/doctorsignin.php');

    }

    }
    else{
        $_SESSION['error'] = "enter data according to requirements";
        header('location:doctor.php');
        return;

}

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
 if(isset($_SESSION['error'])){
     echo $_SESSION['error'];
     unset($_SESSION['error']);
 }
 ?>
<form method="post">
   <P> <label for="NAME"> NAME:</label>
    <input type="text" id="name" name="name">
    <br>
    </P>
    <P> <label for="PHONENO"> PHONE NO:</label>
    <input type="text" id="phoneno" name="phoneno">
    <br>
    </P>
    <P> <label for="email"> EMAIL:</label>
    <input type="email" id="email" name="email">
    <br>
    </P>
    <P> <label for="address"> ADDRESS:</label>
    <input type="text" id="address" name="address">
    <br>
    </P>
    <label for="username">username:</label>
    <input type="text" name="username" id="username">
    <p>	password:
            <input type="password" name="password" size="60"/></p>
    <input type="submit" value ="add" id="submit">
    <input type="submit" value ="Cancel" name="cancel" id="cancel">
    

</form>
</body>
</html>