<?php  

require_once "../pdo.php";
session_start();
if(isset($_POST['cancel'])){
    header('Location: donorpage.php');
    return;
  }
  if (isset($_SESSION['success121'])){
    echo"<div class='alert alert-danger' role='alert'> ".($_SESSION['success121'])."</div>";
    unset($_SESSION['success121']);
}

  $stmt = $pdo->query("SELECT * FROM blood_group");
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['name'])&& isset($_POST['blood_group'])&& isset($_POST['units'])&& isset($_POST['address']) ){
    $sql = $pdo->query("SELECT * FROM `doner` WHERE `D_NAME` = '".$_POST['name']."'");
    $rows2 = $sql->fetchAll(PDO::FETCH_ASSOC);
        $stmt1 = $pdo->prepare('INSERT INTO blood_bank (BLOOD_ID ,UNITS,ADDRESS) VALUES ( :bid, :units, :adrs)');
        $stmt1->execute(array(
        ':bid' =>$_POST['blood_group'],
        ':units' =>$_POST['units'],
        ':adrs' =>$_POST['address'])
        );
        $_SESSION['success121'] ="data inserted";
         header('Location: donate.php');
            return;
    else{
        $_SESSION['invalidname'] = "Enter details properly";
        header('Location: donate.php');
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
    <?php require_once "bootstrap.php";?>

</head>
<body class="text-center">
<?php
if (isset($_SESSION['invalidname'])){
    echo"<div class='alert alert-danger' role='alert'> ".($_SESSION['invalidname'])."</div>";
    unset($_SESSION['errinvalidnameor']);
}
 require_once "donornavbar.php";?>

<link rel="stylesheet" href="../bootstrap/css/background.css">
<div class="col-12">
<div class="row">
    <div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-12">
        <form method="post" class="g-2 needs-validation" novalidate>
                <div class="col-12">
                     <p><label for="NAME" >  NAME:</label>
                     <input type="text" id="name" name="name">
                     <br>
                     </p>
                     
                </div>
                <div class="col-12">       
                    <P> <label for="UNITS" > UNITS:</label>
                    <input type="text" id="UNITS" name="units">
                    <br>
                    </P>
                </div> 
                <div class="col-12">    
                    <P><label for="address" >ADDRESS:</label>
                    <input type="text" id="address" name="address">
                    <br>
                </div> 
                <div class="col-12">
                     <label for="blood type">TYPE OF BLOOD:</label>
                     
                        <select  id="blood_group" name="blood_group">
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
                 
                <div class="col-12">  
                <input type="submit" class="btn btn-primary" value ="add" id="submit">
                <input type="submit" class="btn btn-primary" value ="Cancel" name="cancel" id="cancel">
                </div>
                </div>
                </div>
</form>
</body>
</html>