<?php

    include "config.php";

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Jour 14</title>
    <link rel="stylesheet" type="text/css" href="css/messtyles.css">
</head>
<body>

<?php
    if(isset($_SESSION["erreur"])) {
        echo "<div class='err'>Une erreur s'est produite</div>";
    }

    if(isset($_SESSION["success"])) {
        echo "<div class='bravo'>L'enregistrement s'est passé correctement.</div>";
    }

    unset($_SESSION["erreur"], $_SESSION["success"]); // j'efface mes variables de session si elles existent.

    

#Je renseigne dans une variable la valeur de mon paramètre d'url
$idEdit = $_GET['editSelect'];
    
#J'appelle dans la base de donnée uniquement tous les enregistrements renseignées précédemment pour  mon élément $idEdit. Je dois obligatoirement passer par cette étape, sinon le serveur ne saura pas sur quelle ligne faire les modifications.
$request = $bdd->query("SELECT * FROM inscription WHERE id_inscription = $idEdit");
$reponse = $request -> fetch();
vd($reponse);  
?>

<form action="valid_edit.php" method="post">
   <!--Je crée un champ fantôme type="hidden" afin de récupérer la valeur d'id_inscription encapsulée dans ma variable $_GET-->
    <input type='hidden' name='id_inscrit'  value='<?php echo $idEdit?>'>
    
    <!--Dès l'arrivée sur cette page pour éditer l'inscription, j'affiche les données inscrites précédemment. Pour ce faire, j'écris dans -value- les paramètres de ma réponse -$reponse- envoyée par ma base de données $bdd après la requête -$request- --> 
    <input type="text" placeholder="Nom" name="editfnom" value="<?php echo $reponse['nom'] ?>">
    <input type="text" placeholder="Prénom" name="editfprenom" value="<?php echo $reponse['prenom'] ?>">
    <input type="text" placeholder="Email" name="editfemail" value="<?php echo $reponse['email'] ?>">
    <br><br>
    <input type="submit">
</form>
<br>

<button><a href="lister_newsletter.php">Annuler</a></button>


</body>
</html>







