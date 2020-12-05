<?php
require_once "pdo.php";

if (isset($_POST['name'])&& isset($_POST['phoneno'])&& isset($_POST['email'])&& isset($_POST['address'])){
$sql = "INSERT INTO doctor (NAME,PHONENO,EMAIL,address) VALUES (:name ,:pno,:email,:address)";
    echo ("<pre>\n".$sql."\n</pre>\n");
     $stmt = $pdo->prepare($sql);
     $stmt->execute(array(
        ':name' => $_POST['name'],
        ':pno'=> $_POST['phoneno'],
        ':email' => $_POST['email'],
        ':address' =>$_POST['address']));

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
   <P> <label for="NAME"> NAME:</label>
    <input type="text" id="name" name="name">
    <br>
    </P>
    <P> <label for="PHONENO"> PHONE NO:</label>
    <input type="text" id="phoneno" name="phoneno">
    <br>
    </P>
    <P> <label for="email"> EMAIL:</label>
    <input type="email" id="email" name="email">
    <br>
    </P>
    <P> <label for="address"> ADDRESS:</label>
    <input type="text" id="address" name="address">
    <br>
    </P>
    <input type="submit" value ="add" id="submit">

</form>
</body>
</html>