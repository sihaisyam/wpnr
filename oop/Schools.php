<?php 

class Schools {
    // Connection
    private $conn;
    // Table
    private $db_table = "schools";
    // Columns
    public $id;
    public $user_id;
    public $fullname;
    public $email;
    public $password;
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getSchools(){
        $sqlQuery = "SELECT users.fullname, schools.* FROM " . $this->db_table . 
                    " INNER JOIN users ON schools.user_id = users.id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getSchoolByUser($user_id){
        $sqlQuery = "SELECT users.fullname, schools.* FROM " . $this->db_table . 
                    " INNER JOIN users ON schools.user_id = users.id".
                    " WHERE user_id = ". $user_id;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}

// $database = new Database();
// $db = $database->getConnection();
// $query = new Schools($db);
// $result = $query->getSchools()->fetchAll(PDO::FETCH_ASSOC);
// // var_dump($result);

?>