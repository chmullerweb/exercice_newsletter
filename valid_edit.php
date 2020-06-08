<?php 

include "config.php";


// je fabrique la requête pour ma base de données et la rentre dans une variable $monEdit

$monEdit = "UPDATE  inscription
        SET nom = '$_POST[editfnom]',
            prenom = '$_POST[editfprenom]',
            email = '$_POST[editfemail]'
        WHERE id_inscription = '$_POST[id_inscrit]' ";
 
#Je vérifie que la personne a bien rempli les champs. Si c'est correct, on met à jour la base de donnée. Dans le cas contraire, on retourne sur le formulaire edit.php en mettant un message d'erreur dans l'url.
    
    if(
        isset($_POST["editfemail"])
        && filter_var($_POST["editfemail"], FILTER_VALIDATE_EMAIL)
        && isset($_POST["editfnom"])
        && isset($_POST["editfprenom"])        
    ){
        // J'envoie mes modifications à la base de donnée à la ligne renseignée par $_POST['id_inscrit'] ssi les conditions sont remplies
            $bdd->query($monEdit);

    }
    else{
        header("location:edit.php?err=invalidAdressMail");
        exit;
    };




header("location:lister_newsletter.php");
exit;