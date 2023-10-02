<?php
function findAll()
{

    // Connexion à la base de données et exécution de la requête SQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SFInformatique";

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les données de la table Clients
    $sql = "SELECT * FROM Clients";
    $result = $conn->query($sql);

    // Fermeture de la connexion
    $conn->close();


    return $result;
}

function add($nom, $prenom, $email, $telephone, $adresse, $motDePasse, $modelePC, $accesoires, $arriveeDuPc, $problemeDuClient, $problemeDuTech, $resolution, $tarif){
    
    // Connexion à la base de données et exécution de la requête SQL
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "SFInformatique";
 
     // Création de la connexion
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     // Vérification de la connexion
     if ($conn->connect_error) {
         die("Erreur de connexion à la base de données : " . $conn->connect_error);
     }

     $req = "INSERT INTO Clients (nom, prenom, email, telephone, adresse, motDePasse, modelePC, accesoires, arriveeDuPc, problemeDuClient, problemeDuTech, resolution, tarif) VALUES ('$nom', '$prenom', '$email', '$telephone', '$adresse', '$motDePasse', '$modelePC', '$accesoires', '$arriveeDuPc', '$problemeDuClient', '$problemeDuTech', '$resolution', '$tarif')";
     $result = $conn->query($req);
     if($result != false){
        echo "Le client a été ajouté";
        
        //Si le test de condition fonctionne on redirige vers l'accueil
        header("Location: index.php?controller=home&action=renderaccueil");
        //exit; // Assurez-vous d'ajouter cette ligne pour arrêter l'exécution du script après la redirection
    } else{
        //Sinon refus de l'ajout
        echo "Le client n'a pas pu être ajouté";
    }
 // $conn->close();
}


function findBy($id){
        // Connexion à la base de données et exécution de la requête SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "SFInformatique";
    
        // Création de la connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        $req = "SELECT * FROM Clients WHERE ID = $id";
        $result = $conn->query($req);

        $result = $result->fetch_array(MYSQLI_ASSOC);

        // Fermeture de la connexion
        $conn->close();

        return $result;
}

function update($id, $nom, $prenom, $email, $telephone, $adresse, $motDePasse, $modelePC, $accesoires, $arriveeDuPc, $problemeDuClient, $problemeDuTech, $resolution, $tarif){

        // Connexion à la base de données et exécution de la requête SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "SFInformatique";
    
        // Création de la connexion
        $database = new mysqli($servername, $username, $password, $dbname);

    // On teste la connexion
    if (!empty($database)) {
        // On exécute la suite: 
        // Création des variables en récupérant les infos transmises avec la méthode GET: 
    
        // Création de variable pour la requête de mise à jour de l'ensemble des tuples:
        $req = "UPDATE Clients SET nom = '$nom', prenom = '$prenom', email = '$email', telephone = '$telephone', adresse = '$adresse', motDePasse = '$motDePasse', modelePC = '$modelePC', accesoires = '$accesoires', arriveeDuPc = '$arriveeDuPc', problemeDuClient = '$problemeDuClient', problemeDuTech = '$problemeDuTech', resolution = '$resolution', tarif = '$tarif' WHERE ID = $id";
        var_dump($req);
        // Création de la variable pour exécuter la requête SQL 
        $exec = $database->query($req);
    
        // Si l'exécution est différente de FALSE, elle a été exécutée avec succès
        if ($exec != false) {
            // Retour à la page d'accueil
            header("Location: index.php?controller=home&action=renderaccueil");
        } else {
            echo "La modification a échoué.";
        }
    }
}




