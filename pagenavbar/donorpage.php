<?php 
session_start(); 
require_once "../pdo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/style.css">

    </head>
<body>
    <div class="navbar">
<a href="index.php">blood donation</a>
<?php  
 $stmt3 = $pdo->query("SELECT * FROM `doner` WHERE `D_ID` = '".$_SESSION['D_ID']."'");
 $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
 $_SESSION['USERNAME'] = $rows2[0]['D_NAME'];
?>
<a href="donordetails.php"><?php echo $_SESSION['USERNAME']; ?></a>
  <a href="login/donorsignin.php">donor</a>
  <a href="request.php">request</a>

  <!--<div class="dropdown">
    <button class="dropbtn">Details 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="doctordonordetails.php">donor</a>
      <a href=""></a>
      <a href="#">Link 3</a>
      
    </div>
  </div> !-->
</div>
</body>
</html>
<?php
//if(isset($_POST['Cancel'])){
    //header('Location: donorpage.php');
    //return;


?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?//php require_once "bootstrap.php"?>
</head>
<body>

<form method="post">
<label for="details">menu</label>

<select name="details" id="details">
    <option value=" ">choose the option</option>
  <option value="donor">donor</option>
  <option value="request">request</option>
  <option value="sold">sold</option>
</select>
<input type="submit" name="submit" id="submit">
<input type="submit" value ="Cancel" name="Cancel" id="cancel">
</form>
</body>
</html>!--->