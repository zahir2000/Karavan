<?php
class DatabaseConnection
{
    private static $instance;
    private $db;

    private function __construct()
    {
        $host = 'localhost';
        $dbName = 'karavan';
        $user = 'root';
        $password = '11234566z';

        // set up DSN
        $dsn = "mysql:host=$host;dbname=$dbName";

        try {
            $this->db = new PDO($dsn, $user, $password);
            //echo "<p>Connection to database successful</p>";
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getDb()
    {
        if ($this->db instanceof PDO) {
            return $this->db;
        }
    }

    public function getLastInsertId()
    {
        if ($this->db instanceof PDO) {
            return $this->db->lastInsertId();
        }
    }

    public function closeConnection()
    {
        $this->db = null;
    }

    public function checkCredentials($username, $password)
    {
        if (!empty($username) && !empty($password)) {
            $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->bindParam(2, $password, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() != 0) {
                return true;
            }

            return false;
        }
    }
}
