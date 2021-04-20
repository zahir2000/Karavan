<!DOCTYPE html>
<html lang="en">

<head>
    <title>Karavan - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="tailwind.css">
    <script src="../javascript/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <style>
        .login {
            background-size: cover !important;
        }
    </style>
</head>

<body>
    <div class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form class="max-w-sm m-4 p-10 pt-4 bg-white rounded shadow-xl" action="login.php" method="POST">
                        <img src="../images/Karavan.png" alt="Karavan logo" class="w-3/6 m-auto">
                        <div class="mt-1">
                            <span class="px-1 text-sm text-gray-600">Username</span>
                            <input class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" type="text" name="username" id="username" placeholder="Enter your username" aria-label="username" required>
                        </div>
                        <div class="mt-3" x-data="{ show: true }">
                            <span class="px-1 text-sm text-gray-600">Password</span>
                            <div class="relative">
                                <input placeholder="Enter your password" name="password" id="password" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                        <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                        <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                        </path>
                                    </svg>

                                </div>
                            </div>
                        </div>

                        <div class="mt-4 items-center flex justify-between">
                            <button class="mt-3 text-lg font-semibold bg-gray-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black" type="submit">Login</button>
                        </div>

                        <div class="bg-red-100 border-l-4 border-red-800 rounded text-red-800 pl-4 pr-2 pt-2 pb-2 mt-3 text-sm hidden" role="alert" id="error">
                            <p>Username and/or password is incorrect.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            var images = ['image_1.jpg', 'image_2.jpg', 'image_3.jpg', 'image_4.jpg', 'image_5.jpg', 'image_6.jpg'];
            $('.login').css({
                'background': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')  no-repeat center fixed'
            });

            document.getElementById('username').value = 'admin';
            document.getElementById('password').value = '123';
        });

        $("form").submit(function(e) {
            e.preventDefault();

            $.post(
                'login.php', {
                    username: $("#username").val(),
                    password: $("#password").val()
                },
                function(result) {
                    if (result == "success") {
                        window.location.replace("Home/index.php");
                    } else {
                        document.getElementById("error").classList.remove("hidden");
                    }
                }
            );
        });
    </script>
</body>

</html>