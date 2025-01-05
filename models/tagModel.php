<?php

// include './../database/connection.php';

class TagModel
{
    public $conn;
    public $nom;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function setnom($nom)
    {
        $this->nom = $nom;
    }

    public function getAllTags()
    {
        $sql = "SELECT * FROM tags";
        $query = $this->conn->query($sql);
        $tags = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($tags)) {
            return $tags;
        }

        return [];
    }

    public function deleteTag($tagId)
    {
        $sql = "DELETE FROM tags WHERE id = :tagId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }

    public function addTag($nom)
    {
        $sql = "INSERT INTO tags (nom) VALUES (:nom)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    }

    public function editTag($nom, $id)
    {
        $existingTag = $this->getTagById($id);

        if ($existingTag) {
            echo "Editing existing tag...";
            $update_query = "UPDATE tags SET nom = :nom WHERE id = :id";
            $stmt = $this->conn->prepare($update_query);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true; 
            } else {
                echo "Failed to update tag...";
                return false;
            }
        } else {
            echo "Trying to edit a non-existing tag...";
            return false;
        }
    }

    public function getTagById($tagId)
    {
        $query = "SELECT * FROM tags WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $tagId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

    public function getTotalTag()
    {
        $query = "SELECT COUNT(*) as total_tags FROM tag ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res["total_tags"];
    }

}
