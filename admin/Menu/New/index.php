<?php
session_start();
require_once("../../LoginChecker.php");
$currentPage = "Menu";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Karavan - New Food Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../tailwind.css">
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
    <?php include_once '../../Header.php'; ?>
    <section class="homescreen p-10 min-h-screen flex md:flex-col text-white items-center justify-around bg-gray-800 flex-wrap sm:flex-col">
        <main class="container mx-auto max-w-screen-lg h-full pb-5">
            <!-- file upload modal -->
            <article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white shadow-xl rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                <!-- overlay -->
                <div id="overlay" class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                    <i>
                        <svg class="fill-current w-12 h-12 mb-3 text-blue-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                        </svg>
                    </i>
                    <p class="text-lg text-blue-700">Drop files to upload</p>
                </div>

                <!-- scroll area -->
                <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="food-image">
                        Food Image
                    </label>
                    <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                        <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                            <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                        </p>
                        <input id="hidden-input" type="file" multiple class="hidden" id="food-image" />
                        <button id="button" class="mt-2 rounded text-sm font-semibold bg-gray-400 px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                            Upload a file
                        </button>
                    </header>

                    <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                        To Upload
                    </h1>

                    <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                        <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                            <img class="mx-auto w-20" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                            <span class="text-sm text-gray-500">No Files Selected</span>
                        </li>
                    </ul>
                </section>

                <!-- sticky footer -->
                <footer class="flex justify-end px-8 pb-8 pt-4">
                    <button id="submit" class="rounded text-sm font-semibold px-3 py-1 bg-blue-900 hover:bg-blue-700 text-white focus:shadow-outline focus:outline-none">
                        Upload
                    </button>
                    <button id="cancel" class="ml-3 rounded text-sm font-semibold bg-gray-400 px-3 py-1 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                        Cancel
                    </button>
                </footer>
            </article>
        </main>

        <!-- using two similar templates for simplicity in js code -->
        <template id="file-template">
            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                    <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                    <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                        <h1 class="flex-1 group-hover:text-blue-800"></h1>
                        <div class="flex">
                            <span class="p-1 text-blue-800">
                                <i>
                                    <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                    </svg>
                                </i>
                            </span>
                            <p class="p-1 size text-xs text-gray-700"></p>
                            <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                </svg>
                            </button>
                        </div>
                    </section>
                </article>
            </li>
        </template>

        <template id="image-template">
            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                    <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                    <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                        <h1 class="flex-1"></h1>
                        <div class="flex">
                            <span class="p-1">
                                <i>
                                    <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                    </svg>
                                </i>
                            </span>

                            <p class="p-1 size text-xs"></p>
                            <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                </svg>
                            </button>
                        </div>
                    </section>
                </article>
            </li>
        </template>

        <script>
            const fileTempl = document.getElementById("file-template"),
                imageTempl = document.getElementById("image-template"),
                empty = document.getElementById("empty");

            // use to store pre selected files
            let FILES = {};

            // check if file is of type image and prepend the initialied
            // template to the target element
            function addFile(target, file) {
                const isImage = file.type.match("image.*"),
                    objectURL = URL.createObjectURL(file);

                const clone = isImage ?
                    imageTempl.content.cloneNode(true) :
                    fileTempl.content.cloneNode(true);

                clone.querySelector("h1").textContent = file.name;
                clone.querySelector("li").id = objectURL;
                clone.querySelector(".delete").dataset.target = objectURL;
                clone.querySelector(".size").textContent =
                    file.size > 1024 ?
                    file.size > 1048576 ?
                    Math.round(file.size / 1048576) + "mb" :
                    Math.round(file.size / 1024) + "kb" :
                    file.size + "b";

                isImage &&
                    Object.assign(clone.querySelector("img"), {
                        src: objectURL,
                        alt: file.name
                    });

                empty.classList.add("hidden");
                target.prepend(clone);

                FILES[objectURL] = file;
            }

            const gallery = document.getElementById("gallery"),
                overlay = document.getElementById("overlay");

            // click the hidden input of type file if the visible button is clicked
            // and capture the selected files
            const hidden = document.getElementById("hidden-input");
            document.getElementById("button").onclick = () => hidden.click();
            hidden.onchange = (e) => {
                for (const file of e.target.files) {
                    addFile(gallery, file);
                }
            };

            // use to check if a file is being dragged
            const hasFiles = ({
                    dataTransfer: {
                        types = []
                    }
                }) =>
                types.indexOf("Files") > -1;

            // use to drag dragenter and dragleave events.
            // this is to know if the outermost parent is dragged over
            // without issues due to drag events on its children
            let counter = 0;

            // reset counter and append file to gallery when file is dropped
            function dropHandler(ev) {
                ev.preventDefault();
                for (const file of ev.dataTransfer.files) {
                    addFile(gallery, file);
                    overlay.classList.remove("draggedover");
                    counter = 0;
                }
            }

            // only react to actual files being dragged
            function dragEnterHandler(e) {
                e.preventDefault();
                if (!hasFiles(e)) {
                    return;
                }
                ++counter && overlay.classList.add("draggedover");
            }

            function dragLeaveHandler(e) {
                1 > --counter && overlay.classList.remove("draggedover");
            }

            function dragOverHandler(e) {
                if (hasFiles(e)) {
                    e.preventDefault();
                }
            }

            // event delegation to caputre delete events
            // fron the waste buckets in the file preview cards
            gallery.onclick = ({
                target
            }) => {
                if (target.classList.contains("delete")) {
                    const ou = target.dataset.target;
                    document.getElementById(ou).remove(ou);
                    gallery.children.length === 1 && empty.classList.remove("hidden");
                    delete FILES[ou];
                }
            };

            // print all selected files
            document.getElementById("submit").onclick = () => {
                alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
                console.log(FILES);
            };

            // clear entire selection
            document.getElementById("cancel").onclick = () => {
                while (gallery.children.length > 0) {
                    gallery.lastChild.remove();
                }
                FILES = {};
                empty.classList.remove("hidden");
                gallery.append(empty);
            };
        </script>

        <style>
            .hasImage:hover section {
                background-color: rgba(5, 5, 5, 0.4);
            }

            .hasImage:hover button:hover {
                background: rgba(5, 5, 5, 0.45);
            }

            #overlay p,
            i {
                opacity: 0;
            }

            #overlay.draggedover {
                background-color: rgba(255, 255, 255, 0.7);
            }

            #overlay.draggedover p,
            #overlay.draggedover i {
                opacity: 1;
            }

            .group:hover .group-hover\:text-blue-800 {
                color: #2b6cb0;
            }
        </style>
        <div class="bg-white container mx-auto max-w-screen-lg h-full shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-3">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="food-name">
                        Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-100 text-gray-500 border border-red rounded py-3 px-4 mb-3" id="food-name" type="text" placeholder="Somsa">
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="food-category">
                        Category
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-100 border border-grey-lighter text-gray-500 py-3 px-4 pr-8 rounded" id="food-category">
                            <?php
                            require_once "../../Database/MenuConnection.php";
                            $con = MenuConnection::getInstance();
                            $categories = $con->getMenuCategories();
                            foreach ($categories as $category) {
                                if ($category["status"] == "Active") {
                                    $name = $category["name"];
                                    echo "<option value='$name'>$name</option>";
                                }
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
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="food-description">
                        Description
                    </label>
                    <input class="appearance-none block w-full bg-gray-100 text-gray-500 border border-grey-lighter rounded py-3 px-4" id="food-description" type="text" placeholder="Potatoes, Chicken">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="food-price">
                        Price
                    </label>
                    <input class="appearance-none block w-full bg-gray-100 text-gray-500 border border-grey-lighter rounded py-3 px-4" id="food-price" type="text" placeholder="15.99">
                </div>
                <div class="md:w-1/2 px-3">

                    <div class="group cursor-pointer relative inline-block border-gray-400 w-28">
                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="food-discount">
                            Discount
                        </label>
                        <div class="opacity-0 w-16 bg-black text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full -left-2/4 ml-14 px-3 pointer-events-none">
                            0 - 100
                            <svg class="absolute text-black h-2 w-full left-0 top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                            </svg>
                        </div>
                    </div>
                    <input type="number" max="100" min="0" step="1" class="appearance-none block w-full bg-gray-100 text-gray-500 border border-grey-lighter rounded py-3 px-4" id="food-discount" type="text" value="0" placeholder="10">
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="food-status">
                        Status
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-100 border border-grey-lighter text-gray-500 py-3 px-4 pr-8 rounded" id="food-status">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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