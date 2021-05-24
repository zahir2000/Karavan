<?php
$mon = filter_input(INPUT_POST, "mondayFriday");
$sat = filter_input(INPUT_POST, "satSun");

if (empty($mon) && empty($sat)) {
    echo "error";
} else {
    require_once "../../Database/MenuConnection.php";
    $con = MenuConnection::getInstance();
    $con->updateBusinessHours($mon, $sat);
    echo "success";
}
