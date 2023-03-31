<?php
declare(strict_types = 1);
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
     public function checkout(Request $request) : JsonResponse
     {
          $args       = self::setArgs($request->input('token'), 10 * 100);
          $user_id = $request->input('user_id');
          $event_id = $request->input('event_id');
          $url    = "https://khalti.com/api/v2/payment/verify/";
          $header = self::getApiHeader();
          $resp   = Http::acceptJson()->withHeaders($header)->post($url, $args);
          if ($resp->getStatusCode() == 200) {
               $booking   = \DB::transaction(function () use ($resp, $user_id, $event_id) {
                    $resp_body = collect(json_decode($resp->body()));
                     Payment::create([
                         'user_id'      => $user_id,
                         'event_id'     => $event_id,
                         'amount'       => 10,
                         'transaction_id' => $resp_body['idx'],
                    ]);
               });
               return response()->json([
                    'success' => 1,
                    'message' => 'Booking Added Successfully',
               ], 200);
          } else {
               return response()->json([
                    'error'   => 1,
                    'message' => 'Failed',
                    'code'    => 500
               ]);
          }
     }

     public function setArgs($token, $amount)
     {
          return [
               'token'  => $token,
               'amount' => $amount,
          ];
     }

     public function getApiHeader(): array
     {
          return [
               'Authorization' => 'Key ' . config('services.khalti.private_key'),
          ];
     }
}
