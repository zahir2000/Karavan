<?php
session_start();
require_once("../LoginChecker.php");
$currentPage = "Publications";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sherzod Turaev - Publications</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../customtail.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">

    <style>
        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            border-radius: 5px;
        }

        @keyframes twinkle {
            0% {
                transform: scale(1, 1);
                background: rgba(255, 255, 255, 0);
                animation-timing-function: linear;
            }

            40% {
                transform: scale(0.8, 0.8);
                background: rgba(255, 255, 255, 1);
                animation-timing-function: ease-out;
            }

            80% {
                background: rgba(255, 255, 255, 0);
                transform: scale(1, 1);
            }

            100% {
                background: rgba(255, 255, 255, 0);
                transform: scale(1, 1);
            }
        }
    </style>
</head>

<body>
    <?php include_once '../Header.php'; ?>
    <section class="homescreen p-10 pt-0 min-h-screen flex md:flex-row text-white items-center justify-around bg-gray-800 flex-wrap sm:flex-col">
        
    </section>
    <script>
        for (var i = 0; i < 100; i++) {
            var star =
                '<div class="star m-0" style="animation: twinkle ' +
                (Math.random() * 5 + 5) +
                's linear ' +
                (Math.random() * 1 + 1) +
                's infinite; top: ' +
                Math.random() * $(window).height() +
                'px; left: ' +
                Math.random() * $(window).width() +
                'px;"></div>';
            $('.homescreen').append(star);
        }
    </script>
</body>

</html>