<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Seleccione un post de su interes') }}
            </h2>
        </div>
    </x-slot>

    <div class="grid grid-cols-3 gap-10 m-12">
        <h1>Tabla con todos los post</h1>
    </div>
</x-app-layout>
