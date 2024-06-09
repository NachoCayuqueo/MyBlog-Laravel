@props(['image', 'creation_date', 'title', 'id'])

<div class="flex flex-row">
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <img class="lg:h-62 md:h-48 w-full object-cover object-center" src={{ asset($image) }} alt="blog">
        <div class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in">
            <h2 class="text-base font-medium text-indigo-300 mb-1">{{ $creation_date }}</h2>
            <h1 class="text-center text-2xl font-semibold mb-3">{{ $title }}</h1>

            <div class="flex items-center justify-end">
                <a href="{{ route('categories.show', $id) }}"
                    class="text-indigo-300 inline-flex items-center md:mb-2 lg:mb-0 cursor-pointer">
                    Ingresar
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" class="size-6 font-medium text-blue-600  hover:underline">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
