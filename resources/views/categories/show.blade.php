<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ 'Posteos realizados en ' . $category->name }}
                </h2>
            </div>
            <div>
                <a href="{{ route('posts.create', ['category_id' => $category->id]) }}"
                    class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Crear
                    un nuevo post</a>
            </div>
        </div>
    </x-slot>

    <div class="p-5">
        <div class="grid grid-cols-3 gap-10 m-12">
            @foreach ($posts as $post)
                @if ($post->habilitated)
                    <x-post-card :post="$post" />
                @endif
            @endforeach
        </div>
    </div>


</x-app-layout>
