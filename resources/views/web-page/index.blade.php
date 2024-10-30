@extends('web-page.layouts.template')

@section('title-page')
@endsection

@section('content')
    <section
        class="relative bg-[url(https://pagina3.pe/wp-content/uploads/2021/08/Negritos-de-Huanuco.jpg)] bg-cover bg-center bg-no-repeat">
        <div class="absolute inset-0 bg-blue-950/75 sm:bg-transparent sm:bg-gradient-to-r from-blue-950/90 to-white/10">
        </div>

        <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
            <div class="max-w-xl text-center sm:text-left">
                <h1 class="text-3xl font-extrabold sm:text-5xl text-white">
                    WELCOME TO HUANUCO
                </h1>

                <p class="mt-4 max-w-lg sm:text-xl text-white">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
                    numquam ea!
                </p>

                <div class="mt-8 flex flex-wrap gap-4 text-center">
                    <a href="{{ route('Catalogo') }}"
                        class="block w-full rounded bg-rose-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-rose-700 focus:outline-none focus:ring active:bg-rose-500 sm:w-auto">
                        Get Started
                    </a>

                    <a href="{{ route('about_us') }}"
                        class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-rose-600 shadow hover:text-rose-700 focus:outline-none focus:ring active:text-rose-500 sm:w-auto">
                        Learn More
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="text-white w-8 h-8 animate-bounce">
                <path fill-rule="evenodd"
                    d="M10 12.586L5.707 8.293a1 1 0 0 1 1.414-1.414L10 10.758l3.879-3.879a1 1 0 0 1 1.414 1.414L10 12.586z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </section>

    <!--cards-->
    <section class="font-[sans-serif] py-4 mx-auto lg:max-w-6xl max-w-lg md:max-w-full"
        x-data="{ scrolled: false }"
        x-init="window.addEventListener('scroll', () => { if (window.scrollY > 100) { scrolled = true; } })">
        <div class="bg-gray-100 md:px-10 px-4 py-12 font-[sans-serif]" x-cloak x-show="scrolled">
            <div class="max-md:max-w-lg mx-auto">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-10 text-center">Categorías</h2>
                <div x-data="{ showAll: false }" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                    @foreach ($categories as $index => $category)
                        <div x-show="{{ $index }} < 3 || showAll"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            class="relative grid h-[40rem] w-full max-w-[28rem] flex-col items-end justify-center overflow-hidden rounded-xl bg-white bg-clip-border text-center text-gray-700 hover:scale-105 transition-transform duration-300">
                            <div
                                class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-[url('https://images.unsplash.com/photo-1552960562-daf630e9278b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80')] bg-cover bg-clip-border bg-center text-gray-700 shadow-none">
                                <div
                                    class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50">
                                </div>
                            </div>
                            <div class="relative p-6 px-6 py-14 md:px-12">
                                <h2
                                    class="mb-6 block font-sans text-4xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                    {{ $category->category_name }}
                                </h2>
                            </div>
                        </div>
                    @endforeach

                    <!-- Botón para mostrar todas las categorías -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 flex justify-center mt-6">
                        <button @click="showAll = !showAll"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition flex items-center">
                            <svg x-show="showAll"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 ml-2">
                                <path fill-rule="evenodd"
                                    d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg x-show="!showAll"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 ml-2">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
