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
    <div id="container">
        <form action="" method="post" class="formulaire">
            <h1>Connexion</h1>
            <label for="identifiant"><b>Identifiant :</b></label>
            <input type="text" name="identifiant" id="identifiant" name="identifiant" class="zonetext">

            <label for="mdp"><b>Mot de passe :</b></label>
            <input type="password" name="mdp" id="mdp" name="mdp" class="zonetext">
            <input type="submit" value="Se connecter" name="btlogin" id="submit" class="submit">

            <?php 
            if(isset($_POST['btlogin'])){

                $req = "select * from users where (mail ='".$_POST['identifiant']."' or pseudo ='".$_POST['identifiant']."') and mdp ='".$_POST['mdp']."'";

                if($resultatlog = mysqli_query($connect,$req)){
                    
                    $ligne = mysqli_fetch_assoc($resultatlog);
                    if($ligne != 0){

                        session_start();
                        $_SESSION['monlogin']= $_POST['identifiant'];
                        header("location:accueil.php");
                    }
                    else{
                        echo "<font color='#f0001d'>Identifiant ou mot de passe invalide</font>";
                    }
                } 
            }
        ?>
        </form>
    </div>
</body>
</html>