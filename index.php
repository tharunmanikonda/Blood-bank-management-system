

<?php 
session_start();
require_once "navigationbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "bootstrap.php"?>
</head>
<body>
<?php 

if(isset($_SESSION['D_ID'])){
echo "<a href='signout.php'>signout</a>";
}
else require_once "navigationbar.php";
?>
</body>
</html>