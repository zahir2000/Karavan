<?php
require_once "../../../Utility/UploadStatus.php";
require_once "../../../Database/MenuConnection.php";

$name = filter_input(INPUT_POST, "cat-name");
$catOrder = filter_input(INPUT_POST, "cat-order");
$status = filter_input(INPUT_POST, "cat-status");

if (!(empty($name) && empty($catOrder) && empty($status))) {
  $con = MenuConnection::getInstance();

  if (isset($_GET["id"])) {
    $con->updateMenuCategory($_GET["id"], $name, $status, $catOrder);
    echo 0;
  } else {
    $con->addMenuCategory($name, $status, $catOrder);
    echo 0;
  }
} else {
  echo 1;
}
