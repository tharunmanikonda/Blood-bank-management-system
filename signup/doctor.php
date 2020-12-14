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
 require_once "bootstrap.php";
 ?>
<form method="post">
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="name" class="form-label">NAME</label>
    <input type="text" class="form-control"id="name" value ="" required name="name">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
    <div class="col-md-4">
    <label for="name" class="form-label">USERNAME</label>
    <div class="input-group has-validation">
    <input type="text" class="form-control" name="username" aria-describedby="username" required id="username">
    <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>
  <div class="col-md-4">
        <label for="PHONENO"class="form-label">PHONE NO</label>
        <div class="input-group has-validation">
    <input type="text" id="phoneno"class="form-control" value ="" required name="phoneno">
    <div class="invalid-feedback">
        Please enter your are number.
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <label for="emailid"class="form-label">EMAIL ID</label>
  <div class="input-group has-validation">
    <input type="email" id="email"class="form-control" value ="" required  name="email">
    <div class="invalid-feedback">
        Please enter your are mail id.
      </div>
    </div>
  </div>
  <div class="col-md-4">
        <label for="address"class="form-label"> ADDRESS</label>
        <div class="input-group has-validation">
    <input type="text" id="address"class="form-control" value ="" required name="address">
    <div class="invalid-feedback">
        Please enter your are address.
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <label for="password"class="form-label">PASSWORD </label>
  <div class="input-group has-validation">
    <input type="password" name="password" value ="" required class="form-control">
    <div class="invalid-feedback">
        Please create a password.
      </div>
    </div>
  </div>
  <div class="col-6">
    <input type="submit" value ="add" id="submit">
    <input type="submit" value ="Cancel" name="cancel" id="cancel">
    </div>
    </form>
</body>
</html>