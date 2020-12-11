<?php 
require_once "pdo.php";
require_once "doctorpagenavbar.php";

session_start();
/*
if(isset($_POST['Cancel'])){
    header('Location: docterpage.php');
    return;
  }

if (isset($_POST['ADD'])){
    $sql = $pdo->query("SELECT 	request.R_ID ,blood_bank.B_ID FROM `request` JOIN blood_bank WHERE `R_NAME` ='".$_POST['R_NAME']."'");
    $rows2 = $sql->fetchAll(PDO::FETCH_ASSOC);

    $stmt1 = $pdo->prepare('INSERT INTO sold (R_ID,B_ID) VALUES ( :id, :bid)');
                $stmt1->execute(array(
                    ':id' => $rows2[0]['R_ID'],
                    ':bid' => $rows2[0]['B_ID'])
                    );
    
}

if(($_POST['details'])=="donor"){
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


}
else if(($_POST['details'])=="request"){
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
            
    
}

else if(($_POST['details'])=="sold"){
    $stmt5 = $pdo->query("SELECT sold.R_ID,request.R_NAME,request.R_UNITS FROM sold JOIN request WHERE sold.R_ID= request.R_ID");
    $rows5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

    echo "<p>sold details</p>";
    echo '<table border="1">'."\n";
    echo "<tr><td>";
            echo "name:";
            echo"</td><td>";
            echo "phone no:";
            echo"</td><td>";
            echo "units:";
            echo"</td><td>";
    foreach ( $rows5 as $row ) {
        echo "<tr><td>";
        echo($row['R_NAME']);
        echo("</td><td>");
        echo($row['R_PHONENO']);
        echo("</td><td>");
        echo($row['R_UNITS']);
        echo("</td><td>");

    }
    
    echo "</table>\n";


}



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

<form method="post">
<label for="details">menu</label>

<select name="details" id="details">
    <option value=" ">choose the option</option>
  <option value="donor">donor</option>
  <option value="request">request</option>
  <option value="sold">sold</option>
</select>
<input type="submit" name="submit" id="submit">
<input type="submit" value ="Cancel" name="cancel" id="cancel">
</form>
</body>
</html>

<!--foreach($rows as $row){
    echo "<li>";
    echo htmlentities($row['name']);
    echo " ".htmlentities($row['donationS']);
    echo(" <a href='admin/delete.php?donor_id=".$row['donor_id']."'>Delete</a>");

    echo "</li>";
}
*/