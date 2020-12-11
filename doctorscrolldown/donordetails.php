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
</head>
<body>
<?php 
$stmt3 = $pdo->query("SELECT D_NAME,D_AMOUNT FROM `doner`");
$rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
echo "<p>donors are </p>";
echo '<table border="1">'."\n";
echo "<tr><td>";
echo "name:";
echo"</td><td>";
echo "amount:";
echo"</td><td>";
foreach ( $rows3 as $row ) {
    echo "<tr><td>";
    echo($row['D_NAME']);
    echo("</td><td>");
    echo($row['D_AMOUNT']);
    echo("</td><td>");
   
}
echo "</table>\n";
?>
</body>
</html>
