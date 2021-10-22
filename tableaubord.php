<?php include('config/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tableau de bord</title>
</head>
<body>
   <p>
       <h1><b>Liste des Produits...</b></h1>
       <?php
            $reqselect = "select * from produits";
            $result =mysqli_query($connect,$reqselect);

            $nbr = mysqli_num_rows($result);    

            echo "<p>Total <b> ".$nbr."</b> de produits en stock...</p>";    
        ?>
     </p>
     <p><a href="ajouter.php"><img title="ajouter un produit" src="assets/images/plus.svg" style="background-color: green;" width="50px" height="50px"></a></p>
     <table width="100%" border="1">
        <tr>
            <th>Images</th>
            <th>References</th>
            <th>Libelle</th>
            <th>Quantite minimal</th> 
            <th>Quantite en stock</th>
            <th>Supprimer</th> 
            <th>M0difier</th>
        </tr>
        <?php 
            while($ligne = mysqli_fetch_assoc($result))
            {
        ?>

            <tr>
                <td><img src="<?= $ligne['photo'];?>" class="photo "></td>
                <td><?= $ligne['reference'];?></td>
                <td><?= $ligne['libelle'];?></td>
                <td><?= $ligne['qte_min'];?></td>
                <td><?= $ligne['qte_stock'];?></td>
                <td><a href="supprime.php?supprod=<?= $ligne['reference'];?>"><img title="supprimer un produit" src="assets/images/trash.svg" style="background-color: #f30;" width="50px" height="50px"></a></td>
                <td><a href="modifie.php?modpro=<?= $ligne['reference'];?>"><img title="modifier un produit" src="assets/images/edit-button.png" style="background-color: blue;" width="50px" height="50px"></a></td>
            </tr>

        <?php
            }
        ?>

     </table>
</body>
</html>