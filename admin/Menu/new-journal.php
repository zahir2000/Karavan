<?php
$title = $_POST["title"];
$journalTitle = $_POST["journalTitle"];
$volumeIssue = $_POST["volume"];
$year = $_POST["year"];
$pages = $_POST["pages"];
$authors = $_POST["authors"];
$impactFactor = $_POST["impactFactor"];
$citationDb = $_POST["citation"];
$result = $_POST["result"];

require_once '../DatabaseConnection.php';
$db = DatabaseConnection::getInstance();

if ($db->addJournalPublication($title, $journalTitle, $volumeIssue, $year, $pages, $authors, $impactFactor, $citationDb, $result)){
    echo "success";
} else {
    echo "error";
}