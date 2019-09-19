<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CoinGate\CoinGate;

use Session;
use DateTime;
use App\User;
use Auth;
use App\Order;
use App\Cart;
use App\Transacciones;
use Monerlend;
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Checkout;
use CoinbaseCommerce\Resources\Charge;
use CoinbaseCommerce\Webhook;
use App\Notifications\AhorrosNotification;
use App\Notifications\AprobarAhorrosNotification;
use App\Notifications\AprobarCuotaAhorro;
use App\Notifications\CuotaAhorro;
use App\Notifications\CuotaAhorroExitosa;

class CartController extends Controller
{

      public function show() {

            if(!Session::has('cart')) {
    
            return view("cart.show");
    
            }
    
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
    
            return view("cart.show", [
    
            'cartitems'    => $cart->items,
            'totalPrice'  => $cart->totalPrice
    
            ]);
    
      }
  
      public function add(Request $request, $id) {
  
        $product = Product::find($id);
  
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
  
        $cart = new Cart($oldCart);
  
        $cart->add($product, $product->id);
  
        $request->session()->put('cart',$cart);
  
        //dd($request->session()->get('cart'));
  
        return redirect("/");
  
      }
  
      public function destroy() {
  
        Session::forget('cart');
  
        return redirect("/");
  
      }
  
      public function getCheckout() {
  
        if(!Session::has('cart')) {
  
        return view("checkout.checkout");
  
        }
  
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
  
        return view ('checkout.checkout', ['total' => $total]);
  
      }
  
      public function CoinGate() {

        //your app_id
        $app_id = "4839";
        //currency you want to pay
        $currency = "USD";
        //currency you want to receive
        $receive_currency = "USD";
        //randomly generated token to secure the form
        $token = hash('md5', 'coingate'.rand());
  
        $coingate_invoice_id = 'coingate'.rand();
  
            $o = Order::create([
          
                'user_id'   => auth()->id(),
                'coingate_invoice_id' => $coingate_invoice_id,
                'token' => $token,
                'amount' => request('monto'),
                'status' => 'send'
          
            ]);
  

            $transaccion = Transacciones::create([

              'user_id'    => $o->user_id,
              'order_id'   => $o->id,
              'type'       => 'saldo',
              'amount'     => request('monto'),
              'currency'   => $currency,
        
            ]);
      
        //Post parameters , which are send to CoinGate
  
            $post_params = array(
                'order_id'          =>  $o->id,
                'price_amount'      =>  request('monto'),           
                'price_currency'          =>  $currency,           
                'receive_currency'  =>  $receive_currency,            
                'token'             =>  $token,            
                'callback_url'      =>  url('/') . '/cart/callback?token='.$token,
              //'callback_url'      => 'http://demo1.coingate.com/cart/callback?token='.$token,
                'cancel_url'        =>  url('/') . '/cart',
              //'cancel_url'        => 'http://demo1.coingate.com/cart',
                'success_url'       =>  url('/') . '/myorders',
              //'success_url'       => 'http://demo1.coingate.com/myorders',
            );
  
            //Package -> coingate-php
        
              $order = \CoinGate\Merchant\Order::create($post_params, array(), array(
                'environment' => 'sandbox', // sandbox OR live
                'auth_token' => '9KY1airWZzXuBcsmdh3YJnKvztykP8SYh2bwAhYr'));
        
              //Session::forget('cart');
        
              if ($order) {
                  echo $order->status;
                  
                  return redirect($order->payment_url);
              } else {
                  print_r($order);
              }
  
             
              
      }
  
