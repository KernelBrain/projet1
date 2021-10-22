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
    <div id="entete">

       <a href="login.php" class="login">login</a>
       
       <img src="assets/images/34.png" alt="" class="image-entete" >
       <p class="nomsite">GEEK-STOCK</p>
       <div id="form-pro">
            <form action="" name="form-pro" method="post">
                <input id="motcle" type="text" name="motcle">
                <input type="submit" value="recherche" name="btsubmit" class="btfind">
            </form>
       </div>
    </div>
    <div id="produits">
        <?php
            if(isset($_POST['btsubmit'])){
                    $mc = $_POST['motcle'];

                    $reqSelect = "select * from produits where libelle like '%$mc%'";
            }
            else{
                $reqSelect = "select * from produits";
            }

            $resultat = mysqli_query($connect,$reqSelect);
            $nbre = mysqli_num_rows($resultat);

            echo "<P><b>".$nbre."</b> Resultats de votre recherche ...</P>";

            while($ligne = mysqli_fetch_assoc($resultat))
            {
        ?>
            <div id="pro">
                <img src="<?= $ligne['photo']; ?>"> <br>
                <?= $ligne['reference']; ?> <br>
                <?= $ligne['libelle']; ?> <br>
                <?= $ligne['qte_min']; ?> <br>
                <?= $ligne['qte_stock']; ?>

            </div>


        <?php } ?>
    </div>
</body>
</html>