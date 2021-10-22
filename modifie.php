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
       <form action="" name="formupdate" method="post" class="formulaire" enctype="multipart/form-data">
        
           <h2 align="center">Mettre a jour un produit...</h2>
           <label><b>Reference :</b></label>
           <input type="text" name="refprod" class="zonetext" value="<?= $_GET['modpro'];?>" readonly>
           <label><b>libelle :</b></label>
           <input type="text" class="zonetext" name="libprod" placeholder="Entrer le libelle du produit ici..." required>
           <label><b>Quantite Minimale :</b></label>
           <input type="number" class="zonetext" name="qte_min" placeholder="Entrer la quantite minimal du produit ici..." required>
           <label><b>Quantite en stock :</b></label>
           <input type="number" class="zonetext" name="qte_stock" placeholder="Entrer la quantite en stock du produit .." required>
           <label><b>Image du produit :</b></label>
           <input type="file" class="zonetext" name="photo" placeholder="Entrer l'image du produit..." required>
        
            <input type="submit" value="Metter a jour" name="btmod" class="submit">   

            <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>
            
            <label style="text-align: center; color:#360081">
        
                <?php

                    if(isset($_POST['btmod'])){

                        $refprod = $_POST['refprod'];
                        $libpro = $_POST['libprod'];
                        $qte_min = $_POST['qte_min'];
                        $qte_stock = $_POST['qte_stock'];
                        $photo = $_FILES['photo']['name'];
                        $modific = $_GET['modpro'];
                        $traget ="assets/images/". $_FILES['photo']['tmp_name'];
                        move_uploaded_file($photo,$traget);

                        $requp = "UPDATE produits SET reference='$refprod', photo='$traget', libelle='$libpro', qte_min='$qte_min', qte_stock='$qte_stock' WHERE reference = '$modific'";

                        $resultat = mysqli_query($connect,$requp);

                        if($resultat){
                            echo "Mise a jour des donnees validees...";
                        }else{
                            echo "Echec de modification de donnees...";
                        }
                    }
                ?>
            
            </label>

        </form>
   </div>
</body>
</html>