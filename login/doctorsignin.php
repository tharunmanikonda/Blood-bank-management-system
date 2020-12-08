<?php
session_start();
require_once "../pdo.php";
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if ( isset($_POST['username'])) {
    if((strlen($_POST['username'])>0) && (strlen($_POST['password'])>0)){
        $stmt3 = $pdo->query("SELECT `D_ID` FROM `doctor_signin` WHERE USERNAME = '".$_POST['username']."' AND PASSWORD ='".$_POST['password']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        //print_r (isset($rows2[0]));
        if(count($rows2)>0){
            $_SESSION['success'] = "done";
            $_SESSION['D_ID']=$rows2[0]['D_ID'];
            $_SESSION['role']= 1;
            header('Location: ../index.php');
            return;
        }else {
            $_SESSION['error']='Wrong Username and Password';
            header('Location: doctorsignin.php');
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

<?php
    
         echo($_SESSION['error']);
         unset($_SESSION['error']);
 
 ?>


<form method ="post" >
<p>
<label for="username">USERNAME:</label>
<input type="text" name ="username" id="username">
</p>
<P>
<label for="password">PASSWORD:</label>
<input type="password" name ="password" id ="password">
</p>
<input type="submit" value="submit" id="submit">
<input type="submit" value="Cancel" id ="Cancel">
<input type="button" id="button"  value="signup">

</form>
    
</body>
</html>