<?php include('config/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
   <div id="global">
        <div id="profil">

            <?php 
                session_start();
                echo "Bonjour et Bienvenue ".$_SESSION['monlogin']."<br/>";

                $req ="select * from users where pseudo='".$_SESSION['monlogin']."'";
                $resultat = mysqli_query($connect,$req);
                $ligne = mysqli_fetch_assoc($resultat);

            ?>
            <img src="<?= $ligne['photo'];?>" class="photo">

            <br/>
            <a href="deconnecter.php">Deconnection</a>

        </div>
        <div id="tableaubord">

            <?php include("tableaubord.php"); ?>

        </div>
   </div>
</body>
</html>