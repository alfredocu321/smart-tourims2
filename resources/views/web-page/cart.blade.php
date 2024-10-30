@extends('web-page.layouts.template')
@section('title-page')
@section('content')
    <section class="text-gray-600 body-font py-9">
        <div class="font-sans max-w-4xl max-md:max-w-xl mx-auto p-8">
            <h1 class="text-2xl font-extrabold text-gray-800">Your Cart</h1>
            <div class="grid md:grid-cols-3 gap-4 mt-8">
                <div class="md:col-span-2 space-y-4">

                    @if ($cartItems->Count() != 0)

                        @foreach ($cartItems as $item)
                            <div
                                class="flex gap-4 bg-white px-4 py-6 rounded-md shadow-[0_2px_12px_-3px_rgba(6,81,237,0.3)]">
                                <div class="flex gap-4">
                                    <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0">
                                        <img src='{{ asset('storage/' . $item->model->media->path) }}'
                                            class="w-full h-full object-contain" />
                                    </div>

                                    <div class="flex flex-col gap-4">
                                        <div>
                                            <h3 class="text-base font-bold text-gray-800">{{ $item->model->product_name }}
                                            </h3>
                                            <p class="text-sm font-semibold text-gray-500 mt-2 flex items-center gap-2">
                                                Color:
                                                <span class="inline-block w-5 h-5 rounded-md bg-[#000]"></span>
                                            </p>
                                        </div>

                                        <div x-data="{ qty: {{ $item->qty }}, rowId: '{{ $item->rowId }}' }" class="mt-auto flex items-center gap-3">
                                            <!-- Botón para disminuir cantidad -->
                                            <button type="button"
                                                @click="qty > 1 ? qty-- : qty = 1; $nextTick(() => { $refs.updateCartQty.submit(); })"
                                                class="flex items-center justify-center w-5 h-5 bg-gray-400 outline-none rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-2 fill-white"
                                                    viewBox="0 0 124 124">
                                                    <path
                                                        d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                                        data-original="#000000"></path>
                                                </svg>
                                            </button>

                                            <!-- Mostrar cantidad -->
                                            <span class="font-bold text-sm leading-[18px]" x-text="qty"></span>

                                            <!-- Botón para aumentar cantidad -->
                                            <button type="button"
                                                @click="qty++; $nextTick(() => { $refs.updateCartQty.submit(); })"
                                                class="flex items-center justify-center w-5 h-5 bg-gray-400 outline-none rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-2 fill-white"
                                                    viewBox="0 0 42 42">
                                                    <path
                                                        d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                                        data-original="#000000"></path>
                                                </svg>
                                            </button>

                                            <!-- Formulario para actualizar la cantidad -->
                                            <form action="{{ route('cart.update') }}" method="POST" x-ref="updateCartQty">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="rowId" :value="rowId">
                                                <input type="hidden" name="quantity" :value="qty">
                                            </form>
                                        </div>





                                    </div>
                                </div>

                                <div class="ml-auto flex flex-col">
                                    <div class="flex items-start gap-4 justify-end">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            class="w-4 cursor-pointer fill-gray-400 inline-block" viewBox="0 0 64 64">
                                                                                            <path
                                                                                                d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                                                                                                data-original="#000000"></path>
                                                                                        </svg>-->
                                        <a href="javascript:void(0)" @click="removeItemFromCart('{{ $item->rowId }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 cursor-pointer fill-gray-400 inline-block" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                    data-original="#000000"></path>
                                                <path
                                                    d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                    data-original="#000000"></path>
                                            </svg>
                                        </a>

                                    </div>
                                    <h3 class="text-base font-bold text-gray-800 mt-auto">${{ $item->price }}</h3>
                                </div>
                            </div>
                        @endforeach



                </div>

                <div class="bg-white rounded-md px-4 py-6 h-max shadow-[0_2px_12px_-3px_rgba(6,81,237,0.3)]">
                    <ul class="text-gray-800 space-y-4">
                        <li class="flex flex-wrap gap-4 text-sm">Subtotal <span
                                class="ml-auto font-bold">{{ Cart::instance('cart')->subtotal() }} </span></li>
                        <!-- <li class="flex flex-wrap gap-4 text-sm">Shipping <span class="ml-auto font-bold">$2.00</span></li> -->
                        <li class="flex flex-wrap gap-4 text-sm">Tax <span
                                class="ml-auto font-bold">${{ Cart::instance('cart')->tax() }}</span></li>
                        <hr class="border-gray-300" />
                        <li class="flex flex-wrap gap-4 text-sm font-bold">Total <span
                                class="ml-auto">${{ Cart::instance('cart')->total() }} </span></li>
                    </ul>

                    <div class="mt-8 space-y-2">
                        <button type="button" id="buyNowButton"
                            class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-gray-800 hover:bg-gray-900 text-white rounded-md">Buy
                            Now</button>
                        <button type="button"
                            class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent hover:bg-gray-100 text-gray-800 border border-gray-300 rounded-md">Continue
                            Shopping </button>
                    </div>

                    <div class="mt-4 flex flex-wrap justify-center gap-4">
                        <img src='https://readymadeui.com/images/master.webp' alt="card1" class="w-10 object-contain" />
                        <img src='https://readymadeui.com/images/visa.webp' alt="card2" class="w-10 object-contain" />
                        <img src='https://readymadeui.com/images/american-express.webp' alt="card3"
                            class="w-10 object-contain" />
                    </div>
                </div>
            @else
                <div class="font-sans max-w-full mx-auto p-8 text-center">
                    <h1 class="text-2xl font-extrabold text-gray-800 p-8">No hay compras</h1>
                </div>
                @endif

                <a type="button" href="{{ route('Catalogo') }}"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                    @if ($cartItems->Count() != 0)
                        seguir comprando
                    @else
                        comprar
                    @endif
                </a>

            </div>
        </div>
        <div id="paymentBrick_container"></div>
        <form action="{{ route('cart.remove') }}" id="deleteFromCart" method="POST">
            @csrf
            @method('delete')
            <input type="hidden" id="rowId" name="rowId">
        </form>


        <form action="{{ route('cart.clear') }}" id="clearCart" method="post">
            @csrf
            @method('delete')
        </form>
    </section>


