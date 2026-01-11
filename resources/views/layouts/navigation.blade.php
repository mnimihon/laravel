<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <x-nav-link :href="url('/')">
                        {{ __('Главная') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex items-center">
                @auth
                    @if(auth()->user()->can('view_users') || auth()->user()->can('view_messages'))
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" class="mr-4">
                            {{ __('Пользователи') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.messages.index')" :active="request()->routeIs('admin.messages.index')" class="mr-4">
                            {{ __('Сообщения') }}
                        </x-nav-link>
                    @endif


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Выйти') }}
                        </x-nav-link>
                    </form>
                @else
                    <div class="hidden space-x-4 sm:flex sm:items-center">
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Регистрация') }}
                        </x-nav-link>
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Вход') }}
                        </x-nav-link>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
