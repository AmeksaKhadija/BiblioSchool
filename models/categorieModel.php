<?php

class CategorieModel
{
    private $conn;
    private $nom;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getAllCategories()
    {
        $req = "SELECT * FROM categories";
        $stmt = $this->conn->query($req);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($users)) {
            return $users;
        }
    }

    public function deleteCategory($categoryId)
    {
        $req = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addCategory($nom)
    {
        try {

            $query = "INSERT INTO categories(nom) VALUES(:nom)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->execute();
                
        } catch (PDOException $e) {
            echo "Error l'ors de l'ajout d'une categorie: " . $e->getMessage();
        }
    }


    public function editCategorie($id,$nom)
    {
        $existingCategory = $this->getCategoryById($id);
    
        if ($existingCategory) {
            // echo "Editing existing category...";
            $update_query = "UPDATE categories SET nom = :nom WHERE id = :id";
            $stmt = $this->conn->prepare($update_query);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Failed to update category...";
                return false; 
            }
        } else {
            echo "Trying to edit a non-existing category...";
            return false;
        }
    }

    public function getCategoryById($categoryId)
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

//statistics
    public function getTotalCategories()
    {
        $query = "SELECT COUNT(*) as total_categories FROM categorie";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res["total_categories"];
    }
    
}