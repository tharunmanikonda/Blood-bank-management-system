

<?php 
session_start();
require_once "../pdo.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include_once "../donorpagenavbar.php";
?>
    </head>
<body>
    <h1>hii</h1>
</body>
</html>
<?php
//if(isset($_POST['Cancel'])){
    //header('Location: donorpage.php');
    //return;


?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?//php require_once "bootstrap.php"?>
</head>
<body>

<form method="post">
<label for="details">menu</label>

<select name="details" id="details">
    <option value=" ">choose the option</option>
  <option value="donor">donor</option>
  <option value="request">request</option>
  <option value="sold">sold</option>
</select>
<input type="submit" name="submit" id="submit">
<input type="submit" value ="Cancel" name="Cancel" id="cancel">
</form>
</body>
</html>!--->