<?php
include './../database/connection.php';
include('../models/livreModel.php');

class livreController{

    private $conn;
    private $livreModel;

    
    public function __construct()
    {
        $conn = (new Connection())->connect();
        $this->livreModel = new livreModel($conn);
    }



    public function getAllLivres()
    {
         $livres = $this->livreModel->getAllLivres();
         return $livres;
    }
}



?>