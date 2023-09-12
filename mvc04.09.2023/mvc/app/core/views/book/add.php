<?php 
    $pageTitle = "Ajout d'un livre";
   // require_once('../header.php'); 
?>

<h1>Ajout d'un livre à notre bibliothèque&nbsp;:</h1>

<form method="POST" action="index.php?controller=book&action=add">
    <input type="text" name="titre" placeholder="Nom de votre livre">
    <textarea name="description" placeholder="Courte description de votre livre"></textarea>
    <input type="number" name="prix" placeholder="Prix du livre">
    <input type="submit" value="Envoyer">
</form>

 <?php //require_once('../footer.php'); ?>