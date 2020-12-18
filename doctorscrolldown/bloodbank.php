<?php 
session_start(); 
require_once "../pdo.php";
$sql = $pdo->query("SELECT blood_group.TYPE_OF_BLOOD,SUM(blood_bank.UNITS) as total_blood FROM blood_bank 
LEFT JOIN blood_group on blood_bank.BLOOD_ID = blood_group.BLOOD_ID");
         $rows2 = $sql->fetchAll(PDO::FETCH_ASSOC);
         $count =1;
         print_r($rows2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="text-center">


<div class="container">
<?php require_once "bootstrap.php";?>
<h1>Blood Bank</h1>
                <table class="table table-dark table-hover">
                   <thead>
                        <tr>
                             <th scope="col">sno</th>
                             <th scope="col">blood group</th>
                             <th scope="col">Total Units</th>
                        </tr>
                    </thead>
                            <tbody>
                                <?php
                                    foreach ( $rows2 as $row ) {
                                        echo "<td class=''>".$count."</td>";
                                        echo "<td class=''>".htmlentities($rows2[0]['TYPE_OF_BLOOD'])."</td>";
                                        echo "<td class=''>".htmlentities($rows2[0]['total_blood'])."</td>";
                                        echo "</tr>";
                                        $count++;
                                        }
                                ?>
                            </tbody>
                </table>
 </div> 
 <link rel="stylesheet" href="../bootstrap/css/background.css">  
</body>
</html>