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
        <form action="" enctype="multipart/form-data" name="formadd" method="post" class="formulaire">

            <h2 align="center">Ajputer un nouveau produit...</h2>
            <label for=""><b>Reference :</b></label>
            <input type="text" name="refprod" class="zonetext" placeholder="Entrer la reference du produit" required>
            <label for=""><b>libelle :</b></label>
            <input type="text" name="libprod" class="zonetext" placeholder="Entrer le libelle du produit" required>
            <label for=""><b>Quantite minimal :</b></label>
            <input type="number" name= "qte_min" class="zonetext" placeholder="Entrer la quantite du produit" required>
            <label for=""><b>Quantite en stock :</b></label>
            <input type="number" name= "qte_stock" class="zonetext" placeholder="Entrer la quantite en stock du produit" required>
            <label for=""><b>Image du produit :</b></label>
            <input type="file" name= "txtphoto" class="zonetext" placeholder="Choisir une image du produit" required>
            <input type="submit" value="Ajouter" id="submit" class="submit" name="btadd">

            <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>

            <label for="" style="text-align: center; color:#960406;">

                <?php

                    if(isset($_POST['btadd'])){

                        $refpro = $_POST['refprod'];
                        $libpro = $_POST['libprod'];
                        $qte_min = $_POST['qte_min'];
                        $qte_stock = $_POST['qte_stock'];
                        $photo = $_FILES['txtphoto']['name'];
                        $traget = "images/".$_FILES['txtphoto']['name'];

                        move_uploaded_file($photo, $traget);

                        $reqadd = "INSERT INTO produits(reference, photo, libelle, qte_min, qte_stock) values
                        ('$refpro', '$traget', '$libpro', '$qte_min', '$qte_stock')";
                        
                        $resultat = mysqli_query($connect,$reqadd);

                        if($resultat){
                            echo"Les données ont bien été inserer avec succèss";
                        }else{
                            echo "Erreur, les données n'ont pas été inserer";
                        }
                    }
                ?>
            </label>
        </form>
    </div>
</body>
</html>