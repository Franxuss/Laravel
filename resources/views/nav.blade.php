<nav class="absolute inset-x-0 top-0 h-10 flex items-center justify-between mb-9 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
        <span class="sr-only">Asignatura Laravel</span>
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
        </a>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
        <a href="/" class="flex items-center text-sm font-semibold leading-6 text-gray-900 hover:text-gray-500 ">Home</a>
        <a href="/showLibros" class="flex items-center text-sm font-semibold leading-6 text-gray-900 hover:text-gray-500 ">Mostrar Libros</a>
        <a href="/showPrestamos" class="flex items-center text-sm font-semibold leading-6 text-gray-900 hover:text-gray-500 ">Mostrar Prestamos</a>
        @auth
            <x-nav-link class="items-center text-sm font-semibold leading-6 text-gray-900 hover:text-gray-500 " href="{{ route('profile.show') }}" :active="request()->routeIs('profile')">
                {{__('Perfil')}}
            </x-nav-link>
        @else
            <x-nav-link class="items-center text-sm font-semibold leading-6 text-gray-900 hover:text-gray-500 " href="{{route('login')}}" :active="request()->routeIs('login')">
                {{__('Login')}}
            </x-nav-link>
            <x-nav-link class="items-center text-sm font-semibold leading-6 text-gray-900 hover:text-gray-500 " href="{{route('register')}}" :active="request()->routeIs('register')">
                {{__('Registro')}}
            </x-nav-link>
        @endauth
    </div>
</nav>
