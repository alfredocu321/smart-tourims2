<header x-data="{ open: false }" class="absolute inset-x-0 top-0 z-50 bg-transparent w-full">
    <div class="relative bg-gradient-to-tr from-black/70 show mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-1 md:flex md:items-center md:gap-12">
                <div class="flex items-center gap-6 text-xl">
                    <a class="text-white flex items-center gap-2" href="{{ route('index') }}">
                        <span class="sr-only">Home</span>
                        <svg class="h-8" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.41 10.3847C1.14775 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                                fill="currentColor" />
                        </svg>
                        <span>Smart Tourism</span>
                    </a>
                </div>
            </div>

            <div class="md:flex md:items-center md:gap-12">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-xl ">
                        <li>
                            <a class="text-white font-black  transition hover:text-gray-500/75"
                                href={{ route('index') }}> INDEX
                            </a>
                        </li>

                        <li>
                            <a class="text-white font-black  transition hover:text-gray-500/75"
                                href={{ route('about_us') }}> ABOUT US</a>
                        </li>

                        <li>
                            <a class="text-white font-black  transition hover:text-gray-500/75"
                                href={{ route('Catalogo') }}>
                                CATALOGO</a>
                        </li>

                        <li>
                            <a class="text-white font-black  transition hover:text-gray-500/75"
                                href={{ route('virtual') }}>
                                VIRTUAL</a>
                        </li>

                        <li>
                            <a class="text-white font-black  transition hover:text-gray-500/75"
                                href={{ route('photo') }}>
                                PHOTO 360°</a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-6 text-xl ">
                    <a href="{{ route('cart.index') }}" class="relative text-white font-black  transition hover:text-gray-500/75">
                        <!-- Icono de Carrito SVG -->
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1.5-6H6L5.5 3H3m0 0h3m3 0h10l.4 2M7 13h10v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6zm0 0L5 6h14l-1.5 6z"></path>
                        </svg>
                
                        <!-- Texto de Carrito -->
                        <span class="mr-2">CART</span>
                
                        <!-- Contador -->
                       <!-- <span class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full px-2 py-1 text-xs font-bold">
                            5
                        </span>-->
                    <a>
                    <!-- <div class="sm:flex sm:gap-4" x-data="{ cartOpen: false, cartCount: 0 }">
                        <div class="relative">
                            <button @click="cartOpen = !cartOpen" class="text-gray-800 focus:outline-none">
                                <-- Ícono del carrito
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l1.5-6H6L5.5 3H3m0 0h3m3 0h10l.4 2M7 13h10v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6zm0 0L5 6h14l-1.5 6z">
                        </path>
                    </svg>
                    <-- Contador del carrito
                    <span
                        class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1 -translate-y-1 bg-red-600 rounded-full"></span>
                    <span
                        class="absolute top-0 right-0 h-4 w-4 transform translate-x-2 -translate-y-2 rounded-full bg-red-600 text-white text-xs flex items-center justify-center"
                        x-text="cartCount"></span>
                    </button>
                    <--   Modal del carrito
                            <div x-show="cartOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-80">
                                    <h2 class="text-xl font-bold mb-4">Tu carrito</h2>
                                    <p class="mb-4" x-show="cartCount === 0">Tu carrito está vacío.</p>
                                    <div x-show="cartCount > 0">
                                        
                                       cart include

                                    </div>
                                    <button @click="cartOpen = false" class="mt-4 text-gray-500 hover:text-gray-800">Cerrar</button>
                                </div>
                            </div>
                             -->
                </div>
            </div>
            <!--auth-->
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth

                        <div x-data="{ isOpen: false, openedWithKeyboard: false }" @keydown.esc.window="isOpen = false, openedWithKeyboard = false"
                            class="relative">
                            <!-- Toggle Button -->
                            <button type="button" @click="isOpen = ! isOpen"
                                @keydown.space.prevent="openedWithKeyboard = true"
                                @keydown.enter.prevent="openedWithKeyboard = true"
                                @keydown.down.prevent="openedWithKeyboard = true"
                                class="inline-flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 dark:border-slate-700 dark:bg-slate-800 dark:focus-visible:outline-slate-300"
                                :class="isOpen || openedWithKeyboard ? 'text-black dark:text-white' :
                                    'text-slate-700 dark:text-slate-300'"
                                :aria-expanded="isOpen || openedWithKeyboard" aria-haspopup="true">
                                Actions Menu
                                <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 rotate-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <!-- Dropdown Menu -->
                            <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
                                @click.outside="isOpen = false, openedWithKeyboard = false"
                                @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()"
                                class="absolute top-11 flex w-full min-w-[12rem] flex-col divide-y divide-slate-300 overflow-hidden rounded-xl border border-slate-300 bg-slate-100 dark:divide-slate-700 dark:border-slate-700 dark:bg-slate-800"
                                role="menu">
                                <!-- Dropdown Section -->
                                <div class="flex flex-col py-1.5">
                                    @hasanyrole('Admin|Partner')
                                        <a href={{ 'admin' }}
                                            class="flex items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z" />
                                            </svg>
                                            Dashboard
                                        </a>
                                    @endhasanyrole
                                    <!--       <a href="#" class="flex items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white" role="menuitem">
                                                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"  class="w-4 h-4">
                                                        <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"/>
                                                        <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"/>
                                                    </svg>
                                                    Messages
                                                </a>
                                                <a href="#" class="flex items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white" role="menuitem">
                                                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"  class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Favorites
                                                </a>
                                            </div>-->
                                    <!-- Dropdown Section -->
                                    <div class="flex flex-col py-1.5">
                                        <a href={{ route('profile.show') }}
                                            class="flex items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                aria-hidden="true" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd"
                                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Profile
                                        </a>
                                        <!--  <a href="#" class="flex items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white" role="menuitem">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"  class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Settings
                                                </a>-->
                                    </div>
                                    <!-- Dropdown Section -->
                                    <div class="flex flex-col py-1.5">
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                                class="flex items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white"
                                                role="menuitem">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                    fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.75A2.75 2.75 0 0 0 11.25 2h-3A2.75 2.75 0 0 0 5.5 4.75v.5a.75.75 0 0 0 1.5 0v-.5c0-.69.56-1.25 1.25-1.25h3c.69 0 1.25.56 1.25 1.25v6.5c0 .69-.56 1.25-1.25 1.25h-3c-.69 0-1.25-.56-1.25-1.25v-.5a.75.75 0 0 0-1.5 0v.5A2.75 2.75 0 0 0 8.25 14h3A2.75 2.75 0 0 0 14 11.25v-6.5Zm-9.47.47a.75.75 0 0 0-1.06 0L1.22 7.47a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 1 0 1.06-1.06l-.97-.97h7.19a.75.75 0 0 0 0-1.5H3.56l.97-.97a.75.75 0 0 0 0-1.06Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Logout
                                            </a>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="sm:flex sm:gap-4">
                                <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow transition hover:bg-teal-700"
                                    href="#" @click.prevent="openModal = true">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <div class="hidden sm:flex">
                                        <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:bg-gray-200"
                                            href="#" @click.prevent="openRegister = true">
                                            Register
                                        </a>
                                    </div>
                                @endif
                            </div>

                        @endauth
                </nav>
            @endif
            <div class="block md:hidden">
                <button @click="open = !open"
                    class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    </div>
    </div>

    <nav x-show="open" @click.away="open = false" class="md:hidden bg-white border-t border-gray-200">
        <ul class="mt-4 space-y-4 text-sm">
            <li>
                <a class="block text-gray-500 transition hover:text-gray-500/75" href={{ route('index') }}> index </a>
            </li>

            <li>
                <a class="block text-gray-500 transition hover:text-gray-500/75" href={{ route('about_us') }}> about
                    us
                </a>
            </li>

            <li>
                <a class="block text-gray-500 transition hover:text-gray-500/75" href={{ route('Catalogo') }}>
                    catalogo
                </a>
            </li>
            <li>
                <a class="block text-gray-500 transition hover:text-gray-500/75" href={{ route('Catalogo') }}> virtual
                </a>
            </li>
        </ul>
    </nav>
</header>

@include('web-page.layouts.login')
@include('web-page.layouts.register')
