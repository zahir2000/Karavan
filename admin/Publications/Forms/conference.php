<form id="conference">
    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="conference_title" type="text" autofocus>
        <label for="conference_title" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Title</label>
    </div>

    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="conference_title-2" type="text" autofocus>
        <label for="conference_title-2" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Conference Title</label>
    </div>

    <div class="mt-4 mb-4  flex justify-between gap-3">
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="conference_pages" type="text" autofocus>
            <label for="conference_pages" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Pages</label>
        </span>
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="conference_place" type="text" autofocus>
            <label for="conference_place" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Place</label>
        </span>
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="conference_date" type="text" autofocus>
            <label for="conference_date" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Date</label>
        </span>
    </div>

    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="conference_authors" type="text" autofocus>
        <label for="conference_authors" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Authors</label>
    </div>

    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="conference_citation" type="text" autofocus>
        <label for="conference_citation" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Citation Databases</label>
    </div>

    <div class="mt-4 relative">
        <textarea placeholder="Result will be shown here" class="w-full px-3 text-sm py-2 text-gray-700 border border-gray-400 rounded-lg focus:outline-none" rows="4" id="conference_result"></textarea>
    </div>

    <button type="submit" class="w-full py-3 mt-2 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
        Submit
    </button>
</form>