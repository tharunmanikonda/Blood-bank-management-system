<?php 
session_start(); 
require_once "../pdo.php";
//require_once "doctorpagenavbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
   require_once "doctorpagenavbar.php";
   require_once "bootstrap.php";?>
    <link rel="stylesheet" href="../bootstrap/css/background.css">

</head>
<?php  
$sql = $pdo->query("SELECT * FROM `doctor` WHERE `D_ID` = '".$_SESSION['D_ID']."'");
$rows2 = $sql->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['USERNAME'] = $rows2[0]['NAME'];  

?>
<body>
        <div class="container-fluid">
                <div class="row">
                      <div class ="col-md-2">
                      </div>
                          <div class="col-md-8 shadow p-2 mb-5 bg-black rounded">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                    <div class="carousel-inner">
                                          <div class="carousel-item active">
                                                 <img src="../images/cover page 6.png" class="d-block w-100" alt="img1" height="400px">
                                            </div>
                                             <div class="carousel-item">
                                                  <img src="../images/cover page 7.png" class="d-block w-100" alt="img2"height="400px">
                                             </div>
                                             <div class="carousel-item">
                                                   <img src="../images/cover page 8.png" class="d-block w-100" alt="img3"height="400px">
                                             </div>
                                             </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                          <span class="sr-only">Previous</span>
                                                    </a>
                                                     <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                           <span class="sr-only">Next</span>
                                                     </a>
                                        </div>
                                 </div>
                            </div>
                            <div class="jumbotron jumbotron-fluid">
                             <p class="display-4">Hello,Dr.<?=$_SESSION['USERNAME']?>!</p>
                             <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                            </div>
                </div>
          </div>
</body>
</html>