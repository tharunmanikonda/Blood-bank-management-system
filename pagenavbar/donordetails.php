<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
</head>
<body>
   <h1>hii</h1>    
   <div class="navbar">
   <a href="index.php">blood donation</a>
   <a href="donordetails.php"><?php echo $_SESSION['USERNAME']; ?></a>
  <a href="login/donorsignin.php">donor</a>
  <a href="request.php">request</a> 
</body>
</html>
<?php
require_once "../pdo.php";
$stmt3 = $pdo->query("SELECT * FROM `doner` WHERE `D_NAME` = '".$_SESSION['USERNAME']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        echo $_SESSION['USERNAME'];
echo '<table border="1">'."\n";
echo "<tr><td>";
echo "name:";
echo"</td><td>";
echo "age:";
echo"</td><td>";
echo "mobile number:";
echo"</td><td>";
echo "email:";
echo"</td><td>";
echo "Address:";
echo"</td><td>";
foreach ( $rows2 as $row ) {
    echo "<tr><td>";
    echo($row['D_NAME']);
    echo("</td><td>");
    echo($row['D_AGE']);
    echo("</td><td>");
    echo($row['D_PHONENO']);
    echo("</td><td>");
    echo($row['D_EMAIL']);
    echo("</td><td>");
    echo($row['D_ADDRESS']);
    echo("</td><td>");
   
}
echo "</table>\n";

        ?>
        
        
