<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 25/11/2018
 * Time: 22:04
 */
session_start();
require 'ConnexionPDO.php';


/*if ((preg_match('~[0-9]~', $_POST['nom']))  || (preg_match('~[0-9]~', $_POST['prenom'])))
{

    $_SESSION['error'] = "Le nom et le prénom ne doivent pas contenir de nombres";
    header('Location: ajouterUtilisateurs.php');
    }*/







$connexionPDO = ConnexionPDO::getInstance();

$requete="insert into Utilisateur (cin,prenom,nom,age) values (:cin,:prenom,:nom,:age)";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_POST['nom'],'prenom' => $_POST['prenom'],'cin'=>$_POST['cin'],'age'=>$_POST['age'] ));

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);

header("location: listerUtilisateurs.php");

