
<?php 
require_once "../pdo.php";

session_start();
if(isset($_POST['Cancel'])){
    header('Location: docterpage.php');
    return;
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
        <body>
            <?php
            if(isset($_SESSION['success1'])){
                 echo($_SESSION['name']);
                echo ($_SESSION['success1']);
                unset($_SESSION['success1']);
                unset($_SESSION['name']);
            }
$stmt4 = $pdo->query("SELECT R_ID,R_NAME,R_PHONENO,R_UNITS FROM `request`");
$rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
$count=1;
?>
<p>requests are </p>
<table class="table table-striped">
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
                                        echo("<td class='' > <a href='add.php?R_id=".$row['R_ID']."'>ACCEPT REQUEST</a></td>");
                                        echo "</tr>";
                                        $count++;
                                    }
                                    ?>
                                    </tbody>
                        </table>
                        <p></p>
                        <a class="btn btn-primary btn-lg btn-block" href="../doctorpage.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                                back
                </a>
                </body>
        </html>
