<?php

require_once('../controllers/categorieController.php');

$categorie = new categorieController();

// isset pour la methode de l'ajout d'une categorie
if (isset($_POST['submit']) && !empty($_POST['nom'])) {
    // echo 'hhhhhh';
    $categorie->addCategory($_POST['nom']);
    header("Location: http://localhost:8080/breifs/BiblioSchool/views/adminCategories.php");
    exit();
}

// isset pour la methode de modifier categorie
if (isset($_POST['submitEdit']) && !empty($_POST['nom']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $categorie->editCategorie($id, $nom);
    header("Location: http://localhost:8080/breifs/BiblioSchool/views/adminCategories.php");
    exit();
}

// isset pour le supprition d'une categorie
if(isset($_GET['id'])){
    $categoryId = $_GET['id'];
    $categorie->deleteCategory($categoryId);
    header("Location: http://localhost:8080/breifs/BiblioSchool/views/adminCategories.php");

}