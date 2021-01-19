

<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require_once "navigationbar.php";
    require_once "bootstrap.php";?>
    <link rel="stylesheet" href="bootstrap/css/background.css">
</head>
<body>
<div class="container-fluid">
      <div class="row">
          <div class ="col-2">
          </div>
                <div class="col-8">
                <div class="shadow p-2 mb-4 bg-black rounded">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                       <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img src="images/cover page 6.png" class="d-block w-100" alt="img1" height="400px">
                          </div>
                          <div class="carousel-item">
                               <img src="images/cover page 7.png" class="d-block w-100" alt="img2"height="400px">
                           </div>
                           <div class="carousel-item">
                              <img src="images/cover page 8.png" class="d-block w-100" alt="img3"height="400px">
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
                  </div>
                              <div class="jumbotron">
                                     <h1 class="display-5">Hello, world!</h1>
                                     <p></p>
                                         <p class="lead font-weight-bold">“A single pint can save three lives, a single gesture can create a million smiles”.</p>
                                                 <hr class="my-5">
                                                     <p class ="font-weight-normal">It uses utility classes for typography and spacing to space content out within the larger container.</p>
                                                            
                                </div>
                          </div>
</body>
</html>