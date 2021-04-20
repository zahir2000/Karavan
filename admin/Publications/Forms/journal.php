<form id="journal" method="POST" action="new-journal.php">
    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="title" name="title" type="text" autofocus>
        <label for="title" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Title</label>
    </div>

    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="journalTitle" name="journalTitle" type="text" autofocus>
        <label for="journalTitle" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Journal Title</label>
    </div>

    <div class="mt-4 mb-4  flex justify-between gap-3">
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="volume" name="volume" type="text" autofocus>
            <label for="volume" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Volume & Issue No.</label>
        </span>
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="year" name="year" type="text" autofocus>
            <label for="year" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Year</label>
        </span>
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="pages" name="pages" type="text" autofocus>
            <label for="pages" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Pages</label>
        </span>
    </div>

    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="authors" name="authors" type="text" autofocus>
        <label for="authors" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Authors</label>
    </div>

    <div class="mt-4 mb-4  flex justify-between gap-3">
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="impactFactor" name="impactFactor" type="text" autofocus>
            <label for="impactFactor" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Impact Factor</label>
        </span>
        <span class="w-1/2 relative tooltip">
            <p class="tooltip-text text-sm -mt-5">SCOPUS, IEEE, etc.</p>
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="citation" name="citation" type="text" autofocus>
            <label for="citation" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Citation Databases</label>
        </span>
    </div>

    <div class="mt-4 relative">
        <textarea placeholder="Result will be shown here" class="w-full px-3 text-sm py-2 text-gray-700 border border-gray-400 rounded-lg focus:outline-none" rows="4" id="result" name="result"></textarea>
    </div>

    <button type="submit" class="w-full py-3 mt-2 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
        Submit
    </button>
</form>

<script>
    $("#journal").submit(function(e) {
        e.preventDefault();

        $.post(
            'new-journal.php', {
                title: $("#title").val(),
                journalTitle: $("#journalTitle").val(),
                volume: $("#volume").val(),
                year: $("#year").val(),
                pages: $("#pages").val(),
                authors: $("#authors").val(),
                impactFactor: $("#impactFactor").val(),
                citation: $("#citation").val(),
                result: $("#result").val()
            },
            function(result) {
                if (result == "success") {
                    document.getElementById("journal").reset();
                    $("#result").val("Values inserted successfully.");
                } else {
                    $("#result").val("Error occured. Please contact administrator.");
                }
            }
        );
    });
</script>