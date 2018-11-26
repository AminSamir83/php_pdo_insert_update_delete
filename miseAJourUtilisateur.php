<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 26/11/2018
 * Time: 12:16
 */
session_start();
require 'ConnexionPDO.php';


if ((preg_match('~[0-9]~', $_GET['nom']))  || (preg_match('~[0-9]~', $_GET['prenom'])))
{

    $_SESSION['error'] = "Le nom et le prénom ne doivent pas contenir de nombres";
    header("Location: mettreAJourUtilisateur.php?id=".$_GET['cin'] );
    exit();
}

$connexionPDO = ConnexionPDO::getInstance();
var_dump($_GET['cin']);
$id=$_GET['cin'];
var_dump($_GET);
$requete="UPDATE Utilisateur SET cin= :cin,prenom= :prenom,nom= :nom,age= :age WHERE cin=".$id;

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_GET['nom'],
    'prenom' => $_GET['prenom'],
    'cin'=>$_GET['cin'],
    'age'=>$_GET['age'] ));

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);


header("location: listerUtilisateurs.php");