<form id="books">
    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="books_title" type="text" autofocus>
        <label for="books_title" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Title</label>
    </div>

    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="books_publisher" type="text" autofocus>
        <label for="books_publisher" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Publisher</label>
    </div>

    <div class="mt-4 mb-4  flex justify-between gap-3">
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="books_year" type="text" autofocus>
            <label for="books_year" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Year</label>
        </span>
        <span class="w-1/2 relative">
            <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="books_isbn" type="text" autofocus>
            <label for="books_isbn" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">ISBN</label>
        </span>
    </div>

    <div class="mt-4 mb-4 relative">
        <input class="input break-all resize-none border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-gray-700 focus:outline-none active:outline-none active:border-indigo-600" id="books_authors" type="text" autofocus>
        <label for="books_authors" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Authors</label>
    </div>

    <div class="mt-4 relative">
        <textarea placeholder="Result will be shown here" class="w-full px-3 text-sm py-2 text-gray-700 border border-gray-400 rounded-lg focus:outline-none" rows="4" id="books_result"></textarea>
    </div>

    <button type="submit" class="w-full py-3 mt-2 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
        Submit
    </button>
</form>