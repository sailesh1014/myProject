<?php
declare(strict_types = 1);
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
     public function checkout(Request $request) : JsonResponse
     {
          $artist = User::findorFail($request->user_id);
          $charge = $artist->charge_amount;
          $args       = self::setArgs($request->input('token'), $charge * 100);
          $user_id = $request->input('user_id');
          $event_id = $request->input('event_id');
          $url    = "https://khalti.com/api/v2/payment/verify/";
          $header = self::getApiHeader();
          $resp   = Http::acceptJson()->withHeaders($header)->post($url, $args);
          if ($resp->getStatusCode() == 200) {
                   \DB::transaction(function () use ($resp, $artist, $event_id) {
                    $resp_body = collect(json_decode($resp->body()));
                     Payment::create([
                         'user_id'      => $artist->id,
                         'event_id'     => $event_id,
                         'amount'       => $artist->charge_amount,
                         'transaction_id' => $resp_body['idx'],
                    ]);
               });
               return response()->json([
                    'success' => 1,
                    'message' => 'Payment made successfully',
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
