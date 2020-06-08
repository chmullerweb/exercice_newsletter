<?php

session_start();


$serveur = 'localhost';
$utilisateur = 'root';
$motdepasse = '';
$nomBaseDeDonnees = "formation_newsletter";

//On établit la connexion à ma base de donnée via la méthode PDO
$bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//Je crée une fonction pour afficher plus proprement les données d'un tableau (les réponses de ma base de données)
function vd($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
}