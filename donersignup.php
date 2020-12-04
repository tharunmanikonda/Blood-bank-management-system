<?php 
include_once "pdo.php";
$stmt = $pdo->query("SELECT * FROM blood_group");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>doner table :</h1>
    <form method="post">
    <label for="D_NAME"> NAME:</label>
    <input type="text" id="D_NAME" name="name">
    <br>
    <label for="D_AGE"> AGE:</label>
    <input type="text" id="D_AGE" name="age">
    <br>
    <label for="PHONENO"> PHONE NO:</label>
    <input type="text" id="D_PHONENO" name="phoneno">
    <br>
    <label for="D_EMAIL">EMAIL:</label>
    <input type="text" id="D_EMAIL" name ="emailid" >
    <br>
    <label for="D_ADDRESS"> ADDRESS:</label>
    <input type="text" name="address" id="D_ADDRESS">
    <br>
    <label for="D_AMOUNT">AMOUNT:</label>
    <input type="text" name="amount" id="D_AMOUNT">
    <br>
    <input type="submit" value="submit" id="submit">
    <select name="blood group" id="blood_group">
    <?php
     foreach($rows as $row){
        echo "<option value=".$row['blood_id'].">";
        echo htmlentities($row['TYPE_OF_BLOOD']);
        echo "</option>";
    }
    ?>
     </select>
    <input type="submit"value="submit">
    

    
    </form>
</body>
</html>
