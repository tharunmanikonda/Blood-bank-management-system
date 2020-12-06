<?php
session_start();
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    require_once "../pdo.php";
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
<form method ="post" >
<p>
<label for="username">USERNAME:</label>
<input type="text" name ="username" id="username">
</p>
<P>
<label for="password">PASSWORD:</label>
<input type="text" name ="password" id ="password">
</p>
<input type="submit" value="submit" id="submit">
<input type="submit" value="Cancel" id ="Cancel">
</form>
    
</body>
</html>