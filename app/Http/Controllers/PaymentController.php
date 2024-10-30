<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;


use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Paso 1: Configura el token de acceso desde el archivo .env
        MercadoPagoConfig::setAccessToken('APP_USR-8934234462909857-102920-af952476c7e96358d3d378fbcde0c8df-1345166995');

        // Paso 2: (Opcional) Configura el entorno de ejecución para pruebas locales
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

        // Paso 3: Inicializa el cliente de pagos
        $client = new PaymentClient();

        try {
            // Paso 4: Crea el arreglo de la solicitud
            $request_data = [
                "transaction_amount" => 100,
                "token" => "YOUR_CARD_TOKEN",  // Obtén el token del front-end
                "description" => "description",
                "installments" => 1,
                "payment_method_id" => "visa",
                "payer" => [
                    "email" => "user@test.com",
                ]
            ];

            // Paso 5: Configura las opciones de la solicitud, incluyendo una clave de idempotencia
            $request_options = new RequestOptions();
            $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);

            // Paso 6: Realiza la solicitud de pago
            $payment = $client->create($request_data, $request_options);

            return response()->json([
                'payment_id' => $payment->id,
                'status' => $payment->status,
            ]);

        // Paso 7: Maneja las excepciones
        } catch (MPApiException $e) {
            return response()->json([
                'status_code' => $e->getApiResponse()->getStatusCode(),
                'content' => $e->getApiResponse()->getContent()
            ], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function processarPago(Request $request)
{
    // Procesa el pago usando los datos enviados desde el frontend
    $data = $request->all();
    // Lógica de procesamiento del pago
    // ...

    return response()->json(['status' => 'success']); // Respuesta al frontend
}

}
