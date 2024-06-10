@props(['comment'])
<div class="flex items-start gap-4 p-4 border rounded-tr-xl rounded-br-xl rounded-bl-xl my-3">
    <img class="w-20 rounded-full" src="{{ asset('images/avatar.png') }}" alt="avatar">
    <div class="flex flex-col w-full  leading-1.5">
        <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $comment->user->name }}</span>
            <span
                class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $comment->created_at->format('d-m-Y') }}</span>
        </div>
        <p class="text-sm font-normal py-2 text-gray-900 dark:text-white">
            {{ $comment->content }}
        </p>
    </div>
</div>
