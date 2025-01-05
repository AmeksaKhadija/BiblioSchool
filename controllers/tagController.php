<?php

include './../database/connection.php';
include('../models/tagModel.php');

class tagController
{
    private $tagModel;

    public function __construct()
    {
        $conn = (new Connection())->connect();
        $this->tagModel = new tagModel($conn);
    }

    public function deleteTag($tagId)
    {
        $this->tagModel->deleteTag($tagId);
    }

    public function addTag($nom)
    {
        // $nom = $_POST['nomTag'];
        $this->tagModel->addTag($nom);
    }

    public function editTag($id,$nom)
    {
        // $id = $_POST['idtag'];
        // $nom =$_POST['nom_Tag'];
        $this->tagModel->editTag($nom, $id);
    }

    public function getAllTags()
    {
       $tags = $this->tagModel->getAllTags();
       return $tags;
    }

    public function getTagById($id)
    {
        return $this->tagModel->getTagById($id);

    }
}

$tagController = new tagController();
