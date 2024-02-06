<?php
require_once('cnx.php');
$message = '';
// on pose une condityion pour verifier si l'utilisateur à cliquer sur le bouton
if(isset($_POST['create'])) {

if( (empty($_POST['client_prenom'])) ||  (empty($_POST['client_nom']))  || (empty($_POST['client_mail']))   ){
$message = '<p class="info">Veuillez remplir les champs</p>';
} else {
// nous créons la requette sql pour créer un nouveau client et l'inserer dans notre table
$sql="INSERT INTO `clients` (`client_nom`, `client_prenom`, `client_mail`) VALUES  (?,?,?)";
// on prepare l'insertion à la table
$rs_insert = $cnx ->prepare($sql);

$var_prenom = $_POST['client_prenom'];
$var_nom = $_POST['client_nom'];
$var_mail = $_POST['client_mail'];


// on créer troi variables temporaire pour verifier la qualité des informations
$rs_insert ->bindValue(1, $var_prenom, PDO::PARAM_STR);
$rs_insert ->bindValue(2, $var_nom, PDO::PARAM_STR);
$rs_insert ->bindValue(3, $var_mail, PDO::PARAM_STR);


// on execute ensuite la requette
$rs_insert->execute();


$message = '<p class="green">Client créé</p>';
}}
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
    <h1>Créer un nouveau client</h1>
    
    <form action="" method="post">
        <input type="text" name="client_prenom" placeholder="Prenom">
        <br><br>
        <input type="text" name="client_nom" placeholder="Nom">
        <br><br>
        <input type="email" name="client_mail" placeholder="Email">
        <br><br>
        <?= $message; ?>
        <br>
    <input type="submit" name="create" value="Créer">
</form>

<a href="index.php">Retour</a>
    
</body>
</html>