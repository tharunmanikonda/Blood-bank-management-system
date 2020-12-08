<?php
require_once "pdo.php";
$stmt = $pdo->query("SELECT * FROM blood_group");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ( isset($_POST['name']) && isset($_POST['number']) 
     &&isset($_POST['units']) && isset($_POST['address']) &&isset($_POST['blood_group']) ) {
    $sql = "INSERT INTO request (R_NAME,R_PHONENO, R_UNITS,R_ADDRESS,BLOOD_ID) 
              VALUES (:name,:phno,:units,:address,:bloodid)";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => ($_POST['name']),
        ':phno' => ($_POST['number']),
        ':units' => ($_POST['units']),
        ':address'=>($_POST['address']),
         ':bloodid'=>($_POST['blood_group']),

        
        )

    );
    
    $_SESSION['success'] = "data inserted";
    header('Location: index.php');

 
  

}

?>
<html>
<head></head><body>
<p>Add A New User</p>
<form method="post">
<p>Name:
<label for="name"></label>
<input type="text" name="name" size="40"></p>
<p>phone no:
<input type="text" name ="number" >
</p>
<p>UNITS:
<label for="units"></label>
<input type="text" name="units"></p>
<p>ADDRESS:
<label for="address"></label>
<input type="text" name="address"></p>
<p><label for="blood type">TYPE OF BLOOD:</label>
    <select id="blood_group" name="blood_group">
            <?php
            foreach($rows as $row){
                echo "<option value = ".$row['BLOOD_ID'].">";
                echo htmlentities($row['TYPE_OF_BLOOD']);
                echo "</option>";
            } 
            ?>
            </select></p>
     <br>
<p><input type="submit" value="Add New"/></p>
</form>
</body>
