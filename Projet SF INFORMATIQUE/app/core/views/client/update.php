<?php

    // Affichage du formulaire de modification avec les champs pré-remplis
    echo '<main>';
    echo '<form action="./index.php?controller=client&action=updateClient" method="post">';
    echo '<input type="hidden" name="id" value="' . $datas["ID"] . '">'; // Champ caché pour l'identifiant du client

    echo '<label for="nom">Nom :</label>';
    echo '<div><input type="text" id="nom" name="nom" class="input" required value="' . $datas["nom"] . '"></div>';

    echo '<label for="prenom">Prénom :</label>';
    echo '<div><input type="text" id="prenom" name="prenom" class="input" required value="' . $datas["prenom"] . '"></div>';

    echo '<label for="email">E-m@il :</label>';
    echo '<div><input type="email" id="email" name="email" class="input" required value="' . $datas["email"] . '"></div>';

    echo '<label for="telephone">Téléphone :</label>';
    echo '<div><input type="tel" id="telephone" name="telephone" class="input" required value="' . $datas["telephone"] . '"></div>';

    echo '<label for="adresse">Adresse postale :</label>';
    echo '<div><input type="text" id="adresse" name="adresse" class="input" required value="' . $datas["adresse"] . '"></div>';

    echo '<label for="motDePasse">Mot de passe de l\'ordinateur :</label>';
    echo '<div><input type="text" id="motDePasse" name="motDePasse" class="input" required value="' . $datas["motDePasse"] . '"></div>';

    echo '<label for="modelePC">Modèle d\'ordinateur :</label>';
    echo '<div><input type="text" id="modelePC" name="modelePC" class="input" required value="' . $datas["modelePC"] . '"></div>';

    echo '<label for="accesoires">Accesoires :</label>';
    echo '<div><input type="text" id="accesoires" name="accesoires" class="input" required value="' . $datas["accesoires"] . '"></div>';

    echo '<label for="arriveeDuPc">Arrivée de l\'ordinateur :</label>';
    echo '<div><input type="datetime-local" id="arriveeDuPc" name="arriveeDuPc" class="input" required value="' . $datas["arriveeDuPc"] . '"></div>';

    echo '<label for="problemeDuClient">Problème du client :</label>';
    echo '<div><textarea name="problemeDuClient" id="problemeDuClient" class="input" required cols="50" rows="5">' . html_entity_decode(($datas["problemeDuClient"])) . '</textarea></div>';

    echo '<label for="problemeDuTech">Problème du technicien :</label>';
    echo '<div><textarea name="problemeDuTech" id="problemeDuTech" class="input" required cols="50" rows="5">' . html_entity_decode($datas["problemeDuTech"]) . '</textarea></div>';

    echo '<label for="resolution">Résolution :</label>';
    echo '<div><textarea name="resolution" id="resolution" class="input" required cols="40" rows="5">' . html_entity_decode($datas["resolution"]) . '</textarea></div>';

    echo '<label for="tarif">Tarif à facturer :</label>';
    echo '<div><input type="text" id="tarif" name="tarif" class="input" required value="' . html_entity_decode($datas["tarif"]) . '"></div>';

    echo '<input type="submit" value="Modifier" class="buttonEnvoyer">';
    echo '</form>';
    echo '</main>';
?>
