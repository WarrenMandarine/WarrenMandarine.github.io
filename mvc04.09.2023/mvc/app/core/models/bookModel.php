<?php 

    // bookModel => Tout ce qui concerne la partie base de données 
    //              de l'entité book.

    /**
     * Procède à la récupération de l'ensemble des livres. (entité book)
     * @return array L'ensemble des livres sous forme de tableau.
     */
    function findAll(){
        // Récupération de la connexion à la base de données
        require_once('dbConnect.php');

        if($pdoConn){
            // Si la connexion à la base de donnée est effective :

            // Stockage de la requête SQL au sein de la variable $query.
            $query = "SELECT * FROM books";

            // Execution de la requête sur la base de données.
            // Stockage du résultat de l'exécution dans la variable $execution.
            $execution = $pdoConn->query($query);

            if($execution){

                // Si la requête s'est exécutée sans accrocs :
                // Stockage de l'ensemble des résultats de la requête dans la variable $results
                $results = $execution->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        return $results;
    }

    /**
     * Procède à la récupération d'un livre préalablement identifié.
     * 
     * @param int $id L'identifiant du livre à récupérer.
     * @return array Un tableau contenant l'ensemble des informations du livre.
     */
    function findBy(int $id){
        require_once('dbConnect.php');
        // Contrôle de l'état de la connexion à la base de données

        if($pdoConn){

            // Stockage de la requête SQL au sein de la variable $query.
            $query = "SELECT * FROM books WHERE id=$id";

            // Execution de la requête sur la base de données.
            // Stockage du résultat de l'exécution dans la variable $execution.
            $execution = $pdoConn->query($query);

            if($execution){
                // Si la requête qui permet de récupérer les informations du livre souhaité s'est exécutée sans accrocs :
                // On stocke les données du livre dans une variable (utilisée ultérieurement pour être affichées dans les champs).
                $book = $execution->fetch(PDO::FETCH_ASSOC);
            }
            // Si la requête a rencontré une erreur lors de son execution
            else{
                header('Location: ../error.php');
            }
        }
        return $book;
    }

    /**
     * Procède à la mise à jour en base de données d'un livre identifié
     * 
     * @param string $titre Le titre du livre
     * @param string $desc La description du livre
     * @param float $prix Le prix du livre 
     * @param int $id L'identifiant du livre à mettre à jour
     * 
     * @todo Retourner un booléen en cas de succès. 
     */
    function update($titre, $desc, $prix, $id){
        require_once('dbConnect.php');
        
        // Contrôle de l'état de la connexion à la base de données
        if($pdoConn){

            // Stockage de la requête d'ajout au sein de la variable $query.
            $query = "UPDATE books SET name='$titre', description='$desc', price=$prix WHERE id=$id";

            // Execution de la requête sur la base de données.
            // Stockage du résultat de l'exécution dans la variable $execution.
            $execution = $pdoConn->query($query);

            if($execution){
                // Si la requête s'est exécutée sans accrocs :
                // Redirection vers la page qui affiche l'ensemble des livres
                header('Location: index.php?controller=book&action=all');
            }
            else{
                header('Location: ../error.php');
            }
        } // Fin du contrôle de la connexion à PDO
    }


    function deleteBy($id){

        require_once('dbConnect.php');

        // Contrôle de l'état de la connexion à la base de données
        if($pdoConn){

        
            // Stockage de la requête SQL au sein de la variable $query.
            $query = "DELETE FROM books WHERE id=$id";
            
            // Execution de la requête sur la base de données.
            // Stockage du résultat de l'exécution dans la variable $execution.
            $execution = $pdoConn->query($query);

            if($execution){
                // Si la requête de suppression s'est exécutée sans accrocs :
                // Redirection vers la page sur laquelle figurent l'ensemble des livres
                header('Location: index.php?controller=book&action=all');
            }
            // Si la requête a rencontré une erreur lors de son execution
            else{
                header('Location: ../error.php');
            }
        } // Fin du contrôle de la connexion à PDO

        else{
            header('Location: ../error.php');
        }

    }

function addOne($titre, $desc, $prix){
       // Récupération de la connexion à la base de données
       require_once("dbConnect.php");

       // Si la connexion à la base de données est effective
       if($pdoConn){
           // Stockage de la requête d'ajout au sein de la variable $query.
           $query = "INSERT INTO books (name, description, price) VALUES ('$titre', '$desc', $prix)";

           // Execution de la requête sur la base de données.
           // Stockage du résultat de l'exécution dans la variable $execution.
           $execution = $pdoConn->query($query);

           if($execution){
               // Si la requête s'est exécutée sans accrocs :
               // Redirection vers la page qui affiche l'ensemble des livres
               header('index.php?controller=book&action=all');
           }
       }
}