<?php
include_once 'Database.php';

class Tb_sekolah
{
    // Connection
    private $conn;
    // Table
    private $db_table = "tb_sekolah";
    // Columns
    public $id_user;
    public $id_sekolah;
    public $sekolah;
    public $tahun;
    public $jurusan;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getSekolah()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    public function getSekolahId($id_sekolah)
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id_user =" . $id_sekolah;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}

$database = new Database();
$db = $database->getConnection();
//$querysekolah = new Tb_sekolah($db);
//$result = $query->getSekolah()->fetchAll(PDO::FETCH_ASSOC);
