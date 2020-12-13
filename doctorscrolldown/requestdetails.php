
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
$stmt4 = $pdo->query("SELECT R_ID,R_NAME,R_PHONENO,R_UNITS FROM `request`");
$rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['add'])){
    $sql = $pdo->query("SELECT R_ID,R_NAME,BLOOD_ID FROM request WHERE R_ID  ='".$_POST['add']."'");
    $rows2 = $sql->fetchAll(PDO::FETCH_ASSOC);
 
    $stmt1 = $pdo->prepare('INSERT INTO sold (`R_ID`, `B_ID`, `name`) VALUES ( :id, :bid , :nm)');
    print_r($stmt1);
                $stmt1->execute(array(
                    ':id' => $rows2[0]['R_ID'],
                    ':bid' => $rows2[0]['BLOOD_ID'],
                    ':nm' => $rows2[0]['R_NAME']
                    ));
}
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
                                        echo "<td class=''>".htmlentities($row['R_NAME'])."</td>";
                                        echo("<td class=''>"'<form method="post"><input type="hidden" ')"</td>";
                                        echo("<td class=''>"'name="add" value="'.$row['R_ID'].'">'."\n")"</td>";
                                        echo("<td class=''>"'<input type="submit" value="ADD" name="ADD">'"</td>");
                                        echo("\n</form>\n");
                                        echo "</tr>";
                                        $count++;
                                    }
                                    ?>
                                    </tbody>
                        </table>
                        <p></p>
                        <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="../doctorpage.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                                back
                </a>
                </body>
        </html>
        