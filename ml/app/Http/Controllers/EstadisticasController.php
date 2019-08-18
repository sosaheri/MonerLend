<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;


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


    
}