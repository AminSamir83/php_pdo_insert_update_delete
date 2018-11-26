<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 26/11/2018
 * Time: 15:55
 */
session_start();
require 'ConnexionPDO.php';
$connexionPDO = ConnexionPDO::getInstance();

$requete="delete from  Utilisateur where cin=".$_GET['id'];

$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$utilisateur = $reponse->fetch(PDO::FETCH_OBJ);

header("location: listerUtilisateurs.php");
?>