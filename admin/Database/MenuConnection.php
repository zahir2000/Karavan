<?php
/**
 * @author Zahiriddin Rustamov
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/karavan/admin/Database/DatabaseConnection.php';

class MenuConnection {

    private $db;
    private static $instance;

    private function __construct() {
        $this->db = DatabaseConnection::getInstance();
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new MenuConnection();
        }
        return self::$instance;
    }

    public function getMenuItems() {
        $query = "SELECT * FROM menuitem";

        $stmt = $this->db->getDb()->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {
            $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $menuItems = NULL;
        }

        return $menuItems;
    }

    public function getMenuCategories() {
        $query = "SELECT * FROM category";

        $stmt = $this->db->getDb()->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {
            $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $category = NULL;
        }

        return $category;
    }
}