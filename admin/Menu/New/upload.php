<?php
require_once "../../Utility/UploadStatus.php";
require_once "../../Database/MenuConnection.php";

$con = MenuConnection::getInstance();

$targetDir = "../../../images/menu-item/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadStatus = UploadStatus::SUCCESSFUL;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$imageFileName = pathinfo($targetFile, PATHINFO_BASENAME);

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    $uploadStatus = UploadStatus::SUCCESSFUL;
  } else {
    $uploadStatus = UploadStatus::ERROR;
  }
}

// Check if file already exists
if (file_exists($targetFile)) {
  $uploadStatus = UploadStatus::FILE_EXISTS;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadStatus = UploadStatus::FILE_EXCEEDS_LIMIT;
}

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  $uploadStatus = UploadStatus::FILE_NOT_IMAGE;
}

// Check if $uploadStatus is set to 0 by an error
if ($uploadStatus != UploadStatus::SUCCESSFUL) {
  echo $uploadStatus;
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    $name = filter_input(INPUT_POST, "foodName");
    $price = filter_input(INPUT_POST, "foodPrice");
    $discount = filter_input(INPUT_POST, "food-discount");
    $description = filter_input(INPUT_POST, "food-description");
    $status = filter_input(INPUT_POST, "food-status");
    $category = filter_input(INPUT_POST, "food-category");
    $con->addMenuItem($name, $imageFileName, $price, $discount, $description, $status, $category);
    echo UploadStatus::SUCCESSFUL;
  } else {
    $uploadStatus = UploadStatus::FILE_NOT_SAVED;
    echo $uploadStatus;
  }
}
