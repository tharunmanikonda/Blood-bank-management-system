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
        ?>  
        <p></p>
        <div class="row1">
          <div class ="col-md-6">
            <div class="jumbotron">
              <h1 class="display-4">Hello,<?=$_SESSION['USERNAME']?>!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </div>
            </div>
                    <div class ="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/bb.png" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                      </div>
          
        </div>

    </body>
</html>
