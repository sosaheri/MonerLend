<?php
//app/Helpers/Envato/User.php
namespace App\Helpers;

use DateTime;
use Illuminate\Support\Facades\DB;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

 
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
                        ->join('orders', function ($join)  use($order) {
                            $join->on('transacciones.order_id', '=', 'orders.id');
                        })
                        ->where('transacciones.type', '=', 'ahorro')
                        ->where('orders.status', '=', 'paid')
                        ->where('orders.id', $order->id)
                        ->count();

                        

        $pagoHechos = DB::table('transacciones')->select('transacciones.id')
                        ->join('orders', function ($join)  use($order) {
                            $join->on('transacciones.order_id', '=', 'orders.id');
                        })
                        ->where('transacciones.type', '=', 'pago')
                        ->where('orders.status', '=', 'paid')
                        ->where('orders.id', $order->id)
                        ->count();   
                        
                        
            if ($depositosHechos = 1){
                Monerlend::actualizarRol($order->order_id, 'C+');
            }else if($pagoHechos = 1 /*&& pagocreditoincompleto */){
                Monerlend::actualizarRol($order->order_id,'B');
            }
            else if (true /*&& $pagoCredito = 1 */){
                Monerlend::actualizarRol($order->order_id,'B+');   
                //RegisterController::token_mrl( $order.user_id , '', 100);
            }
            else if (true /*&& $pagoCredito = 2 */){
                Monerlend::actualizarRol($order->order_id,'A');   
                //RegisterController::token_mrl( $order.user_id , '', 200);
            }
            else if (true /*&& $pagoCredito = 3 */){
                Monerlend::actualizarRol($order->order_id,'A+');   
                //RegisterController::token_mrl( $order.user_id , '', 500);
            }                        

    }

    public static function actualizarRol($order, $rol)
    {

       $id = DB::table('orders')->select('user_id')
        ->where('orders.id', $order)->first();

         $element = User::find((array)$id);
         $user = $element[0];
         
         
                
               

       switch ($rol) {
               case 'C+':
               $user->removeRole('C');
               $user->assignRole('C+');
                break;
 
               case 'B+':
               $user->removeRole('C+');
               $user->assignRole('B+');
               break;
               
               case 'B':
               $user->removeRole('B+');
               $user->assignRole('B');
               break;   
               
               case 'A':
               $user->removeRole('B');
               $user->assignRole('A');
               break;

               case 'A+':
               $user->removeRole('A');
               $user->assignRole('A+');
               break;

               case 'D':
               $user->removeRole('A+');
               $user->assignRole('D');
               break;               

               case 'D-':
               $user->removeRole('D');
               $user->assignRole('D-');
               break;

           default:
           $user->assignRole('C');
               break;
       }
       
    }

    public static function saldoActual($user)
    {
        $ahorros = DB::table('transacciones')->select('transacciones.amount')
                        ->where('transacciones.type', '=', 'saldo')
                        ->where('transacciones.user_id', $user)
                        ->sum('transacciones.amount');
        $prestamos = DB::table('transacciones')->select('transacciones.amount')
                        ->where('transacciones.type', '=', 'prestamo')
                        ->where('transacciones.user_id', $user)
                        ->sum('transacciones.amount');
                        

        return $ahorros + $prestamos;
                        
    }

}