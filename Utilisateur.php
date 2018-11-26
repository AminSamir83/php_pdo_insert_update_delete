<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 23/11/2018
 * Time: 11:02
 */

class Utilisateur
{
private $cin;
private $prenom;
private $nom;
private $age;

    /**
     * Utilisateur constructor.
     * @param $cin
     * @param $prenom
     * @param $nom
     * @param $age
     */
    public function __construct($cin, $prenom, $nom, $age)
    {
        $this->cin = $cin;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
        echo "<br> l'utilisateur a été construit <br>";
    }

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin): void
    {
        $this->cin = $cin;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }
    public function getFullName(){
        return $this->prenom." ".$this->nom;
    }
    public function isAged() {
        if ($this->age<=29) return false;
        else return true;
    }
    public function __destruct()
    {
        echo "<br> L'utlisateur a été détruit <br>";
    }


}