<?php
require_once('cnx.php');

$message = "";
if(isset($_GET['id'])){

$sql = "DELETE FROM clients WHERE client_id = ?";
$rs_supp = $cnx->prepare($sql);

$var_client_id = $_GET['id'];
$rs_supp->bindValue(1, $var_client_id, PDO::PARAM_INT);
$rs_supp->execute();

$message = "<p class='green'>Client supprimé</p>";

}else {
    $message = "<p class='info' >Il y a eu une erreur</p>";
}
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
<h1>Supprimer un client</h1>
<?php echo $message ;?>
<a href="index.php">Retour</a>

</body>
</html>