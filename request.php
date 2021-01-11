<?php
require_once "pdo.php";
$stmt = $pdo->query("SELECT * FROM blood_group");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['cancel'])){
    header('Location: index.php');
    return;
  }


if ( isset($_POST['name']) && isset($_POST['number']) 
     &&isset($_POST['units']) && isset($_POST['address']) &&isset($_POST['blood_group']) ) {
    $sql = "INSERT INTO request (R_NAME,R_PHONENO, R_UNITS,R_ADDRESS,BLOOD_ID) 
              VALUES (:name,:phno,:units,:address,:bloodid)";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => ($_POST['name']),
        ':phno' => ($_POST['number']),
        ':units' => ($_POST['units']),
        ':address'=>($_POST['address']),
         ':bloodid'=>($_POST['blood_group'])


        )

    );
    
    $_SESSION['success'] = "data inserted";
    header('Location: index.php');  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body >
    <?php require_once "bootstrap.php";
     ?>
     <link rel="stylesheet" href="bootstrap/css/background.css">

<div class="container mt-5">

    <div class ="col-4 row " >
    </div>
        <div class= "container">
        <h1>fill the details</h1>
       
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
                        <label for="phonenumber" class="form-label">PHONE NO</label>
                        <input type="text" class="form-control" id="D_AGE"value ="" required  name ="number">
                        <div class="valid-feedback">
                         please enter your number.
                        </div>
                </div>
            </div> 
            <div class ="row">   
                <div class="col-3">
                        <label for="UNITS" class="form-label">UNITS</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="units" aria-describedby="username" required id="username">
                            <div class="invalid-feedback">
                                 Please choose a username.
                            </div>
                        </div>
                 </div>  
                <div class="col-3">
                        <label for="ADDRESS" class="form-label">ADDRESS</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control"  name="address" aria-describedby="username" required id="username">
                            <div class="invalid-feedback">
                                 Please choose a username.
                            </div>
                        </div>
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
                <p></p>
                <p><input type="submit" class="btn btn-lg btn-primary btn-bloc" value="Request">
                <input type="submit" class="btn btn-lg btn-primary btn-bloc" value ="Cancel" name="cancel" id="cancel"></p>
</form>
    </div>
</div>
</body>
</html>
