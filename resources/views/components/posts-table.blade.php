@props(['posts', 'show_buttons'])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Imagen
                </th>
                <th scope="col" class="px-6 py-3">
                    Titulo
                </th>
                <th scope="col" class="px-6 py-3">
                    Reseña
                </th>
                <th scope="col" class="px-6 py-3">
                    Cantidad de Comentarios
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Creación
                </th>
                @if ($show_buttons)
                    <th scope="col" class="px-6 py-3">
                        Habilitado
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                @php
                    $isHabilitated = $show_buttons ? true : $post->habilitated;
                @endphp
                @if ($isHabilitated)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="p-4 cursor-pointer hover:bg-blue-600"
                            onclick="window.location='{{ route('posts.show', $post->id) }}';">
                            <img src="{{ 'images/categories-poster/' . $post->poster }}"
                                class="w-16 md:w-32 max-w-full max-h-full" alt="Mi Imagen">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $post->title }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $post->content }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $post->comments_count }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $post->created_at->format('d-m-Y') }}
                        </td>
                        @if ($show_buttons)
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                <label class="inline-flex items-center mb-5 cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" data-id="{{ $post->id }}"
                                        {{ $post->habilitated ? 'checked' : '' }}>
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('posts.edit', $post->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth={1.5} stroke="currentColor"
                                            class="size-6 font-medium text-blue-600  hover:underline">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <button type="button" onclick="confirmDeletePost('{{ $post->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth={1.5} stroke="currentColor"
                                            class="size-6 font-medium text-red-600  hover:underline">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            const postId = $(this).data('id');
            const habilitated = $(this).is(':checked') ? 1 : 0;
            $.ajax({
                url: '/posts/' + postId + '/toggle-habilitated',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    habilitated
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Exito",
                            text: response.message,
                            icon: "success"
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Error",
                        text: 'Error al actualizar el estado del post',
                        icon: "error"
                    });
                }
            });
        });
    });

    function confirmDeletePost(id) {
        Swal.fire({
            title: "¿Estas seguro de eliminar el post?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/posts/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Post Eliminado!",
                            text: response.message,
                            icon: "success"
                        }).then(() => location.reload());
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Exito",
                            text: 'Error al eliminar el post',
                            icon: "error"
                        });
                    }
                });


            }
        });
    }
</script>