@endsection

@push('scripts')
    <script>
        function updateCartQty() {
            document.getElementById('rowId').value = document.querySelector('[x-data]').__x.$data.rowId;
            document.getElementById('quantity').value = document.querySelector('[x-data]').__x.$data.qty;

            document.getElementById('updateCartQty').submit();
        }

        function removeItemFromCart(rowId) {
            document.getElementById('rowId').value = rowId;
            document.getElementById('deleteFromCart').submit();
        }


        function clearCart() {
            document.getElementById('clearCart').submit();
        }


        document.getElementById('buyNowButton').addEventListener('click', function() {

            const mp = new MercadoPago('APP_USR-6dfb6a65-b84b-4b1d-855a-91b61d37cadf');
            const bricksBuilder = mp.bricks();

            if (!bricksBuilder) {
                console.error("Error al inicializar MercadoPago Bricks");
                return;
            } else {
                console.error("iniciacion correcta")
            }

            // Función para renderizar el Brick de pago
            const renderPaymentBrick = async (bricksBuilder) => {
                const settings = {
                    initialization: {
                        /*
                         "amount" es el monto total a pagar por todos los medios de pago con excepción de la Cuenta de Mercado Pago y Cuotas sin tarjeta de crédito, las cuales tienen su valor de procesamiento determinado en el backend a través del "preferenceId"
                        */
                        amount: 100,
                        preferenceId: "<PREFERENCE_ID>",
                    },
                    customization: {
                        paymentMethods: {
                            ticket: "all",
                            creditCard: "all",
                            debitCard: "all",
                            mercadoPago: "all",
                        },
                    },
                    callbacks: {
                        onReady: () => {
                            /*
                             Callback llamado cuando el Brick está listo.
                             Aquí puede ocultar cargamentos de su sitio, por ejemplo.
                            */
                        },
                        onSubmit: ({
                            selectedPaymentMethod,
                            formData
                        }) => {
                            // callback llamado al hacer clic en el botón enviar datos
                            return new Promise((resolve, reject) => {
                                fetch("/process_payment", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                        },
                                        body: JSON.stringify(formData),
                                    })
                                    .then((response) => response.json())
                                    .then((response) => {
                                        // recibir el resultado del pago
                                        resolve();
                                    })
                                    .catch((error) => {
                                        // manejar la respuesta de error al intentar crear el pago
                                        reject();
                                    });
                            });
                        },
                        onError: (error) => {
                            // callback llamado para todos los casos de error de Brick
                            console.error(error);
                        },
                    },
                };
                window.paymentBrickController = await bricksBuilder.create(
                    "payment",
                    "paymentBrick_container",
                    settings
                );

                window.paymentBrickController = await bricksBuilder.create(
                    "payment",
                    "paymentBrick_container",
                    settings
                );
            };
            renderPaymentBrick(bricksBuilder);

        });


        // Inicialización de Mercado Pago
    </script>
@endpush
