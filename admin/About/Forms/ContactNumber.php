<?php
$con = MenuConnection::getInstance();
$contactNumber = $con->getContactNumber();
?>

<dialog id="contact-number" class="w-11/12 md:w-1/2 p-5 bg-white rounded-md">
    <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-end items-center">
            <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                Contact Number
            </div>
            <div onclick="document.getElementById('contact-number').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
            <!--Header End-->
        </div>
        <div class="flex justify-center"><span style="width: 25%;" class="h-px bg-gray-400 text-center"></span></div>
        <!-- Modal Content-->
        <div class="w-full h-auto pb-10 px-2 justify-center items-center bg-white rounded text-center text-gray-500">
            <div class="grid place-items-center">
                <div class="w-11/12 bg-white">
                    <form id="contact-number-form">
                        <div class="mt-4 mb-4 relative">
                            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="mondayfriday" name="mondayfriday" type="text" value="<?php echo $mondayFriday; ?>" autofocus>
                            <label for="mondayfriday" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Monday to Friday</label>
                        </div>
                        <div class="mt-4 mb-4 relative">
                            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="satsun" name="satsun" type="text" value="<?php echo $satSun; ?>" autofocus>
                            <label for="satsun" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Saturday & Sunday</label>
                        </div>
                        <div id="result" class="hidden bg-green-200 px-6 py-2 text-sm font-semibold mx-2 my-4 rounded-md flex items-center mx-auto">
                            <svg viewBox="0 0 24 24" class="text-green-600 w-4 h-4 sm:w-4 sm:h-4 mr-3">
                                <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"></path>
                            </svg>
                            <span id="result-span" class="text-green-800">Successfuly updated.</span>
                        </div>
                        <button type="submit" class="w-full py-3 mt-2 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal Content-->
    </div>
</dialog>

<script>
    $("#business-hours-form").submit(function(e) {
        e.preventDefault();

        $.post(
            'Forms/UpdateAddress.php', {
                mondayFriday: $("#mondayfriday").val(),
                satSun: $("#satsun").val(),
            },
            function(result) {
                if (result == "success") {
                    document.getElementById("result").classList.remove("hidden");
                    setTimeout(
                        function() {
                            document.getElementById("result").classList.add("hidden");
                            document.getElementById('business-hours').close();
                        }, 1500);
                } else {
                    document.getElementById("result").classList.remove("hidden");
                    $("#result-span").val("Unable to save changes.");
                }
            }
        );
    });
</script>