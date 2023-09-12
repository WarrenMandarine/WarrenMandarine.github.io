<?php
    $pageTitle = "Modification d'un livre";
?>

<h1>Modification du livre intitulé <?= $book["name"] ?>&nbsp;:</h1>

<form action="index.php?controller=book&action=updateOne" method="POST">
    <input type="text" name="titre" placeholder="Nom de votre livre" value="<?= $book["name"] ?>">
    <textarea name="description" placeholder="Courte description de votre livre"><?= $book["description"] ?></textarea>
    <input type="number" name="prix" placeholder="Prix du livre" value="<?= $book["price"] ?>">
    <input type="hidden" value="<?= $book["id"]; ?>" name="bookID">
    <input type="submit" value="Envoyer" name="submitted">
</form>