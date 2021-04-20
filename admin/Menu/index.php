<?php
session_start();
require_once "../LoginChecker.php";
require_once "../Database/MenuConnection.php";
$currentPage = "Menu";

$con = MenuConnection::getInstance();
$menuItems = $con->getMenuItems();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sherzod Turaev - Publications</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../customtail.css">
    <link rel="stylesheet" href="publications.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/long-press-event.js"></script>
    <script src="publications.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
</head>

<body>
    <?php include_once '../Header.php'; ?>
    <dialog id="new" class="h-auto w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
        <div class="flex flex-col w-full h-auto ">
            <!-- Header -->
            <div class="flex w-full h-auto justify-end items-center">
                <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                    New Publication
                </div>
                <div onclick="document.getElementById('new').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <!--Header End-->
            </div>
            <div class="flex justify-center"><span style="width: 25%;" class="h-px bg-gray-400 text-center"></span></div>
            <!-- Modal Content-->
            <div class="flex w-full h-auto pb-10 px-2 justify-center items-center bg-white rounded text-center text-gray-500">
                <div class="grid place-items-center">
                    <div class="w-11/12 bg-white">
                        <?php
                        include_once 'Forms/dropdown.php';
                        include_once 'Forms/journal.php';
                        include_once 'Forms/books.php';
                        include_once 'Forms/book-chapters.php';
                        include_once 'Forms/conference.php';
                        include_once 'Forms/others.php';
                        ?>
                    </div>
                </div>
            </div>
            <!-- End of Modal Content-->
        </div>
    </dialog>
    <section class="homescreen p-10 pt-0 min-h-screen flex md:flex-row text-white items-center justify-around bg-gray-800 flex-wrap sm:flex-col">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Menu Items</h2>
                </div>
                <div class="my-2 flex sm:flex-row flex-col justify-between">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative mr-4">
                            <button onclick="document.getElementById('new').showModal()" class="inline-flex items-center justify-center py-2 px-4 text-base leading-5 rounded-md border font-medium shadow-sm transition leading-tight ease-in-out duration-150 focus:outline-none focus:shadow-outline bg-green-600 border-green-600 text-gray-100 hover:bg-green-500 hover:border-green-500 hover:text-gray-100">
                                <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" width="20" height="20" class="inline-block">
                                    <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                    C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                    C15.952,9,16,9.447,16,10z" />
                                </svg>
                            </button>
                        </div>
                        <div class="relative">
                            <select class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>5</option>
                                <option>10</option>
                                <option>20</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <select class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                <option>All</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Search" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                    </th>
                                    <th class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Price
                                    </th>
                                    <th class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Discount
                                    </th>
                                    <th class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th class="font-bold px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--<tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <img src="/karavan/images/menu-item/somsa.jpg" alt="" width="100" class="m-auto">
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">Somsa</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">Main</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            RM34.90
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            0.00
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            Meat, Potatoes
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Active</span>
                                        </span>
                                    </td>
                                    <td class="border-b border-gray-200 bg-white text-sm">
                                        <div class="flex justify-center">
                                            <button class="bg-gray-300 mr-1 hover:bg-gray-400 text-gray-800 text-sm font-semibold py-2 px-4 rounded inline-flex items-center">
                                                <span>Edit</span>
                                            </button>
                                            <button class="bg-red-300 hover:bg-gray-400 text-gray-800 text-sm font-semibold py-2 px-4 rounded inline-flex items-center">
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>-->
                                <?php
                                foreach ($menuItems as $item) {
                                    $id = $item["MenuItemID"];
                                    $name = $item["name"];
                                    $price = $item["price"];
                                    $description = $item["description"];
                                    $status = $item["status"];
                                    $image = $item["image"];
                                    $discount = $item["discount"];
                                    $category = $item["category"];
                                ?>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <img src="/karavan/images/menu-item/<?php echo $image; ?>" alt="" width="100" class="m-auto">
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap"><?php echo $name; ?></p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap"><?php echo $category; ?></p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            RM<?php if ($discount == 0.00) {
                                                    echo "<p class='text-gray-900 whitespace-no-wrap'>";
                                                    echo number_format($price, 2);
                                                } else {
                                                    echo "<p class='line-through text-gray-900 whitespace-no-wrap'>RM";
                                                    echo number_format($price, 2);
                                                    echo "</p><p class='text-gray-900 whitespace-no-wrap'>RM";
                                                    echo number_format($price - $price * $discount, 2);
                                                } ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $discount; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $description; ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                                                <?php
                                                if ($status == "Active") {
                                                    echo "<span aria-hidden class='absolute inset-0 bg-green-200 opacity-50 rounded-full'></span>
                                                    <span class='text-green-900 relative'>$status</span>";
                                                } else if ($status == "Inactive") {
                                                    echo "<span aria-hidden class='absolute inset-0 bg-red-200 opacity-50 rounded-full'></span>
                                                    <span class='text-red-900 relative'>$status</span>";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td class="border-b border-gray-200 bg-white text-sm">
                                            <div class="flex justify-center">
                                                <button class="bg-gray-300 mr-1 hover:bg-gray-400 text-gray-800 text-sm font-semibold py-2 px-4 rounded">
                                                    <span>Edit</span>
                                                </button>
                                                <button class="bg-red-300 hover:bg-gray-400 text-gray-800 text-sm font-semibold py-2 px-4 rounded">
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                            <span class="text-xs xs:text-sm text-gray-900">
                                Showing 1 to <?php echo count($menuItems); ?> of 50 Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                    Prev
                                </button>
                                <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                    Next
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