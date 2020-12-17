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
      <?php
      require_once "bootstrap.php";?>
      <link rel="stylesheet" href="../bootstrap/css/background.css">
  </head>
  <body>
        <?php
        require_once "donornavbar.php";
         $sql = $pdo->query("SELECT * FROM `doner` WHERE `D_ID` = '".$_SESSION['D_ID']."'");
         $rows2 = $sql->fetchAll(PDO::FETCH_ASSOC);
         $_SESSION['USERNAME'] = $rows2[0]['D_NAME']; 
         $sql1 = $pdo->query("SELECT TYPE_OF_BLOOD FROM `blood_group` WHERE `BLOOD_ID` = '".$rows2[0]['blood_id']."'");
         $rows3 = $sql1->fetchAll(PDO::FETCH_ASSOC); 
         $_SESSION['bloodgroup'] =$rows3[0]['TYPE_OF_BLOOD']; 
         
         
        ?>  
        <p></p>
       <div class="container-fluid">
        <div class="row">
          <div class ="col-md-9">
            <div class="jumbotron">
              <h1 class="display-4">Hello,<?=$_SESSION['USERNAME']?>!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                
          </div>
            </div>
                    <div class ="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/bb.png" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><?=$_SESSION['USERNAME']?></h5>
                        <p class="card-text">blood group is  <?= $_SESSION['bloodgroup']?></p>
                        
                      </div>
                      </div>
          
        </div>
        </div>


    </body>
</html>
