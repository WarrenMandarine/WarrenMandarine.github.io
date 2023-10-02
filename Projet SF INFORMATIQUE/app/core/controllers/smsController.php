<?php
function sendSMS(){

    $cliID = $_POST["clientId"];
    $key = "5546db87bb543f7b3299a3e6e2bb68aa";
    $sender = "ProjetSF";
    $msg = "Vous venez de recevoir un SMS de l'étudiant JEUFFRAIN Warren qui essaye d'avoir son diplôme.";

    require_once("./app/core/models/clientModel.php");
    $datas = findBy($cliID);


    if($datas){
        $tel = $datas['telephone'];

        // Appel de l'API d'envoi de SMS
        $url = "https://manager.envoyersmspro.com/api/envoyer/sms";
        $data = array(
            'key' => $key,
            'destinataires' => $tel,
            'message' => $msg,
            'expediteur' => $sender,
            'date' => '',
        );


        // Initialisation de cURL avec l'URL à appeler
$ch = curl_init('https://manager.envoyersmspro.com/api/envoyer/sms');

// Paramètres cURL pour activer le POST et retour de la réponse
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);

// Passage des données
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data, '', '&'));

// Appel de l'API Envoyer SMS Pro et récupération de la réponse dans la variable $reponse_json
$reponse_json = curl_exec ($ch);
curl_close ($ch);

// Conversion JSON en tableau avec json_decode (http://fr2.php.net/manual/fr/function.json-decode.php)
$reponse_array = json_decode($reponse_json, true);

// Si  'resultat' == 1, le message a été envoyé correctement
if ($reponse_array['resultat']) {
    echo 'Message envoyé avec succès ! Identifiant unique : '.$reponse_array['id'];
     // Redirection vers la page d'accueil après 10 secondes
          header("refresh:2;url=index.php?controller=home&action=renderaccueil");
    
} else {
    echo 'Erreur(s) : '.$reponse_array['erreurs'];
}
       // $queryString = http_build_query($data);
       // $apiUrl = $url . '?' . $queryString;
       // $response = file_get_contents($apiUrl);

        // Vérification de la réponse de l'API et affichage du message approprié
      //  $responseArray = json_decode($response, true);
     //   if ($responseArray['resultat'] === 1) {
         //   echo "Le SMS a été envoyé au client avec succès.";
            //   } else {
          //  echo "Une erreur s'est produite lors de l'envoi du SMS.";
     //   }
        //var_dump($responseArray);
   // }
   // else{
       // echo "Numéro de téléphone du client non trouvé.";
   // }
}

}