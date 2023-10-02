<?php
function getAll()
{
    require_once("./app/core/models/clientModel.php");
    $result = findAll();
    // Vérification s'il y a des données
    if ($result->num_rows > 0) {
        require_once("./app/core/views/client/all.php");
    } else {
        echo "<tr><td colspan='2'>Aucun enregistrement trouvé dans la table Clients.</td></tr>";
    }
}
function showAddForm(){
    require_once("./app/core/views/client/add.php");
}

function addClient(){  
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $adresse = $_POST["adresse"];
    $motDePasse = $_POST["motDePasse"];
    $modelePC = $_POST["modelePC"];
    $accesoires = $_POST["accesoires"];
    $arriveeDuPc = $_POST["arriveeDuPc"];
    $problemeDuClient = $_POST["problemeDuClient"];
    $problemeDuTech = $_POST["problemeDuTech"];
    $resolution = $_POST["resolution"];
    $tarif = $_POST["tarif"];

    require_once("./app/core/models/clientModel.php");
    add($nom, $prenom, $email, $telephone, $adresse, $motDePasse, $modelePC, $accesoires, $arriveeDuPc, $problemeDuClient, $problemeDuTech, $resolution, $tarif); 
}

function updateClient(){
    require_once("./app/core/models/clientModel.php");

   
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $adresse = $_POST["adresse"];
    $motDePasse = $_POST["motDePasse"];
    $modelePC = $_POST["modelePC"];
    $accesoires = $_POST["accesoires"];
    $arriveeDuPc = $_POST["arriveeDuPc"];
    $problemeDuClient = htmlentities($_POST["problemeDuClient"]);
    $problemeDuTech = htmlentities($_POST["problemeDuTech"]);
    $resolution = htmlentities($_POST["resolution"]);
    $tarif = $_POST["tarif"];

    
    update($id,$nom, $prenom, $email, $telephone, $adresse, $motDePasse, $modelePC, $accesoires, $arriveeDuPc, $problemeDuClient, $problemeDuTech, $resolution, $tarif);
}

function showUpdateForm(){
    require_once("./app/core/models/clientModel.php");
    $datas = findBy($_POST["submitBtn"]);
    if($datas){
        require_once("./app/core/views/client/update.php");
    }
    else{
        echo "Aucun enregistrement trouvé pour l'identifiant".$datas["id"];
    }
}