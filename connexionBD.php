<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 23/11/2018
 * Time: 11:26
 */

require 'ConnexionPDO.php';


    $connexionPDO = ConnexionPDO::getInstance();



$requete="select * from Utilisateur";
$requete2="select * from Utilisateur where age<30 order by age desc";
$requete3="select COUNT(*) as nb, AVG(age) AS age_moyen , MAX(age) AS age_max,MIN(age) AS age_min from Utilisateur";
$requete4="select nom, AVG(age) AS age_moyen , MAX(age) AS age_max,MIN(age) AS age_min from Utilisateur group by nom having age_moyen>29";
$reponse= $connexionPDO->query($requete);
$reponse2= $connexionPDO->query($requete2);
$reponse3= $connexionPDO->query($requete3);
$reponse4= $connexionPDO->query($requete4);
$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);
$utilisateurs2 = $reponse2->fetchAll(PDO::FETCH_OBJ);
$utilisateurs3 = $reponse3->fetch(PDO::FETCH_OBJ);
$utilisateurs4 = $reponse4->fetchAll(PDO::FETCH_OBJ);
var_dump($reponse3->fetchAll(PDO::FETCH_OBJ));
?>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>
<body>
<span>Liste des utilisateurs</span><br>
    <table border="1">
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
        </tr>
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
        </tr>
        <?php } ?>
    </table>
Le nombre des utilisateurs est <?= $utilisateurs3->nb; ?> <br>
L'âge moyen est <?= $utilisateurs3->age_moyen; ?> <br>
L'âge minimal est <?= $utilisateurs3->age_min; ?> <br>
L'âge maximal est <?= $utilisateurs3->age_max; ?> <br>

<span>Liste des utilisateurs de moins de 30 ans classés par âge</span><br>
<table border="1">
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
    </tr>
    <?php foreach ($utilisateurs2 as $utilisateur) { ?>
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
        </tr>
    <?php } ?>
</table>
<span>Liste des noms des utilisateurs ayant un âge moyen supérieur à 29 groupés par nom</span><br>
<table border="1">
    <tr>
        <th>
            Nom
        </th>
        <th>
            Age Moyen
        </th>
        <th>
            Age Minimal
        </th>
        <th>
            Age Maximal
        </th>
    </tr>
    <?php foreach ($utilisateurs4 as $utilisateur) { ?>
        <tr>
            <td>
                <?= $utilisateur->nom ?>
            </td>
            <td>
                <?= $utilisateur->age_moyen ?>
            </td>
            <td>
                <?= $utilisateur->age_min ?>
            </td>
            <td>
                <?= $utilisateur->age_max ?>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>