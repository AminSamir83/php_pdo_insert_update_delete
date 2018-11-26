<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 26/11/2018
 * Time: 12:06
 */
session_start();
require 'ConnexionPDO.php';
$connexionPDO = ConnexionPDO::getInstance();

$requete="select * from Utilisateur where cin=".$_GET['id'];

$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$utilisateur = $reponse->fetch(PDO::FETCH_OBJ);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier un utilisateur</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<?php if (isset($_SESSION['error'])){
    ?>
    <div class="container">
        <div class="alert alert-danger" style="margin: 0 !important;"><?= $_SESSION['error'] ?></div></div>
    <?php
    unset($_SESSION['error']);
}
$ancient=$_GET['id'];


?>


<form method="GET" action="miseAJourUtilisateur.php" >
    <table border="2">
    <tr><td><label for="cin">CIN </label></td><td><input class="form-control enter-text" type="number" required name="cin" id="cin" min="1" max="99999999" value=<?= $utilisateur->cin ?>></td></tr>
        <tr><td><label for=prenom>Prénom </label></td><td><input type="text" class="form-control enter-text" required  maxlength="30" name="prenom" id="prenom" value=<?= $utilisateur->prenom ?>></td></tr>
        <tr><td><label for="nom">Nom </label></td><td><input type="text" required class="form-control enter-text" name="nom"  maxlength="30" id="nom" value=<?= $utilisateur->nom ?>></td></tr>
        <tr><td><label for="age">Age </label></td><td><input type="number" required class="form-control enter-text" name="age" id="age" min="0" max="200" value=<?= $utilisateur->age ?>></td></tr>
        <tr><td><input class="btn btn-primary" type="submit" id="button-send" value="Mettre à jour" href='miseAJourUtilisateur.php?id=<?= $ancient ?>' ></td></tr>
    </table>

</form>

</body>
</html>