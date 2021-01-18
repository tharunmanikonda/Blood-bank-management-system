<?php
session_start();
require_once "../pdo.php";
if(isset($_POST['submit'])){
    $stmt3 = $pdo->query("SELECT R_ID,R_NAME,BLOOD_ID FROM request WHERE R_ID = '".$_GET['R_id']."'");
            $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    print_r($rows2);
    $stmt1 = $pdo->prepare ("INSERT INTO sold (`R_ID`,`B_ID`, `Name`) VALUES (:id ,:bid,:nm)");
         $stmt1->execute(array(
                    ':id' => $rows2[0]['R_ID'],
                    ':bid' => $rows2[0]['BLOOD_ID'],
                    ':nm' => $rows2[0]['R_NAME']
                    ));
                    $_SESSION['id']=$rows2[0]['R_ID'];
                    //$_SESSION['success1'] = "request accepted";
                    header('Location: requestdetails.php');
                
                }
    if(isset($_POST['cancel'])){
        header('Location: requestdetails.php');
    }            

                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                <body class="text-center">
                <?php  require_once "bootstrap.php"; 
                
                ?>
                <div class="container mt-5 ">
                <div class="shadow lg p-2 mb-5 rounded bg-secondary">
        
                <form class="form-signin" method="post">
                            <h1>accept request</h1>
                                <br>
                            <input type="submit" class="btn btn-lg btn-primary btn-bloc" name ="submit"value="Yes">
                            <input type="submit" class="btn btn-lg btn-primary btn-bloc" name="cancel" value="Cancel"></p>
                </div>
                </form> 
                </div> 
                <link rel="stylesheet" href="../bootstrap/css/background.css">                  
                </body>
                </html>