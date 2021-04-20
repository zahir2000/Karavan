<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {
    //Check credentials
    require_once 'Database/DatabaseConnection.php';
    require_once 'Utility/LoginStatus.php';
    $db = DatabaseConnection::getInstance();

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if ($db->checkCredentials($username, $password)) {
        session_start();
        $_SESSION["status"] = LoginStatus::SUCCESSFUL;
        echo "success";
    } else {
        $_SESSION["status"] = LoginStatus::FAILED;
        echo "error";
    }
}
