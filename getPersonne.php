<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 25/11/2018
 * Time: 17:35
 */

require 'ConnexionPDO.php';
$_POST['nom']??'';
$_POST['prenom']??'';

$connexionPDO = ConnexionPDO::getInstance();

$requete="select * from Utilisateur where prenom = :prenom and nom= :nom";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_POST['nom'],'prenom' => $_POST['prenom'] ));

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);


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


</body>
</html>