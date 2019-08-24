<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Transacciones;


class EstadisticasController extends Controller
{

    public function registrados(Request $request)
    {
        $registrados = User::orderBy('id','DESC')->paginate(10);
        return view('estadisticas.estUsuariosRegistrados',compact('registrados'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function ranking(Request $request)
    {
        $ranking = DB::table('users')->select('users.name','roles.name as role')
                    ->join('model_has_roles', function ($join){
                        $join->on('users.id', '=', 'model_has_roles.model_id');
                    })
                    ->join('roles', function ($join){
                        $join->on('model_has_roles.role_id', '=', 'roles.id');
                    })->where('roles.name', '!=', 'Administrador')->where('roles.name', '!=', 'Operador')->orderBy('roles.id', 'desc')
                    ->get();

        
        
        
        return view('estadisticas.UsuariosRanking',compact('ranking'));
    }

    public function transacciones(Request $request)
    {

        

        $transacciones = DB::table('users')->select('users.name', 'transacciones.type' ,'orders.amount', 'transacciones.currency', 'orders.created_at')
                        ->join('orders', function ($join){
                            $join->on('users.id', '=', 'orders.user_id');
                        })
                        ->join('transacciones', function ($join){
                            $join->on('orders.id', '=', 'transacciones.order_id');
                        })->get();
                        //->where('roles.name', '!=', 'Administrador')->where('roles.name', '!=', 'Operador')->orderBy('roles.id', 'desc')
                        
       // $transacciones = Transacciones::all()->paginate(10);

        return view('estadisticas.UsuariosTransacciones',compact('transacciones'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function ultimosDepositos(Request $request)
    {

        

        $ultDepositos = DB::table('users')->select('users.name', 'transacciones.type' ,'orders.amount', 'transacciones.currency', 'orders.created_at')
                        ->join('orders', function ($join){
                            $join->on('users.id', '=', 'orders.user_id');
                        })
                        ->join('transacciones', function ($join){
                            $join->on('orders.id', '=', 'transacciones.order_id');
                        })->where('transacciones.type', '=', 'deposito')->get();
       // $transacciones = Transacciones::all()->paginate(10);

        return view('estadisticas.UltimosDepositos',compact('ultDepositos'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
}