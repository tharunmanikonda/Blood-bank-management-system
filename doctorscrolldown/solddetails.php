<?php
require_once "../pdo.php";

session_start();
if(isset($_POST['Cancel'])){
    header('Location: docterpage.php');
    return;
}
$stmt5 = $pdo->query("SELECT sold.R_ID,request.R_NAME,request.R_UNITS FROM sold JOIN request WHERE sold.R_ID= request.R_ID");
    $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

    echo "<p>sold details</p>";
    echo '<table border="1">'."\n";
    echo "<tr><td>";
            echo "name:";
            echo"</td><td>";
            echo "phone no:";
            echo"</td><td>";
            echo "units:";
            echo"</td><td>";
    foreach ( $rows5 as $row ) {
        echo "<tr><td>";
        echo($row['R_NAME']);
        echo("</td><td>");
        echo($row['R_PHONENO']);
        echo("</td><td>");
        echo($row['R_UNITS']);
        echo("</td><td>");

    }
    
    echo "</table>\n";
?>