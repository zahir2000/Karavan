<?php
require_once "../Database/MenuConnection.php";

$hotMenuCounter = filter_input(INPUT_GET, "counter");
$isNew = filter_input(INPUT_GET, "new");
$foodId = filter_input(INPUT_GET, "id");
$con = MenuConnection::getInstance();

if ($isNew == "true") {
    if ($hotMenuCounter > 2) {
        header('Location:index.php?hotmenu=toomany');
    } else {
        $con->addHotMenu($foodId);
        header('Location:index.php?hotmenu=added');
    }
} else {
    $con->deleteHotMenu($foodId);
    header('Location:index.php?hotmenu=deleted');
}
