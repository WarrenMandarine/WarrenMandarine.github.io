<?php

    // Fichier qui est réquisitionné sur "index.php" 
    // lorsque l'URL a pour paramètre controller 
    // et que sa valeur vaut "book".

    // En d'autres termes : https://mon-joli-site.test/index.php?controller=book

    /** 
     * Permet de récupérer l'ensemble des livres stockés en BDD
     * (via le bookModel et sa fonction findAll()).
     * Ces livres sont ensuite transmis à la vue adéquate que l'on 
     * réquisitionne.
     * 
     * Est executée lorsque l'action passée en paramètres de l'URL vaut all.
     * Tel que : https://mon-joli-site.test/index.php?action=all
    */
    function all(){
        require_once('./app/core/models/bookModel.php');
        $results = findAll();
        require_once('./app/core/views/book/all.php');
    }

    /**
     * Permet de mettre à jour un livre en base de données via réquisition
     * du bookModel, récupération des données issues du formulaire transmises
     * via méthode POST sur la vue book/update.php.
     * htmlentites -> empêche en partie les injections SQL.
     * 
     * Est executée lorsque l'action vaut updateOne.
     * Tel que : https://mon-joli-site.test/index.php?action=updateOne
     */
    function updateOne(){
        require_once('./app/core/models/bookModel.php');
        // On pourrait ici procéder à davantagde de contrôle sur les données
        // provenant du formulaire situé sur la vue book/update. 
        update(htmlentities($_POST['titre']), htmlentities($_POST['description']), $_POST['prix'], $_POST['bookID']);
    }

    /**
     * Pré-renseigne et affiche le formulaire d'edition d'un livre 
     * (parfaitement identifié) via réquisition du bookModel et 
     * l'execution de sa fonction findBy() dont l'unique paramètre 
     * correspond à l'identifiant d'un livre.
     * 
     * Est executée lorsque l'action vaut updateOne.
     * Tel que : https://mon-joli-site.test/index.php?action=updateOne
     */
    function showUpdateForm(){
        require_once('./app/core/models/bookModel.php');
        $book = findBy($_POST['updateID']);
        require_once('./app/core/views/book/update.php');
  
    }

    function delete(){

        // On pourrait aller plus loin dans la vérification avec un IF 
        // if($_POST)

        require_once('./app/core/models/bookModel.php');
        deleteBy($_POST["deleteID"]);
        // echo "La fonction delete fonctionne";
    }

    function add(){
        
        require_once('./app/core/models/bookModel.php');

        $titre = htmlentities($_POST["titre"]);
        $desc = htmlentities($_POST["description"]);
        $prix = $_POST["prix"];
    
        addOne($titre, $desc, $prix);
        
    }

        function showAddForm(){

            require_once('./app/core/views/book/add.php');

        }



?>