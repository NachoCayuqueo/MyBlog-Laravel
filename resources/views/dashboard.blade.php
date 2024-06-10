<x-app-layout>
    <div>
        <aside id="default-sidebar"
            class="fixed left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">

                    <li>
                        <a href="javascript:void(0);" data-target="mis-categorias"
                            class="sidebar-button flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Mis categorias</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-target="mis-posteos"
                            class="sidebar-button flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Mis Posteos</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-target="mis-comentarios"
                            class="sidebar-button flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M15.514 3.293a1 1 0 0 0-1.415 0L12.151 5.24a.93.93 0 0 1 .056.052l6.5 6.5a.97.97 0 0 1 .052.056L20.707 9.9a1 1 0 0 0 0-1.415l-5.193-5.193ZM7.004 8.27l3.892-1.46 6.293 6.293-1.46 3.893a1 1 0 0 1-.603.591l-9.494 3.355a1 1 0 0 1-.98-.18l6.452-6.453a1 1 0 0 0-1.414-1.414l-6.453 6.452a1 1 0 0 1-.18-.98l3.355-9.494a1 1 0 0 1 .591-.603Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Mis Comentarios</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div id="mis-categorias" class="content-section">
                    @if (count($categories) > 0)
                        <x-categories-table :categories="$categories" />
                    @else
                        <x-text-info :text="__('No se encontraron categorias cargadas')" />
                    @endif
                </div>
                <div id="mis-posteos" class="content-section hidden">
                    @if (count($posts) > 0)
                        <x-posts-table :posts="$posts" :show_buttons="true" />
                    @else
                        <x-text-info :text="__('No se encontraron post cargados')" />
                    @endif
                </div>
                <div id="mis-comentarios" class="content-section hidden">
                    @if (count($comments) > 0)
                        <x-comments-table :comments="$comments" />
                    @else
                        <x-text-info :text="__('No se encontraron comentarios cargados')" />
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        const sections = $('.content-section');
        const buttons = $('.sidebar-button');

        function showSection(sectionId) {
            sections.each(function() {
                if ($(this).attr('id') === sectionId) {
                    $(this).removeClass('hidden');
                } else {
                    $(this).addClass('hidden');
                }
            });
        }

        buttons.on('click', function() {
            const targetSection = $(this).data('target');
            showSection(targetSection);
        });
    });
</script>
