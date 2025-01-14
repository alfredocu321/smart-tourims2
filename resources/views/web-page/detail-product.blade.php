@extends('web-page.layouts.template')
@section('title-page')
@section('content')
    <section class="text-gray-600 body-font py-9" style="background-color: black">
    </section>


    <section class="py-12 sm:py-16">
        <div class="container mx-auto px-4">

            <nav class="flex">
                <ol role="list" class="flex items-center">
                    <li class="text-left">
                        <div class="-m-1">
                            <a href="#"
                                class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800">
                                Home </a>
                        </div>
                    </li>

                    <li class="text-left">
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <div class="-m-1">
                                <a href="#"
                                    class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800">
                                    Products </a>
                            </div>
                        </div>
                    </li>

                    <li class="text-left">
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <div class="-m-1">
                                <a href="#"
                                    class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"
                                    aria-current="page"> {{ $product->product_name }} </a>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>
            <!--details-->
            @if (session('message'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 2000)" 
        x-show="show" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 transform translate-y-4" 
        x-transition:enter-end="opacity-100 transform translate-y-0" 
        x-transition:leave="transition ease-in duration-300" 
        x-transition:leave-start="opacity-100 transform translate-y-0" 
        x-transition:leave-end="opacity-0 transform translate-y-4" 
        role="alert" 
        class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-opacity-75 bg-gray-800"
    >
        <div class="relative flex flex-col w-80 p-3 text-sm text-white bg-green-600 rounded-md shadow-lg">
            <p class="flex items-center text-base">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 mr-2 mt-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
                </svg>
                Success
            </p>
            <p class="ml-4 p-3">
                {{ session('message') }}
            </p>
            
            <button 
                @click="show = false" 
                class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5" 
                type="button"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif

            <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
                <div class="lg:col-span-3 lg:row-end-1">
                    <div class="lg:flex lg:items-start">
                        <div class="lg:order-2 lg:ml-5">
                            <div class="max-w-xl overflow-hidden rounded-lg">
                                <img class="h-full w-full max-w-full object-cover"
                                    src={{ asset('storage/' . $product->media->path) }} alt="" />
                            </div>
                        </div>
                        <!--
                                            <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
                                                <div class="flex flex-row items-start lg:flex-col">
                                                    <button type="button"
                                                        class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-gray-900 text-center">
                                                        <img class="h-full w-full object-cover"
                                                            src={{ asset('storage/' . $product->media->path) }} alt="" />
                                                    </button>
                                                    <button type="button"
                                                        class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center">
                                                        <img class="h-full w-full object-cover"
                                                            src={{ asset('storage/' . $product->media->path) }} alt="" />
                                                    </button>
                                                    <button type="button"
                                                        class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center">
                                                        <img class="h-full w-full object-cover"
                                                            src={{ asset('storage/' . $product->media->path) }} alt="" />
                                                    </button>
                                                </div>
                                            </div>-->
                    </div>
                </div>

                <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2" x-data="{ currentVal: 1, minVal: 1, maxVal: 20, decimalPoints: 0, incrementAmount: 1, productPrice: {{ $product->price }} }">
                    <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{ $product->product_name }}</h1>

                    <!---->
                    <div class="mt-5 flex items-center">
                        <div class="flex items-center">
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                        </div>
                        <p class="ml-2 text-sm font-medium text-gray-500">1,209 Reviews</p>
                    </div>

                    <h2 class="mt-8 text-base text-gray-900">category</h2>
                    <div class="mt-3 flex select-none flex-wrap items-center gap-1">
                        <input type="radio" name="type" value="Powder" class="peer sr-only" checked />
                        <p
                            class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">
                            {{ $product->category->category_name }}</p>
                    </div>

                    <h2 class="mt-8 text-base text-gray-900">Number of Persons</h2>
                    <div class="mt-3 flex select-none flex-wrap items-center gap-1">
                        <label>
                            <div x-data="{
                                currentVal: 1,
                                minVal: 1,
                                maxVal: 100,
                                incrementAmount: 1,
                                decimalPoints: 0,
                                updateQuantity() {
                                    document.getElementById('qty').value = this.currentVal;
                                }
                            }" class="flex flex-col gap-1">
                                <div @dblclick.prevent class="flex items-center">
                                    <button
                                        @click="currentVal = Math.max(minVal, currentVal - incrementAmount); updateQuantity()"
                                        class="flex h-10 items-center justify-center rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-blue-600"
                                        aria-label="subtract">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </button>
                                    <input x-model="currentVal.toFixed(decimalPoints)" id="counterInput" type="text"
                                        class="h-10 w-20 rounded-none bg-transparent text-center text-black focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-blue-700 dark:text-white dark:focus-visible:outline-blue-600"
                                        readonly />
                                    <button
                                        @click="currentVal = Math.min(maxVal, currentVal + incrementAmount); updateQuantity()"
                                        class="flex h-10 items-center justify-center rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-blue-600"
                                        aria-label="add">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </div>
                                <div
                                    class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
                                    <div class="flex items-end">
                                        <h1 class="text-3xl font-bold">S/. <span
                                                x-text="(productPrice * currentVal).toFixed(2)"></span></h1>
                                        <!--<span class="text-base">/month</span>-->
                                    </div>
                                </div>
                                <div>
                                    <a href="javascript:void(0)"
                                        onclick="event.preventDefault(); document.getElementById('addtocart').submit()"
                                        class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-12 py-3 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        <span>Add to cart</span>
                                        <form action="{{ route('cart.store') }}" method="post" id="addtocart">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1" id="qty">
                                        </form>
                                    </a>
                                </div>

                            </div>

                        </label>
                    </div>



                    <!--

                                <ul class="mt-8 space-y-2">
                                    <li class="flex items-center text-left text-sm font-medium text-gray-600">
                                        <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                class=""></path>
                                        </svg>
                                        Free shipping worldwide
                                    </li>

                                    <li class="flex items-center text-left text-sm font-medium text-gray-600">
                                        <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                                                class=""></path>
                                        </svg>
                                        Cancel Anytime
                                    </li>
                                </ul>-->
                </div>

                <!--comentarios-->
                @include('web-page.comments')
            </div>
        </div>
    </section>

@endsection
