<?php include('config/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Bienvenu sur Geek-Shop</title>
</head>
<body>
   <div id="container">
       <form action="" name="formdele" class="formulaire">
            <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>
            <?php
                if(isset($_GET['supprod'])){
                    $sup = $_GET['supprod'];
                    $reqdel = "DELETE FROM produits WHERE reference='$sup'";
                    $resultat = mysqli_query($connect,$reqdel);
                }
                if($resultat){

                    echo "<label style='text-align:center; color: #960406'> Suppression effectuée avec succèss...</label>";

                }else{

                    echo"<label style='text-align:center; color: #960406'> Erreur: la suppression a échouée... </label>";

                }

            ?>
        </form>
    </div>
</body>
</html>