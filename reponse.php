<?php

include "config.php";


#Je vérifie que la personne a bien rempli le champ email. Si le champ email est correcte (c'est à dire qu'il est rempli et qu'il s'agit d'un email), on l'enregistre dans notre base de données. Dans le cas contraire, on retourne sur le formulaire en mettant un message d'erreur dans l'url.
    
    if(!empty($_POST["femail"]) && filter_var($_POST["femail"], FILTER_VALIDATE_EMAIL)){
        "INSERT INTO  inscription(nom, prenom, email)
        VALUES('$_POST[fnom]','$_POST[fprenom]','$_POST[femail]')";
    }
    else{
        header("location:formulaire.php?err=invalidAdressMail");
        exit;
    };





// je fabrique la chaine de caractere qui sera la requête pour ma base de données
// je peux écrire directement $_POST[nomDuChampDuFormulaire] car j'ai mis ma chaine entre double guillemet "
$maRequete = "INSERT INTO inscription(nom, prenom, email) VALUES ('$_POST[fnom]', '$_POST[fprenom]', '$_POST[femail]')";


// $bdd est défini dans mon fichier config.php
$bdd->query($maRequete);
$messageErreurBDD = $bdd -> errorInfo(); // je recupere l'eventuelle message d'erreur de ma base de donnée.



if(!empty($messageErreurBDD[1])) { // si j'ai une erreur, dans le tableau des erreurs, la seconde case à un chiffre qui indique l'erreur. Si il n'y a pas d'erreur, ce champs est vide
    $_SESSION["erreur"] = TRUE; // je crée une variable visible partout pour indiquer qu'il y a une erreur
} else {
    $_SESSION["success"] = TRUE; // je crée une variable qui indique que l'enregistrement s'est passé correctement.
}



header("location:lister_newsletter.php");

