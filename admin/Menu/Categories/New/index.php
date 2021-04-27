<?php
session_start();
require_once "../../../LoginChecker.php";
require_once "../../../Database/MenuConnection.php";
$currentPage = "More";

$catName = "";
$catStatus = "Active";
$catOrder = "";

if (isset($_GET["edit"]) && $_GET["edit"] == "true") {
    $catId = filter_input(INPUT_GET, "id");
    $con = MenuConnection::getInstance();
    $category = $con->getCategoryItem($catId);

    foreach ($category as $item) {
        $catName = $item["name"];
        $catStatus = $item["status"];
        $catOrder = $item["categoryOrder"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Karavan - New Food Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../tailwind.css">
    <script src="../../../../javascript/jquery.min.js"></script>
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
    <?php include_once '../../../Header.php'; ?>
    <form id="new-cat-item" method="POST" class="homescreen p-10 min-h-screen flex md:flex-col text-white items-center justify-around bg-gray-800 flex-wrap sm:flex-col">
        <div class="bg-white container mx-auto max-w-screen-lg h-full shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-3">
                <div class="md:w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="cat-name">
                        Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-100 text-gray-500 border border-red rounded py-3 px-4 mb-3" name="cat-name" id="cat-name" type="text" placeholder="Soups" required value="<?php echo $catName; ?>">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="cat-order">
                        Category Order
                    </label>
                    <input class="appearance-none block w-full bg-gray-100 text-gray-500 border border-grey-lighter rounded py-3 px-4" id="cat-order" name="cat-order" type="number" placeholder="1" required value="<?php echo $catOrder; ?>">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="cat-status">
                        Status
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-100 border border-grey-lighter text-gray-500 py-3 px-4 pr-8 rounded" id="cat-status" name="cat-status" required>
                            <?php
                            if ($catStatus == "Active") {
                                echo "<option selected value='Active'>Active</option>";
                                echo "<option value='Inactive'>Inactive</option>";
                            } else {
                                echo "<option value='Active'>Active</option>";
                                echo "<option selected value='Inactive'>Inactive</option>";
                            }
                            ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit" id="submit" name="submit" class="rounded text-sm font-semibold px-3 py-1 mt-4 pb-3 pt-3 bg-gray-700 hover:bg-gray-600 text-white focus:shadow-outline focus:outline-none">
            <footer id="footerItemContent" class="flex justify-start px-8 pb-4 pt-4 pl-4 mt-4 bg-green-600 hidden">
                <span id="itemContent" class="text-sm text-gray-100 hidden"></span>
            </footer>
        </div>
    </form>

    <script>
        var foodId = <?php if (isset($_GET["id"])) {
                            echo filter_input(INPUT_GET, "id");
                        } ?>

        $("form#new-cat-item").submit(function() {
            var formData = new FormData(this);
            var uploadLink = 'upload.php';

            if (typeof foodId !== 'object') {
                uploadLink = 'upload.php?id=' + foodId;
            }

            $.ajax({
                url: uploadLink,
                type: 'POST',
                data: formData,
                async: false,
                success: function(data) {
                    var code = parseInt(data);
                    if (code == 1) {
                        document.getElementById("imageUploadError").innerHTML = "Unable to save this category.";
                        document.getElementById("footerUploadError").classList.remove("hidden");
                        document.getElementById("imageUploadError").classList.remove("hidden");
                        setTimeout("hideUploadError()", 5500);
                    } else if (code == 0) {
                        document.getElementById("itemContent").innerHTML = "Item successfully uploaded. Redirecting to Menu...";
                        document.getElementById("footerItemContent").classList.remove("hidden");
                        document.getElementById("itemContent").classList.remove("hidden");
                        $("#new-menu-item input").prop("disabled", true);
                        $("#new-menu-item select").prop("disabled", true);
                        setTimeout("redirectAfterSuccess()", 1500);
                    }
                },
                error: function(data) {
                    if (parseInt(data) != 0) {
                        document.getElementById("imageUploadError").innerHTML = 'error!';
                        document.getElementById("imageUploadError").classList.remove("hidden");
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });

        function hideUploadError() {
            document.getElementById("footerUploadError").classList.add("hidden");
        }

        function redirectAfterSuccess() {
            window.location.replace("../index.php");
        }
    </script>
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