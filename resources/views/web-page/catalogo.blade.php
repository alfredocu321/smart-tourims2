@extends('web-page.layouts.template')

@section('title-page')


@section('content')
    <section class="text-gray-600 body-font py-9"
        style="background-image: url(https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="flex flex-col items-center px-5 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
                <div class="w-full mx-auto ">
                    <h2 class="text-5xl text-center">
                        PRODUCT
                    </h2>
                    <p>
                        Right. Say that again. No, no, George, look, it's just an act, right? Okay, so 9:00 you're strolling
                        through the parking.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="font-[sans-serif] py-4 mx-auto lg:max-w-6xl max-w-lg md:max-w-full">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-12">Store</h2>
        <div class="mx-auto mt-5 w-screen max-w-screen-md py-20 leading-6">
            <form action="{{ route('Catalogo') }}" method="GET" class="relative flex w-full flex-col justify-between rounded-lg border p-2 sm:flex-row sm:items-center sm:p-0">
                <div class="flex">
                    <label class="focus-within:ring h-14 rounded-md bg-gray-200 px-2 ring-emerald-200" for="category">
                        <select class="bg-transparent px-6 py-4 outline-none" name="category" id="category">
                            <option value="All" {{ request('category') == 'All' ? 'selected' : '' }}>All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_name }}" {{ request('category') == $category->category_name ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <input type="text" name="search" value="{{ request('search') }}" class="ml-1 h-14 w-full cursor-text rounded-md border py-4 pl-6 outline-none ring-emerald-200 sm:border-0 sm:pr-40 sm:pl-12 focus:ring" placeholder="Product name" />
                </div>
                <button type="submit" class="mt-2 inline-flex h-12 w-full items-center justify-center rounded-md bg-emerald-500 px-10 text-center align-middle text-base font-medium normal-case text-white outline-none ring-emerald-200 ring-offset-1 sm:absolute sm:right-0 sm:mt-0 sm:mr-1 sm:w-32 focus:ring">Search</button>
            </form>
            
            <!--  <div class="mt-4 divide-y rounded-b-xl border px-4 shadow-lg sm:mr-32 sm:ml-28">
                      <div class="cursor-pointer px-4 py-2 text-gray-600 hover:bg-emerald-400 hover:text-white"><span class="m-0 font-medium">Ca</span> <span>lifornia</span></div>
                      <div class="cursor-pointer px-4 py-2 text-gray-600 hover:bg-emerald-400 hover:text-white"><span class="m-0 font-medium">Ca</span> <span>nada</span></div>
                      <div class="cursor-pointer px-4 py-2 text-gray-600 hover:bg-emerald-400 hover:text-white"><span class="m-0 font-medium">Ca</span> <span>mbodia</span></div>
                      <div class="cursor-pointer px-4 py-2 text-gray-600 hover:bg-emerald-400 hover:text-white"><span class="m-0 font-medium">Ca</span> <span>meo</span></div>
                      <div class="cursor-pointer px-4 py-2 text-gray-600 hover:bg-emerald-400 hover:text-white"><span class="m-0 font-medium">Ca</span> <span>rsville</span></div>
                    </div>-->
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($products as $product)
                @if ($product->state && $product->user->state)
                    <div
                        class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                            <img class="object-cover" src={{ asset('storage/' . $product->media->path) }}
                                alt="product image" />
                            <span
                                class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">39%
                                OFF</span>
                        </a>
                        <div class="mt-4 px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl tracking-tight text-slate-900">{{ $product->product_name }}</h5>
                            </a>
                            <div class="mt-2 mb-5 flex items-center justify-between">
                                <p>
                                    <span class="text-3xl font-bold text-slate-900">S/. {{ $product->price }}</span>
                                    <!--  <span class="text-sm text-slate-900 line-through">$699</span>-->
                                </p>
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <span
                                        class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold">5.0</span>
                                </div>
                            </div>
                            <a href={{ route('details_product', ['id' => $product->id]) }}
                                class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to cart</a>
                        </div>
                    </div>
                @endif
            @empty
                <p class="col-span-1 md:col-span-2 lg:col-span-3 text-center">No products found.</p>
            @endforelse
        </div>
    </section>
@endsection
