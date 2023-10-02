<header>
    <nav>
        <img src="./app/public/src/logo/Logograndformat.bmp" alt="Logo de l'entreprise">
        <!-- nav bar -->
        <ul>
            <li id="existingClient"><a href="index.php?controller=home&action=renderaccueil" id="accueil">Accueil</a></li>
            <li><a href="#" id="clients">Client existant</a></li>
            <li><a href="index.php?controller=client&action=ShowAddForm" id="nouveau">Nouveau client</a></li>
        </ul>
    </nav>
</header>

<main>
    <input type="text" id="searchInput" class="search-input" placeholder="Rechercher un client">
    <table>
        <tr>
            <th>Liste de Clients</th>
        </tr>
            <?php foreach ($result as $row){ ?>
        <tr>
            <td style="cursor:pointer;" id="client<?php echo $row['ID']; ?>">
                <?php echo $row["nom"] . " " . $row["prenom"]; ?>
            </td>
        </tr>
        <tr class="card" id="card<?php echo $row['ID']; ?>">
            <td>
                <h1><?php echo $row["nom"] . " " . $row["prenom"]; ?></h1>
                <h2>Email:</h2>
                <h3><?php echo $row["email"]; ?></h3>
                <h2>Téléphone:</h2>
                <h3><?php echo $row["telephone"]; ?></h3>

                <h2>Adresse:</h2>
                <h3><?php echo $row["adresse"]; ?></h3>

                <h2>Mot de passe:</h2>
                <h3><?php echo $row["motDePasse"]; ?></h3>

                <h2>Modèle d'ordinateur:</h2>
                <h3><?php echo $row["modelePC"]; ?></h3>

                <h2>Accessoires:</h2>
                <h3><?php echo $row["accesoires"]; ?></h3>

                <h2>Arrivée de l'ordinateur:</h2>
                <h3><?php echo $row["arriveeDuPc"]; ?></h3>

                <h2>Problème du client:</h2>
                <h3><?php echo html_entity_decode(($row["problemeDuClient"])); ?></h3>

                <h2>Problème pour le technicien:</h2>
                <h3><?php echo $row["problemeDuTech"]; ?></h3>

                <h2>Résolution:</h2>
                <h3><?php echo $row["resolution"]; ?></h3>

                <h2>Tarif à facturer:</h2>
                <h3><?php echo $row["tarif"]; ?>€</h3>

                <br>

                <p>
                    <button onclick="expandCard('card<?php echo $row['ID']; ?>')">Fermer</button>
                    <form action="./index.php?controller=client&action=showUpdateForm" method="post">
                        <button type="submit" value="<?php echo $row['ID']; ?>" name="submitBtn">Modifier</button>
                    </form>
                </p>

                <form action="./index.php?controller=sms&action=sendSMS" method="post">
                    <input type="hidden" name="clientId" value="<?php echo $row['ID']; ?>">
                    <button type="submit" id="Terminer">Fin d'intervention</button>
                </form>

            </td>
        </tr>
        <?php } ?>
    </table>
</main>