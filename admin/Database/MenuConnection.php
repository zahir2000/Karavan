<?php

/**
 * @author Zahiriddin Rustamov
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/karavan/admin/Database/DatabaseConnection.php';

class MenuConnection
{

    private $db;
    private static $instance;

    private function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MenuConnection();
        }
        return self::$instance;
    }

    public function getMenuItem($id)
    {
        $query = "SELECT * FROM menuitem WHERE MenuItemID = ?";
        $stmt = $this->db->getDb()->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {
            $menuItem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $menuItem = NULL;
        }

        return $menuItem;
    }

    public function getMenuItems()
    {
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

    public function getMenuCategories($shouldOrder = false)
    {
        $query = "SELECT * FROM category";

        if ($shouldOrder) {
            $query = "SELECT * FROM category ORDER BY categoryOrder";
        }

        $stmt = $this->db->getDb()->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {
            $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $category = NULL;
        }

        return $category;
    }

    public function addMenuItem($name, $image, $price, $discount, $description, $status, $category)
    {
        $query = "INSERT INTO menuitem VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getDb()->prepare($query);

        $id = null;
        $foodName = $name;
        $foodImg = $image;
        $foodPrice = $price;
        $foodDisc = $discount;
        $foodDesc = $description;
        $foodStatus = $status;
        $foodCat = $category;

        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $foodName, PDO::PARAM_STR);
        $stmt->bindParam(3, $foodImg, PDO::PARAM_STR);
        $stmt->bindParam(4, $foodPrice);
        $stmt->bindParam(5, $foodDisc);
        $stmt->bindParam(6, $foodDesc, PDO::PARAM_STR);
        $stmt->bindParam(7, $foodStatus, PDO::PARAM_STR);
        $stmt->bindParam(8, $foodCat, PDO::PARAM_STR);

        $stmt->execute();
        $menuId = $this->db->getLastInsertId();

        return $menuId;
    }

    public function updateMenuItem($id, $name, $image, $price, $discount, $description, $status, $category)
    {
        $query = "UPDATE menuitem SET name = ?, image = ?, price = ?, discount = ?, description = ?, status = ?, category = ? WHERE MenuItemID = ?";
        $stmt = $this->db->getDb()->prepare($query);

        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $image, PDO::PARAM_STR);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $discount);
        $stmt->bindParam(5, $description, PDO::PARAM_STR);
        $stmt->bindParam(6, $status, PDO::PARAM_STR);
        $stmt->bindParam(7, $category, PDO::PARAM_STR);
        $stmt->bindParam(8, $id);
        $stmt->execute();
    }

    public function deleteMenuItem($id) {
        $query = "DELETE FROM menuitem WHERE MenuItemID = ?";
        $stmt = $this->db->getDb()->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}
