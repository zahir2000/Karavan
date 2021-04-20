<?php
require_once "Utility/LoginStatus.php";

$status = $_SESSION["status"];

if ($status != LoginStatus::SUCCESSFUL) {
    session_destroy();
    header('Location:index.php');
}
