@props(['title', 'content'])
<div
    class="block border-4 border-double max-w-sm p-6 bg-white  border-white rounded-lg bg-black/50 backdrop-blur-md hover:bg-black">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white ">{{ $title }}</h5>
    <p class="font-normal text-gray-100 ">{{ $content }}</p>
</div>
