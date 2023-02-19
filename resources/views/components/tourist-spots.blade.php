@props(['touristSpots'])
<div class="flex flex-col px-20 md:px-40 lg:px-80 space-y-4 my-20">
    <div class="text-xl text-bold">Tourist Spots</div>

    @if($touristSpots->count())
    <form action="/tourist-spots">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search places.." name="search" required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
    <div class="lg:grid gap-4 lg:grid-cols-3 align-center">
        
        @foreach($touristSpots as $touristSpot)
            <x-tourist-spot :touristSpot="$touristSpot" />
        @endforeach

    </div>
    <div class="mt-6 p-4">
        {{$touristSpots->links()}}
    </div>
    @else 
    <div class="mt-6 p-4">
        <div class="text-large">No tourist spots yet</div>
    </div>
    @endif
</div>