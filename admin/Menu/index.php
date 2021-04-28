<?php
session_start();
require_once "../LoginChecker.php";
require_once "../Database/MenuConnection.php";
$currentPage = "Menu";

$con = MenuConnection::getInstance();
$menuItems = $con->getMenuItems();
$hotMenuItems = $con->getHotMenuItems();
$hotMenuItemsArr = array();
$hotMenuCounter = 0;
if (isset($hotMenuItems)) {
    foreach ($hotMenuItems as $item) {
        $hotMenuItemsArr[$hotMenuCounter++] = $item["MenuItemID"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Karavan - Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../customtail.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
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
    <section class="homescreen p-10 pt-0 min-h-screen flex md:flex-row text-white items-center justify-around bg-gray-800 flex-wrap sm:flex-col">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Menu Items</h2>
                </div>
                <div class="my-2 flex sm:flex-row flex-col justify-between">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative mr-4">
                            <a href="New/" class="inline-flex items-center justify-center py-2 px-4 text-base leading-5 rounded-md border font-medium shadow-sm transition leading-tight ease-in-out duration-150 focus:outline-none focus:shadow-outline bg-green-600 border-green-600 text-gray-100 hover:bg-green-500 hover:border-green-500 hover:text-gray-100">
                                <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" width="20" height="20" class="inline-block">
                                    <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                    C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                    C15.952,9,16,9.447,16,10z" />
                                </svg>
                            </a>
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
                            <select class="appearance-none h-full rounded-r border-t sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
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
                        <input placeholder="Search" class="appearance-none rounded-r rounded-l border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
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
                                                <a href="New/index.php?edit=true&id=<?php echo $id; ?>" class="bg-gray-300 mr-1 hover:bg-gray-400 text-gray-800 text-sm font-semibold py-2 px-4 rounded">
                                                    <span>Edit</span>
                                                </a>
                                                <div x-data="{ showModal1: false }" :class="{'overflow-y-hidden': showModal1 }">
                                                    <main class="flex flex-col sm:flex-row justify-center items-center">
                                                        <button class="bg-red-300 mr-1 hover:bg-red-400 text-gray-800 text-sm font-semibold py-2 px-4 rounded transition-all duration-300" @click="showModal1 = true">
                                                            Delete
                                                        </button>
                                                    </main>

                                                    <!-- Modal1 -->
                                                    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModal1" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                                        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                                                            <div class="relative bg-white shadow-lg rounded-md text-gray-900 z-20" @click.away="showModal1 = false" x-show="showModal1" x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                                                                <header class="flex items-center justify-between p-2">
                                                                    <h2 class="font-semibold pl-2">Are you sure?</h2>
                                                                    <button class="focus:outline-none p-2" @click="showModal1 = false">
                                                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                                        </svg>
                                                                    </button>
                                                                </header>
                                                                <main class="p-2 text-center">
                                                                    <p>
                                                                        Delete this food item may result in the loss of this item. There is no going back.
                                                                    </p>
                                                                </main>
                                                                <footer class="flex justify-center p-2 pb-4">
                                                                    <a href="delete.php?id=<?php echo $id; ?>" class="text-center bg-red-700 font-semibold text-white p-2 w-32 rounded-full hover:bg-red-600 focus:outline-none focus:ring transition-all duration-300" @click="showModal1 = false">
                                                                        Delete
                                                                    </a>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                if (in_array($id, $hotMenuItemsArr)) {
                                                    echo "<a href='HotMenu.php?new=false&id=$id&counter=$hotMenuCounter' class='mr-1 text-gray-800 text-sm font-semibold py-2 px-4 rounded'>
                                                    <span class='hover:text-red-300 text-red-700'><i class='fa fa-heart'></i></span>
                                                    </a>";
                                                } else {
                                                    echo "<a href='HotMenu.php?new=true&id=$id&counter=$hotMenuCounter' class='mr-1 text-gray-800 text-sm font-semibold py-2 px-4 rounded'>
                                                    <span class='hover:text-red-600'><i class='far fa-heart'></i></span>
                                                    </a>";
                                                }
                                                ?>

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
        </div>
    </section>
</body>

</html>