<?php
class User
{
    // Connection
    private $conn;
    // Table
    private $db_table = "tb_user";
    // Columns
    public $id_user;
    public $fullname;
    public $email;
    public $job;
    public $no_telepon;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getUser()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    public function getUserId()
    {
        $sqlQuery = "SELECT
        id_user,
        fullname,
        email,
        job,
        no_telepon
        FROM
        ". $this->db_table ."
        WHERE
        id_user = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id_user);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->fullname = $dataRow['fullname'];
        $this->email = $dataRow['email'];
        $this->job = $dataRow['job'];
        $this->no_telepon = $dataRow['no_telepon'];
    }

    public function createUser(){
        $sqlQuery = "INSERT INTO
        ". $this->db_table ."
        SET
        fullname = :fullname,
        email = :email,
        job = :job,
        no_telepon = :no_telepon";
        $stmt = $this->conn->prepare($sqlQuery);
        // sanitize
        $this->fullname=htmlspecialchars(strip_tags($this->fullname));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->job=htmlspecialchars(strip_tags($this->job));
        $this->no_telepon=htmlspecialchars(strip_tags($this->no_telepon));
        // bind data
        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":job", $this->job);
        $stmt->bindParam(":no_telepon", $this->no_telepon);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
        // READ singl
}
