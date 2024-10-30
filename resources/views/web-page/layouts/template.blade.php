<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>@yield('title-page', 'Smart-Tourism')</title>
</head>

<body class="bg-gray-100 text-gray-900"
      x-data="{ showButton: false, 
                @if (Route::has('login')) 
                    @auth openModal: false 
                    @else 
                        openModal: @if (session('status') || $errors->any()) true @else false @endif, 
                        openRegister: false 
                    @endauth 
                @endif 
              }" 
      @scroll.window="showButton = (window.scrollY > 200)">



    <!--header-->
    @include('web-page.layouts.header')

    <!--content-->
    <main class="flex-grow">
        @yield('content')
        <a href="#"
        id="ui-to-top"
        class="ui-to-top fixed bottom-5 right-5 bg-blue-500 text-white p-3 rounded-full shadow-lg transition-opacity duration-300"
        x-show="showButton"
        @click.prevent="window.scrollTo({ top: 0, behavior: 'smooth' })"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
            <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
          </svg>
          
     </a>
    </main>


    <!--footer-->

    @include('web-page.layouts.footer')


</body>

@stack('scripts')

</html>
