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

       if (Monerlend::contadorMRL($user) >= 90) {
            return true;
       } else {
           return false;
       }
       
       
    }

    public static function asignarRol($rol)
    {
       switch ($rol) {
               case 'B+':
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


}