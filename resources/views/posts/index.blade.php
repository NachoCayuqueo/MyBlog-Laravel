<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Seleccione un post de su interes') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4">
        @if (count($posts) > 0)
            <x-posts-table :posts="$posts" :show_buttons="false" />
        @else
            <x-text-info :text="__('No se encontraron posts cargados')" />
        @endif
    </div>
</x-app-layout>
