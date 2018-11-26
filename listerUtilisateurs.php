<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 25/11/2018
 * Time: 22:26
 */
session_start();
require 'ConnexionPDO.php';
if (isset($_SESSION['error'])) {  header('Location: ajouterUtilisateurs.php');}


$connexionPDO = ConnexionPDO::getInstance();

$requete="select * from Utilisateur ";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);


?>
<html>
<head>
    <title>Liste des utilisateurs</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<span style="display:block;text-align: center;color: green;font-size:larger ">Liste des utilisateurs</span><br><br>
<table  class = "table" style="margin-left:auto;margin-right:auto;display:block;width:36%;">
    <thead class="thead-dark">
    <tr>
        <th>
            CIN
        </th>
        <th>
            Prénom
        </th>
        <th>
            Nom
        </th>
        <th>
            Age
        </th>
        <th>
            Update
        </th>
        <th>
            Delete
        </th>
    </tr>
    </thead>
    <?php foreach ($utilisateurs as $utilisateur) { ?>
        <tr>
            <td>
                <?= $utilisateur->cin ?>
            </td>
            <td>
                <?= $utilisateur->prenom ?>
            </td>
            <td>
                <?= $utilisateur->nom ?>
            </td>
            <td>
                <?= $utilisateur->age ?>
            </td>
            <td>
                <form action="mettreAJourUtilisateur.php" method="get">
                    <a class="btn btn-dark" value="Update" name="update" href="mettreAJourUtilisateur.php?id=<?=$utilisateur->cin?>" ?>Update</a>
                </form>
            </td>
            <td>
                <form action="supprimerUtilisateur.php" method="get">
                    <a class="btn btn-dark" value="Delete" name="delete" href='supprimerUtilisateur.php?id=<?= $utilisateur->cin ?>'>Delete</a>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>


</body>
</html>