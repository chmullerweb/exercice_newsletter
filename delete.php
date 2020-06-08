<?php 

include "config.php";

#Si l'internaute clique sur effacer, la ligne sur laquelle il clique renvoit un paramètre d'url. 

$inscritDelete = $_GET['delete'];

#J'envoie ma requête à la base de donnée lui indiquant quel ligne id_inscription elle doit supprimer. Cette information est encapsulée dans une variable $_GET
$maRequeteDelete = "DELETE FROM inscription WHERE id_inscription = $inscritDelete";

$bdd->query($maRequeteDelete);

header("location:lister_newsletter.php");
exit;


