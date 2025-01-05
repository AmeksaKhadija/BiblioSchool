<?php
include './../database/connection.php';
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
    }

    
    public function addCategory($nom)
    {
        $this->categorieModel->addCategory($nom);
    }

    public function editCategorie($id, $nom) {
        return $this->categorieModel->editCategorie($id, $nom);
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