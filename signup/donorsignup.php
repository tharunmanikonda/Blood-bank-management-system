<?php 
require_once "../pdo.php";
session_start();

if(isset($_POST['cancel'])){
    header('Location: ../index.php');
    return;
  }

$stmt = $pdo->query("SELECT * FROM blood_group");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ( isset($_POST['username'])) {
    if((strlen($_POST['username'])>0) && strlen($_POST['password']>=8)){
        if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['phoneno']) && 
            isset($_POST['emailid']) && isset($_POST['address']) && isset($_POST['blood_group'])) {
            $sql = "INSERT INTO doner(D_NAME,D_AGE, D_PHONENO, D_EMAIL, D_ADDRESS,blood_id)
            VALUES (:name,:age,:phoneno,:emailid,:address,:bid)";
            echo ("<pre>\n".$sql."\n</pre>\n");
            $stmt2 = $pdo->prepare($sql);
            $stmt2->execute(array(
            ':name' => $_POST['name'],
            ':age'=> ($_POST['age']),
            ':phoneno'=>$_POST['phoneno'],
            ':emailid' =>$_POST['emailid'],
            ':address' =>$_POST['address'],
            ':bid'=>$_POST['blood_group'])
            );

            $stmt3 = $pdo->query("SELECT * FROM `doner` WHERE `D_NAME` = '".$_POST['name']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $stmt1 = $pdo->prepare('INSERT INTO doner_signin(USERNAME,PASSWORD,D_ID) VALUES ( :ur, :pw, :dn)');
        $stmt1->execute(array(
            ':ur' => $_POST['username'],
            ':pw' => $_POST['password'],
            ':dn' => $rows2[0]['D_ID'])
            );

            $_SESSION['success11'] = "data inserted";
            header('Location: ../login/donorsignin.php');
        
        }
    }
    else{
        $_SESSION['error'] = "enter data according to requirements";
        header('location:donorsignup.php');
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
<h1>
</h1>

<?php
 if(isset($_SESSION['error'])){
     echo $_SESSION['error'];
     unset($_SESSION['error']);
 }
 require_once "bootstrap.php";
 ?>
    <link rel="stylesheet" href="../bootstrap/css/background.css">
    <div class="container mt-5">
    <h1>Please Register Here </h1>
        <div class= "container">
        <div class="col-12">
        </div>
        <form method="post" class="g-2 needs-validation" novalidate>
            <div class ="row">
                <div class="col-3">
                        <label for="name" class="form-label">NAME</label>
                        <input type="text" class="form-control"id="name" value ="" required name="name">
                        <div class="valid-feedback">
                             Looks good!
                        </div>
                </div>
                <div class="col-3">
                        <label for="D_AGE" class="form-label"> AGE</label>
                        <input type="text" class="form-control" id="D_AGE"value ="" required  name="age">
                        <div class="valid-feedback">
                         please enter your age.
                        </div>
                </div>
                <div class="col-3">
                        <label for="name" class="form-label">USERNAME</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="username" aria-describedby="username" required id="username">
                            <div class="invalid-feedback">
                                 Please choose a username.
                            </div>
                        </div>
                 </div>
            </div>     
            
            <div class ="row">
                <div class="col-4">
                        <label for="PHONENO"  class="form-label"> PHONE NO</label>
                        <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">+91</span>
                                <input type="text" class="form-control" id="D_PHONENO" value ="" required name="phoneno">
                                <div class="valid-feedback">
                                     please enter your phone number.
                                </div>
                         </div>
                </div>
                <div class="col-5">
                        <label for="emailid"class="form-label">EMAIL ID</label>
                        <div class="input-group has-validation">
                                <input type="email" id="email"class="form-control" value ="" required  name="emailid">
                                    <div class="invalid-feedback">
                                            Please enter your are mail id.
                                    </div>
                        </div>
                </div>
            </div>
            <div class ="row">  
                <div class="col-4">
                        <label for="address"class="form-label"> ADDRESS</label>
                        <div class="input-group has-validation">
                            <input type="text" id="address"class="form-control" value ="" required name="address">
                                <div class="invalid-feedback">
                                        Please enter your are address.
                                </div>
                        </div>
                </div>
                <div class="col-4">
                     <label for="blood type" class="form-label">TYPE OF BLOOD:</label>
                     <div></div>
                        <select class="form-select" id="blood_group" name="blood_group">
                            <option selected disabled value="">blood group</option>
                                <?php
                                     foreach($rows as $row){
                                          echo "<option value = ".$row['BLOOD_ID'].">";
                                          echo htmlentities($row['TYPE_OF_BLOOD']);
                                          echo "</option>";
                                          } 
                                 ?>
                        </select>
                </div>
            </div>
            <div class ="row">  
                <div class="col-4">
                             <label for="password"class="form-label">PASSWORD </label>
                                      <div class="input-group has-validation">
                                                <input type="password" name="password" value ="" required class="form-control">
                                                      <div class="invalid-feedback">
                                             Please create a password.
                                                      </div>
                            
                                     </div>
               </div>
            </div>
            <div class ="row">
                    <div class="col-md-12">
                    <h1></h1>
                         <input type="submit" class="btn btn-primary"value="submit">
                                 <input type="submit" class="btn btn-primary" value ="Cancel" name="cancel" id="cancel">
                                    
                    </div>
                                            
        </form>
        </div>
        </div>
        </div>
</body>
</html>