      public function ahorrar($amount, $months, $ui, $or, $type, $currency, $u, $time){
        

        $ahorrosHechos = DB::table('transacciones')->select('transacciones.id')
                      ->where('transacciones.type', '=', 'ahorro')
                      ->where('transacciones.user_id', $ui)
                      ->count();

        $fechaUltimaTransaccion = DB::table('transacciones')->select('transacciones.created_at')
                      ->where('transacciones.type', '=', 'ahorro')
                      ->where('transacciones.user_id', $ui)
                      ->orderBy('transacciones.created_at', 'desc')->first();
                                                 


        $diasParaNuevoDeposito = (new DateTime($fechaUltimaTransaccion->created_at))->diff(new DateTime('now') )->days; 

        if ($ahorrosHechos > 1 && $diasParaNuevoDeposito > 10){
 
                $element = User::find((array)$ui);
                $user = $element[0];
        
                $fechaActual = new DateTime('now');
                $fechaSolicitud = $fechaActual->format("d-M-Y H:i");
                $tiempoDeSolicitud = (new DateTime($time))->diff(new DateTime('now'))->format("%i");
        
                if ($tiempoDeSolicitud < 15){
                          $Ordentransaccion = Transacciones::create([
        
                            'user_id'    => $ui,
                            'order_id'   => $or,
                            'type'       => $type,
                            'amount'     => $amount,
                            'currency'   => $currency,
                      ]);
        
                        $user->notify(new AhorrosNotification());
                      
                        return redirect()->back()->with('ahorro', 'Su solicitud ha sido creada exitosamente.');
                }else{
                        return redirect()->back()->with('ahorroE', 'Su solicitud no fue procesada ya que transcurrieron mas de 15 minutos, intente nuevamente.');
                }

                                       
        }else{
                return redirect()->back()->with('ahorroE2', 'Su solicitud no fue procesada ya que no han transcurrido mas de 10 días de su ultimo ahorro.');     
        }                      
        

        
        

       
       
   

      }

      public function aprobarAhorrar(Request $request){
        
        
        $currency = "USD";
        $id = auth()->id();
        $element = User::find((array)$id);
        $user = $element[0];
        $fecha = new DateTime('now');
        $time = $fecha->format("d-M-Y H:i");

        $aprobacion = [
            'amount'     => request('amount'),
            'months'  => request('month'),
            'user_id'    => $id,
            'order_id'   => 0,
            'type'       => 'ahorro',           
            'currency'   => $currency,       
            'user'       => $user,
            'time'       => $time,     

        ];

        $user->notify(new AprobarAhorrosNotification($aprobacion));
       
        return redirect()->back()->with('ahorro', 'Por favor ingrese en su correo y confirme la transacción.');
       
   

      }

      public function cuotaAhorro(){
        $id = Auth::id();

        $cuotas = DB::table('cuotas_ahorros')->select( 'cuotas_ahorros.id', 'cuotas_ahorros.cantidad', 'cuotas_ahorros.cuotas_pagadas','cuotas_ahorros.meses')
                  ->join('transacciones', function ($join){
                      $join->on('transacciones.id', '=', 'cuotas_ahorros.transacciones_id');
                  })
                  ->join('users', function ($join) use($id){
                      $join->on('users.id', '=', 'transacciones.user_id');
                  })->where('users.id',$id )
                  ->where('cuotas_ahorros.status','!=', '1')
                  ->get();

                  return view('transacciones.depositos',compact('cuotas'));

      }

      public function pagarCuota($cuota_id){
        
        $id = Auth::id();

        $cuotas = DB::table('cuotas_ahorros')->select( 'cuotas_ahorros.id', 'cuotas_ahorros.status', 'cuotas_ahorros.cantidad', 'cuotas_ahorros.meses', 'cuotas_ahorros.cuotas_pagadas','cuotas_ahorros.meses')
                  ->join('transacciones', function ($join){
                      $join->on('transacciones.id', '=', 'cuotas_ahorros.transacciones_id');
                  })
                  ->join('users', function ($join) use($id){
                      $join->on('users.id', '=', 'transacciones.user_id');
                  })->where('users.id',$id )->where('cuotas_ahorros.id', $cuota_id)

                  ->get();
                  
                  return view('transacciones.pagarCuota',compact('cuotas'));

      }

      public function saldarCuota($id, $mesesaPagar, $montodePago, $cuotadePago){
        $idu = auth()->id();
        $element = User::find((array)$idu);
        $user = $element[0]; 
              
         

        if ($cuotadePago == $mesesaPagar ){

            DB::table('cuotas_ahorros')
            ->where('id', $id)
            ->update
            (['status' => "1",
              'cuotas_pagadas' => $cuotadePago,            
            ]);

            $user->notify(new CuotaAhorroExitosa());

            return redirect()->back()->with('cuota', 'Ha realizado el pago de su ultima cuota exitosamente.');
        }else{

          DB::table('cuotas_ahorros')
            ->where('id', $id)
            ->update
            ([
              'cuotas_pagadas' => $cuotadePago,            
            ]);

            $user->notify(new CuotaAhorro());
            return redirect()->back()->with('cuota', 'Ha realizado el pago de su cuota exitosamente.');

        }

        DB::table('cuotas_ahorros')
            ->where('id', request('cuota_id'))
            ->update
            (['title' => "Updated Title"],
          
            );

            return redirect()->back()->with('depositos', 'Ha realizado el pago de su cuota exitosamente.');

      }

