<?php


class livreModel{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function getAllLivres()
    {
        $req = "SELECT * FROM livres";
        $stmt = $this->conn->query($req);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($users)) {
            return $users;
        }
    }


}



?>