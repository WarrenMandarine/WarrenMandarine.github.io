    <header>
        <nav>
            <img src="./app/public/src/logo/Logograndformat.bmp" alt="Logo de l'entreprise">
            
            <ul>
                <li><a href="index.php?controller=home&action=renderaccueil" id="accueil">Accueil</a></li>
                <li><a href="index.php?controller=client&action=getAll" id="clients">Client existant</a></li>
                <li><a href="#" id="nouveau">Nouveau client</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="./index.php?controller=client&action=addClient" method="POST">

            <div class="single-input">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="input" required>
            </div>

            <div class="single-input">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="input" required>
            </div>

            <div class="single-input">
                <label for="email">E-m@il :</label>
                <input type="email" id="email" name="email" class="input" required>
            </div>

            <div class="single-input">
                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" class="input" required>
            </div>

            <div class="single-input">
                <label for="adresse">Adresse postale :</label>
                <input type="text" name="adresse" id="adresse" class="input" required>
            </div>

            <div class="single-input">
                <label for="motDePasse">Mot de passe de l'ordinateur :</label>
                <input type="text" name="motDePasse" id="motDePasse" class="input" required>
            </div>

            <div class="single-input">
                <label for="modelePC">Modèle d'ordinateur :</label>
                <input type="text" name="modelePC" id="modelePC" class="input" required>
            </div>

            <div class="single-input">
                <label for="accesoires">Accessoires :</label>
                <input type="text" name="accesoires" id="accesoires" class="input" required>
            </div>

            <div class="single-input">
                <label for="arriveeDuPc">Arrivée de l'ordinateur :</label>
                <input type="datetime-local" name="arriveeDuPc" id="arriveeDuPc" class="input" required>
            </div>

            <div class="single-input">
                <label for="problemeDuClient">Problème du client :</label>
                <textarea name="problemeDuClient" id="problemeDuClient" cols="50" rows="5" class="input" required></textarea>
            </div>

            <div class="single-input">
                <label for="problemeDuTech">Problème aperçu par le technicien :</label>
                <textarea name="problemeDuTech" id="problemeDuTech" cols="50" rows="5" class="input"></textarea>
            </div>

            <div class="single-input">
                <label for="resolution">Résolution :</label>
                <textarea name="resolution" id="resolution" cols="40" rows="5" class="input"></textarea>
            </div>

            <div class="single-input">
                <label for="tarif">Tarif à facturer :</label>
                <input type="text" name="tarif" id="tarif" class="input">
            </div>

            <input type="submit" value="Envoyer" class="buttonEnvoyer">
        </form>
    </main>