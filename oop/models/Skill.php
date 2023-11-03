<?php
include_once 'Database.php';

class Tb_skill
{
    // Connection
    private $conn;
    // Table
    private $db_table = "tb_skill";
    // Columns
    public $id_user;
    public $id_skill;
    public $skill;
    public $lembaga;
    public $nilai;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getSkill()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    public function getSkillId($id_skill)
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id_user =" . $id_skill;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}

$database = new Database();
$db = $database->getConnection();
//$queryskill = new Tb_skill($db);
//$result = $query->getSkill()->fetchAll(PDO::FETCH_ASSOC);
