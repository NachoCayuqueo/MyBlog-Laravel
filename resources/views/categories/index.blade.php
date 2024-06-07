<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Selecciona una categoria de tu interes') }}
            </h2>
            {{-- <div class="">
                <a href="{{ route('categories.create') }}"
                    class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Crear
                    una nueva categoria</a>
            </div> --}}
        </div>
    </x-slot>

    <div class="grid grid-cols-3 gap-10 m-12">
        @foreach ($categories as $category)
            <x-card :image="__('images/categories-poster/' . $category->poster)" :creation_date="__($category->created_at->format('d-m-Y'))" :title="__($category->name)" :id="__($category->id)" />
        @endforeach
    </div>
</x-app-layout>
