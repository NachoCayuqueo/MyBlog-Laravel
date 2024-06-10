@props(['post'])
<div class="flex items-start gap-4 p-4 border rounded-tr-xl rounded-br-xl rounded-bl-xl my-3">
    <img class="w-20 rounded-full" src="{{ asset('images/avatar.png') }}" alt="avatar">
    <div class="flex flex-col w-full  leading-1.5">
        <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">¿Quieres dejar un
                comentario?</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">en este momento</span>
        </div>
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="flex items-center rounded-lg py-2">
                <textarea id="content" name="content" rows="4"
                    class=" w-full text-sm text-gray-900 bg-white rounded-lg border  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Deja un comentario..."></textarea>
                <button type="submit"
                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                    <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                    </svg>
                    <span class="sr-only">enviar</span>
                </button>
            </div>
        </form>
    </div>
</div>
