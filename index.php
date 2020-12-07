

<?php 
session_start();
echo "hii";
echo "<a href='signout.php'></a>";
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
if(isset($_SESSION['success'])){
echo "<a href='signout.php'></a>";
}
?>
</body>
</html>