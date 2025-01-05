<?php

require_once('../controllers/tagController.php');

$tag = new tagController();

// isset pour la methode de l'ajout d'une tag
if (isset($_POST['submit']) && !empty($_POST['nom'])) {
    // echo 'hhhhhh';
    $tag->addTag($_POST['nom']);
    header("Location: http://localhost:8080/breifs/BiblioSchool/views/adminTags.php");
    exit();
}

// isset pour la methode de modifier tag
if (isset($_POST['submitEdit']) && !empty($_POST['nom']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $tag->editTag($id, $nom);
    header("Location: http://localhost:8080/breifs/BiblioSchool/views/adminTags.php");
    exit();
}

// isset pour le supprition d'une tag
if(isset($_GET['id'])){
    $tagId = $_GET['id'];
    $tag->deleteTag($tagId);
    header("Location: http://localhost:8080/breifs/BiblioSchool/views/adminTags.php");

}