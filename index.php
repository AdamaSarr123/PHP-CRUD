<!-- On inclus notre fichier avec la méthode require et require_once pour l'appeler une seul fois -->
<?php
require_once('cnx.php');



$sql = "SELECT client_nom, client_prenom, client_mail, client_id FROM clients ORDER BY client_id DESC";
$rs_select = $cnx ->prepare($sql);
$rs_select->execute();




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./style.css">
    <title>PHP & SQL</title>
</head>
<body>

<h1>Liste des clients</h1>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Mail</th>
            <th>Actions</th>
</tr>
    </thead>
    <tbody>
<?php 
while( $donnees = $rs_select-> fetch(PDO::FETCH_ASSOC)){
?>
        <tr>
            <td><?= $donnees['client_nom'] ?></td>
            <td><?= $donnees['client_prenom'] ?></td>
            <td><?= $donnees['client_mail'] ?></td>
           <td><a href="modify.php?id=<?php echo $donnees['client_id']; ?>">Modifier le client</a>
           <a href="delete.php?id=<?php echo $donnees['client_id']; ?>">Supprimer client</a>
</td> 
        </tr>
<?php } ?>

    </tbody>
</table>

<a href="create.php">Créer un nouveau client</a>

</body>
</html>



