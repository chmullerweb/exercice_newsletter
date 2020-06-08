<?php

include "config.php";


/* 2 / dans la page "lister_newsletter.php", lister dans un tableau l'ensemble des inscriptions. (une colonne nom, prénom et email)
 *
 * En face de chaque nom, prenom, email, je veux un bouton "Modifier" qui va aller vers un formulaire qui va me permettre de modifier l'enregistrement
 * et un autre bouton "Effacer" qui va me permettre d'effacer les données de la ligne en question.
 * 
 *
 */

#Je crée une requête pour récupérer l'ensemble des enregistrements de ma table inscription. Je les classe par ordre de grandeur de leur id_inscription (du plus petit au plus grand)
$request = $bdd->query('SELECT * FROM inscription ORDER BY id_inscription');
$reponse = $request -> fetchAll();
/*vd($reponse);*/

?>
<table>
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Editer</th>
            <th>Effacer</th>
        </tr>
    </thead>
    <tbody>
        
            <?php
                #Je crée une boucle foreach afin d'automatiser la création de mon tableau
                foreach($reponse as $key => $inscrit){
                    echo "<tr>";
                    echo "<th>" . $inscrit['id_inscription'] . "</th>";
                    echo "<th>" . $inscrit['nom'] . "</th>";
                    echo "<th>" . $inscrit['prenom']. "</th>";
                    echo "<th>" . $inscrit['email']. "</th>";
                
                #J'ajoute un bouton Editer afin de modifier les enregistrements
                    echo "<th><button><a href='edit.php?editSelect=" . $inscrit['id_inscription'] . "'>" . "Modifier</a></button></th>";
                    
                #J'ajoute un bouton Supprimer afin d'effacer un enregistrement. Je demande confirmation auprès de l'internaute avant d'envoyer la requête (voir delete.php) au serveur grâce à l'attribut onclick dans ma balise <a>
                    echo "<th><button><a href='delete.php?delete=$inscrit[id_inscription]' onclick=\"return confirm('Voulez-vous effacer cet abonné ?')\">" . "Effacer</a></button></th>";
                    echo "</tr>";
                }
            ?>
    </tbody>

</table>

<br><br>
<button><a href="formulaire.php">S'inscrire</a></button>