      public function saldarCuotaApro($id, $mesesaPagar, $montodePago, $cuotadePago){
        $idu = auth()->id();
        $element = User::find((array)$idu);
        $user = $element[0];
       
        $aprobacion = [
          'id'     => $id,
          'mesesaPagar'  => $mesesaPagar,
          'montodePago'   => $montodePago,
          'cuotadePago'       => $cuotadePago,           

         ];

      
         $user->notify(new AprobarCuotaAhorro($aprobacion));
     
     
         return redirect()->back()->with('cuota', 'Por favor ingrese en su correo y confirme la transacción.');
     
         

        

       

      }

      public function callback(Request $request) {
                
                $order = Order::find($request->input('order_id'));

                
                
                if ($request->input('token') == $order->token) {
        
                    $status = NULL;
        
                    if ($request->input('status') == 'paid') {
        
                        if ($request->input('price') >= $order->total_price) {
            
                            $status = 'paid';
            
                        }
        
                    }      
                    else {
        
                    $status = $request->input('status');
        
                    }
        
                    if (!is_null($status)) {
        
                    $order->update(['status' => $status]);
        
                    }
        
                }

                
  
      }
  

      public function myOrders() {
  
          $user_id = auth()->id();
  
          $myOrders = Order::get()->where('user_id',$user_id);
  
          return view('transacciones.myorders',compact('myOrders'));
  
      }

      public function CoinBase(){
         
        ApiClient::init(env('API_COINBASE_EC', 'get-api'));

       
        // creamos una orden de pago a monerlen
        $checkoutObj = new Checkout([
          "description" => 'prueba de descripcion',//request('descripcion'),
          "name" => "Abono de Saldo",
          "pricing_type" => "no_price",
          "requested_info" => ["email"]
        ]);

          // try {
          //     $checkoutObj->save();
              
          //     echo sprintf("Successfully created new checkout with id: %s \n", $checkoutObj->id);
          // } catch (\Exception $exception) {
          //     echo sprintf("Enable to create checkout. Error: %s \n", $exception->getMessage());
          // }

          // obtenemos el id de la transaccion en $checkoutObj->id; para enviarlo a ordenes e invocar charges
          
          // aqui deberia crear la orden con la informacion que traemos

          //empezamos a crear el charges para coinbase

        $chargeObj = new Charge(
        [
            "description" => "Mastering the Transition to the Information Age",
            "metadata" => [
                "customer_id" => "id_1005",
                "customer_name" => "Satoshi Nakamoto"
            ],
            "name" => "Test Name",
            "payments" => [],
            "pricing_type" => "no_price"
        ]);
              try {
                  $chargeObj->save();
                 // echo sprintf("Successfully created new charge with id: %s \n", $chargeObj->id);
              } catch (\Exception $exception) {
                //  echo sprintf("Enable to create charge. Error: %s \n", $exception->getMessage());
              }

              $chargeObj = Charge::retrieve('c2fa8dd0-b2f0-4649-a78e-a0eaf3dfb679');

              // con el id del charge y la propiedad   $chargeObj->hosted_url tenemos a donde redirigir para el pago
              //echo $chargeObj;

              //debemos cargar la pagina de pago en otra pesta'a
              //y hacer que el checkout muestre las indicaciones de pago incluyendo el enlace de pago



      }

      public function callbackCB(Request $request) {

        try {
          Webhook::verifySignature($signature, $body, $sharedSecret);
          echo 'Successfully verified';
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            echo 'Failed';
        }

        $secret = '6352ebb0-7385-4cb6-bd79-3d6820de490e';
        $headerName = 'X-Cc-Webhook-Signature';
        $headers = getallheaders();
        $signraturHeader = isset($headers[$headerName]) ? $headers[$headerName] : null;
        $payload = trim(file_get_contents('php://input'));
        try {
            $event = Webhook::buildEvent($payload, $signraturHeader, $secret);
            http_response_code(200);
            echo sprintf('Successully verified event with id %s and type %s.', $event->id, $event->type);
        } catch (\Exception $exception) {
            http_response_code(400);
            echo 'Error occured. ' . $exception->getMessage();
        }

      }

}
