
<?php 
require_once "../pdo.php";

session_start();
if(isset($_POST['Cancel'])){
    header('Location: docterpage.php');
    return;

}
//if(isset($_SESSION['id'])){
//    $stmt11 = $pdo->query("DELETE FROM `request` WHERE R_ID = '".$_SESSION['id']."'");
  //  $rows11 = $stmt11->fetchAll(PDO::FETCH_ASSOC);
//}
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
            if(isset($_SESSION['success1'])){
                 echo($_SESSION['name']);
                echo ($_SESSION['success1']);
                unset($_SESSION['success1']);
                unset($_SESSION['name']);

            }
$stmt4 = $pdo->query("SELECT R_ID,R_NAME,R_PHONENO,R_UNITS FROM `request` where sold =0");
$rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
$count=1;
?>
<div class ="container mt-5">
<h1> Pending Requests </h1>
<table class="table table-dark table-hover"class="badge bg-dark">
                   <thead>
                        <tr>
                        <th scope="col">Sno</th>
                             <th scope="col">name</th>
                             <th scope="col">phone no</th>
                             <th scope="col">units</th>
                             <th scope="col">accept request</th>
                             </tr>
                    </thead>
                            <tbody>
                                <?php
                                    foreach ( $rows4 as $row ) {
                                        echo "<td class=''>".$count."</td>";
                                        echo "<td class=''>".htmlentities($row['R_NAME'])."</td>";
                                        echo "<td class=''>".htmlentities($row['R_PHONENO'])."</td>";
                                        echo "<td class=''>".htmlentities($row['R_UNITS'])."</td>";
                                        echo("<td class=''> <a class='btn btn-success btn-sm ' role='button' href='add.php?R_id=".$row['R_ID']."'>ACCEPT REQUEST</a></td>");
                                        echo "</tr>";
                                        $count++;
                                    }
                                    ?>
                                    </tbody>
                        </table>
                        <p></p>
                        <div class="shadow lg p-2 mb-5  rounded">
                        <a class="btn btn-primary btn-lg btn-block" href="../doctornav/doctorpage.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                                back
                </a>
                </div>
                </div>
                <link rel="stylesheet" href="../bootstrap/css/background.css"> 
                </body>
        </html>
