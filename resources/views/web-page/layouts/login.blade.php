<section x-show="openModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div @click.away="openModal = false"
        class="bg-white rounded-lg shadow-xl w-11/12 sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12 p-4">
        <div
            class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0">
            <h1 class="mt-4">login</h1>
            <div class="mt-8">

                <div class="mt-6">

                    <!-- Alertas de Errores de Validación -->
                    <x-validation-errors class="mb-4" />

                    <!-- Mensajes de Sesión -->
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            
                            <div class="mt-1">
                                <x-input id="email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <div class="mt-1">
                                <x-input id="password" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" type="password" name="password" required autocomplete="current-password" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <label for="remember_me" class="block ml-2 text-sm text-neutral-600">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="w-4 h-4 text-blue-600 border-gray-200 rounded focus:ring-blue-500">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}"
                                        class="font-medium text-blue-600 hover:text-blue-500">Forgot your password?</a>
                                </div>
                            @endif
                        </div>

                        <div>
                            <button type="submit"
                                class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                {{ __('Log in') }}
                                </button>
                        </div>
                    </form>


                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 text-neutral-600 bg-white">Or continue with</span>
                        </div>
                    </div>

                    <div>
                        <button type="button"
                            class="w-full items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <div class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 48 48">
                                    <defs>
                                        <path id="a"
                                            d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z">
                                        </path>
                                    </defs>
                                    <clipPath id="b">
                                        <use xlink:href="#a" overflow="visible"></use>
                                    </clipPath>
                                    <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"></path>
                                    <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"></path>
                                    <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"></path>
                                    <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"></path>
                                </svg>
                                <span class="ml-4">Log in with Google</span>
                            </div>
                        </button>
                    </div>
                    <div class="mt-6 text-center ">
                        <a @click.prevent="openRegister = true; openModal = false"
                            class="text-sm text-blue-500 hover:underline dark:text-blue-400">
                            You do not have an account?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
