<?php 
require_once "pdo.php";

session_start();

  if(isset($_POST['Cancel'])){
    header('Location: index.php');
    return;
  }


$stmt = $pdo->query("SELECT * FROM blood_group");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ( isset($_POST['username'])) {
    if((strlen($_POST['username'])>0) && strlen($_POST['password']>=8)){
        if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['phoneno']) && 
            isset($_POST['emailid']) && isset($_POST['address']) && isset($_POST['amount']) && isset($_POST['blood_group'])) {
            $sql = "INSERT INTO doner(D_NAME,D_AGE, D_PHONENO, D_EMAIL, D_ADDRESS,D_AMOUNT,blood_id)
            VALUES (:name,:age,:phoneno,:emailid,:address,:amount ,:bid)";
            echo ("<pre>\n".$sql."\n</pre>\n");
            $stmt2 = $pdo->prepare($sql);
            $stmt2->execute(array(
            ':name' => $_POST['name'],
            ':age'=> ($_POST['age']),
            ':phoneno'=>$_POST['phoneno'],
            ':emailid' =>$_POST['emailid'],
            ':address' =>$_POST['address'],
            ':amount' =>$_POST['amount'],
            ':bid'=>$_POST['blood_group'])
            );
       
        $stmt3 = $pdo->query("SELECT * FROM `doner` WHERE `D_NAME` = '".$_POST['name']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);


            $stmt1 = $pdo->prepare('INSERT INTO doner_signin(USERNAME,PASSWORD,D_ID) VALUES ( :ur, :pw, :dn)');
            $stmt1->execute(array(
                ':ur' => $_POST['username'],
                ':pw' => $_POST['password'],
                ':dn' => $rows2[0]['D_ID'],)
                );$_fal="Record inserted";

                $_SESSION['success'] = "data inserted";
                    header('Location: index.php');


    
            }
            else{
                $_SESSION['error'] = "enter data according to requirements";
                header('location:docter.php');
                return;
            }
        
         }

    }
    echo $_POST['username'];
    echo $_POST['password'];
    echo $_POST['D_ID'];




?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<h1>doner table :</h1>
<?php
 if(isset($_SESSION['error'])){
     echo $_SESSION['error'];
     unset($_SESSION['error']);
 }
 ?>
 
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
    <label for="username">username:</label>
    <input type="text" name="username" id="username">
    <p>	password:
            <input type="password" name="password" size="60"/></p>
    <label for="blood type">TYPE OF BLOOD:</label>
    <select id="blood_group" name="blood_group">
            <?php
            foreach($rows as $row){
                echo "<option value = ".$row['BLOOD_ID'].">";
                echo htmlentities($row['TYPE_OF_BLOOD']);
                echo "</option>";
            } 
            ?>
            </select>
     <br>
    <input type="submit"value="submit">
    <input type="submit" value ="Cancel" name="cancel" id="cancel">
    

    
    </form>
</body>
</html>