<?php
session_start();
require_once "../pdo.php";
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

if(isset($_POST['signup'])){
    header('Location: ../signup/donorsignup.php');
    return;
}
if(isset($_POST['cancel'])){
    header('Location: ../index.php');
    return;
  }
if ( isset($_POST['username'])) {
    if((strlen($_POST['username'])>0) && (strlen($_POST['password'])>0)){
        $stmt3 = $pdo->query("SELECT `D_ID` FROM `doner_signin` WHERE USERNAME = '".$_POST['username']."' AND PASSWORD ='".$_POST['password']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        //print_r (isset($rows2[0]));
        if(count($rows2)>0){
            $_SESSION['success'] = "done";
            $_SESSION['USERNAME'] = $rows2[0]['USERNAME'];
            $_SESSION['D_ID']=$rows2[0]['D_ID'];
            $_SESSION['role']= 1;
            //echo("<a href='admin/delete.php?donor_id=".$row['donor_id'].
            header('Location: ../pagenavbar/donorpage.php');
            return;
        }else {
            $_SESSION['error']='Wrong Username and Password';
            header('Location: donorsignin.php');
            return;
        }

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
<h1>please login</h1>
<?php

if (isset($_SESSION['error'])){
    echo($_SESSION['error']);
    unset($_SESSION['error']);
}
require_once "bootstrap.php";
?>
<form method ="post" >
<p>
<div class="row2">
</div>
<div class ="row3">
<div class ="col-md-2">
</div>
<div class ="col-md-5">
<div class="form-floating mb-5">
<label for="username">USERNAME:</label>
<input type="text" class="form-control" name ="username" id="username" placeholder="name@example.com">
</p>
<P>
<div class="form-floating mb-3">
<label for="password">PASSWORD:</label>
<input type="password" class="form-control" name ="password" id ="password" placeholder="Password">
</p>
<input type="submit" value="submit" id="submit">
<input type="submit" value="cancel" name ="cancel" id ="Cancel">
<input type="submit" id="signup" name= "signup" value="signup">
</form>
    
</body>
</html>