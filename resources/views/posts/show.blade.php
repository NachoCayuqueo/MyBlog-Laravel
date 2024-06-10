<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $post->title }}
            </h2>
        </div>
    </x-slot>


    <div class="flex justify-center">
        <div
            class="m-5 p-5 flex flex-col justify-center items-center border-2 text-white w-[70vw] rounded-tr-xl rounded-br-xl rounded-bl-xl">
            <div>
                <div class="border-2 rounded-md">
                    <img class="lg:h-62 md:h-48 w-full object-cover object-center"
                        src="{{ asset('images/categories-poster/' . $post->poster) }}" alt="post">
                </div>
                <h1 class="my-3">{{ $post->content }}</h1>
            </div>
            <div class="w-[100%]">
                <x-card-create-comment :post="$post" />
                @foreach ($comments as $comment)
                    <x-card-comment :comment="$comment" />
                @endforeach
            </div>
        </div>
    </div>



</x-app-layout>
