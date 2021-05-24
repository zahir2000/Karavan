<?php
session_start();
require_once "../LoginChecker.php";
require_once "../Database/MenuConnection.php";
$currentPage = "About";

$con = MenuConnection::getInstance();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Karavan - About Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../customtail.css">
    <link rel="stylesheet" href="../Menu/publications.css">
    <script src="../../javascript/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../Menu/publications.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
</head>

<body>
    <?php
    include_once '../Header.php';
    include_once 'Forms/BusinessHours.php';
    ?>

    <section class="homescreen p-10 pt-0 min-h-screen flex md:flex-row text-white items-center justify-around bg-gray-800 flex-wrap sm:flex-col">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">About Us</h2>
                </div>
                <div class="my-2 flex sm:flex-row flex-col justify-between">
                    <div class="flex flex-row mb-1 sm:mb-0" style="display: block; width: 100%">
                        <div class="relative mr-4">
                            <button onclick="document.getElementById('business-hours').showModal()" class="btn-block inline-flex items-center justify-center py-3 px-4 text-base leading-5 text-lg rounded-md border font-medium shadow-sm transition leading-tight ease-in-out duration-150 focus:outline-none focus:shadow-outline bg-green-600 border-green-600 text-gray-100 hover:bg-green-500 hover:border-green-500 hover:text-gray-100" style="display: block; width: 100%">
                                Business Hours
                            </button>
                        </div>
                    </div>
                </div>
                <div class="my-2 flex sm:flex-row flex-col justify-between">
                    <div class="flex flex-row mb-1 sm:mb-0" style="display: block; width: 100%">
                        <div class="relative mr-4">
                            <button onclick="document.getElementById('contact-number').showModal()" class="btn-block inline-flex items-center justify-center py-3 px-4 text-base leading-5 text-lg rounded-md border font-medium shadow-sm transition leading-tight ease-in-out duration-150 focus:outline-none focus:shadow-outline bg-blue-600 border-blue-600 text-gray-100 hover:bg-blue-500 hover:border-blue-500 hover:text-gray-100" style="display: block; width: 100%">
                                Contact Number
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>