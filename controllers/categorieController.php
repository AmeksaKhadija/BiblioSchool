<?php

include '../database/Connection.php';
include('../models/CategorieModel.php');


class categorieController
{
    private $conn;
    private $categorieModel;

    
    public function __construct()
    {
        $conn = (new Connection())->connect();
        $this->categorieModel = new CategorieModel($conn);
    }

    public function deleteCategory($categoryId)
    {
        $this->categorieModel->deleteCategory($categoryId);
        header("Location: http://localhost:8080/breifs/BiblioSchool/views/adminCategories.php");
        exit();
    }

    
    public function addCategory()
    {
        if (isset($_POST['nom'])){
            echo "test";
            try {
                $this->categorieModel->addCategory($nom);
                header('location: http://localhost:8080/breifs/BiblioSchool/views/adminCategories.php');
                exit();
            } catch (PDOExeption $e) {
                echo "erreur lors de l'ajout d'une categorie".$e->getMessage();
            }
        }
    }

    public function editCategorie()
    {
        $id = $_POST['id'];
        $nom =$_POST['nom'];
        $this->categorieModel->editCategorie($nom, $id);
    }

    public function getCategoryById($id)
    {
        return $this->categorieModel->getCategoryById($id);
    }

    public function getAllCategories()
    {
         $categories = $this->categorieModel->getAllCategories();
         return $categories;
    }

}

$categorieController = new categorieController();

?>