
<?php 
require_once "../pdo.php";

session_start();
if(isset($_POST['Cancel'])){
    header('Location: docterpage.php');
    return;
}

$stmt4 = $pdo->query("SELECT R_NAME,R_PHONENO,R_UNITS FROM `request`");
$rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

echo"<p>requests are </p>";
echo '<table border="1">'."\n";
echo "<tr><td>";
echo "name:";
echo"</td><td>";
echo "phone no:";
echo"</td><td>";
echo "units:";
echo"</td><td>";
echo "add:";
echo"</td><td>";
foreach ( $rows4 as $row ) {
    
    echo "<tr><td>";
    echo($row['R_NAME']);
    echo("</td><td>");
    echo($row['R_PHONENO']);
    echo("</td><td>");
    echo($row['R_UNITS']);
    echo("</td><td>");
    echo('<form method="post"><input type="hidden" ');
    echo('name="add" value="'.$row['R_NAME'].'">'."\n");
    echo('<input type="submit" value="ADD" name="ADD">');
    echo("\n</form>\n");
    echo("</td></tr>\n");
   

}
echo "</table>\n";
