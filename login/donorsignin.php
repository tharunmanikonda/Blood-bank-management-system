<?php
session_start();
require_once "../pdo.php";
if(isset($_SESSION['success11'])){
    echo"<div class='alert alert-success' role='alert'> ".($_SESSION['success11'])."</div>";
    unset($_SESSION['success11']);
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
        if(count($rows2)>0){
            $_SESSION['USERNAME'] = $rows2[0]['USERNAME'];
            $_SESSION['D_ID']=$rows2[0]['D_ID'];
            $_SESSION['role']= 1;
            header('Location: ../pagenavbar/donorpage.php');
            return;
        }else {
            $_SESSION['error']='Wrong Username or Password';
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
<body class="text-center">
<?php
if (isset($_SESSION['error'])){
    echo"<div class='alert alert-danger' role='alert'> ".($_SESSION['error'])."</div>";
    unset($_SESSION['error']);
}
require_once "bootstrap.php";
?>
<link rel="stylesheet" href="../bootstrap/css/background.css">
<p>
</p>
<p></p>
<form class="form-signin"  method="post" >
        <div class="container mt-5">
        <img class="mb-1" src="../images/logo2.png" alt=""  height="60">
        <h3 class="h2 mb-3 font-weight-normal"> Donor Login</h3>  
    <p><label for="username" >USERNAME :</label>
    <input type="text" name ="username" id = "username">
    </p>
    <p><label  for="password"> PASSWORD :</label>
    <input type="password"  name ="password" id ="password">
    </p>
    <p> <input type="submit" class="btn btn-outline-dark" value="submit" id="submit"> </label>
      <label><input type="submit" class="btn btn-outline-dark" value="cancel" name ="cancel" id ="Cancel"></label>
      <label><input type="submit" class="btn btn-outline-dark" id="signup" name= "signup" value="signup"></label></p>
      </div>
    </form>
    
</body>
</html>