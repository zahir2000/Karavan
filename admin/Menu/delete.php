<?php

if (isset($_GET["id"])) {
    $foodId = filter_input(INPUT_GET, "id");
    require_once "../Database/MenuConnection.php";
    $con = MenuConnection::getInstance();
    $con->deleteMenuItem($foodId);
    header('Location:/karavan/admin/Menu/index.php');
} else {
    header('Location:/karavan/admin/index.php');
}
