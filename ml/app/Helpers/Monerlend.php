<?php
//app/Helpers/Envato/User.php
namespace App\Helpers;

use DateTime;
use Illuminate\Support\Facades\DB;

 
class Monerlend {


    public static function contadorMRL($user)
    {
       return (new DateTime("now"))->diff(new DateTime($user->mrl_counter))->days;
       
    }

    public static function puedeRetirarMRL($user)
    {

       if (Monerlend::contadorMRL($user) >= 90 && $user->get_role) {
            return true;
       } else {
           return false;
       }
       
       
    }

    public static function validarRol($order){
 
        $depositosHechos = DB::table('transacciones')->select('transacciones.id')
                        ->join('orders', function ($join){
                            $join->on('transacciones.order_id', '=', $order.id);
                        })
                        ->where('transacciones.type', '=', 'ahorro')
                        ->where('orders.status', '=', 'paid')
                        ->count();

         

        $pagoHechos = DB::table('transacciones')->select('transacciones.id')
                        ->join('orders', function ($join){
                            $join->on('transacciones.order_id', '=', $order.id);
                        })
                        ->where('transacciones.type', '=', 'pago')
                        ->where('orders.status', '=', 'paid')
                        ->count();   
                        
            if ($depositosHechos = 1){
                actualizarRol($order.user>id, 'C+');
            }else if($pagoHechos = 1 /*&& pagocreditoincompleto */){
                actualizarRol('B');
            }
            else if (true /*&& $pagoCredito = 1 */){
                actualizarRol('B+');   
                //RegisterController::token_mrl( $order.user_id , '', 100);
            }
            else if (true /*&& $pagoCredito = 2 */){
                actualizarRol('A');   
                //RegisterController::token_mrl( $order.user_id , '', 200);
            }
            else if (true /*&& $pagoCredito = 3 */){
                actualizarRol('A+');   
                //RegisterController::token_mrl( $order.user_id , '', 500);
            }                        

    }

    public static function actualizarRol($rol)
    {

       switch ($rol) {
               case 'C+':
                # code...
                break;
 
               case 'B+':
               # code...
               break;
               
               case 'B':
               # code...
               break;   
               
               case 'A':
               # code...
               break;

               case 'A+':
               # code...
               break;

               case 'D':
               # code...
               break;               
               case 'D-':
               # code...
               break;

           default:
               # code...
               break;
       }
       
    }

    public static function saldoActual($user)
    {
        $ahorros = DB::table('transacciones')->select('transacciones.amount')
                        ->where('transacciones.type', '=', 'ahorro')
                        ->where('transacciones.user_id', $user)
                        ->sum('transacciones.amount');
        $prestamos = DB::table('transacciones')->select('transacciones.amount')
                        ->where('transacciones.type', '=', 'prestamo')
                        ->where('transacciones.user_id', $user)
                        ->sum('transacciones.amount');
                        

        return $ahorros + $prestamos;
                        
    }

}