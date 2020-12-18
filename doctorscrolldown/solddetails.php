<?php
require_once "../pdo.php";

session_start();
if(isset($_POST['Cancel'])){
    header('Location: docterpage.php');
    return;
}
$stmt5 = $pdo->query("SELECT sold.R_ID,request.R_PHONENO,request.R_NAME,request.R_UNITS FROM sold JOIN request WHERE sold.R_ID= request.R_ID");
    $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
    $count = 1;
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
        <div class ="container mt-5">
        <h1>donated details</h1>
        <table class="table table-dark table-hover">
                   <thead>
                        <tr>
                             <th scope="col">sno</th>
                             <th scope="col">name</th>
                             <th scope="col">mobile number</th>
                             <th scope="col">units</th>
                        </tr>
                    </thead>
                            <tbody>
                            <?php

                                foreach ( $rows5 as $row ) {
                                    echo "<td class=''>".$count."</td>";
                                    echo "<td class=''>".htmlentities($row['R_NAME'])."</td>";
                                    echo "<td class=''>".htmlentities($row['R_PHONENO'])."</td>";
                                    echo "<td class=''>".htmlentities($row['R_UNITS'])."</td>";
                                    echo "</tr>";
                                        $count++;
                                        }
                            ?>
                            </tbody>
                            </table>
                            <div class="shadow lg p-2 mb-5  rounded">
                            <a class="btn btn-primary btn-lg btn-block"  href="../doctornav/doctorpage.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                                     back         
                            </a>
                            <link rel="stylesheet" href="../bootstrap/css/background.css"> 
                            </div>
                            </div>
        </body>
        </html>