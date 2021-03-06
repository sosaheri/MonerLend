<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamos;
use DB;
use App\Transacciones;
use Auth;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function prestamos(Request $request)
    {

        $currency = "USD";
        $id = auth()->id();

        $Ordentransaccion = Transacciones::create([

            'user_id'    => $id,
            'order_id'   => 0,
            'type'       => 'prestamo',
            'amount'     => request('amount') * -1,
            'currency'   => $currency,
       ]);

        $Ordenprestamo = Prestamos::create([
                      
            'user_id'   => $id,
            'monto'     => request('amount'),
            'motivo'    => 'Prestamo simple partiendo de mis ahorros',
            'financiante'    => $id,
            'montoFinanciado' => 0,
     
        ]);



        return redirect()->back()->with('message1', 'Su solictud ha sido creada exitosamente, debe esperar un lapso de 24h para que sea acreditado el prestamo.');
   


    }


    public function financiamiento(Request $request)
    {
        $Ordenfinanciamiento = Prestamos::create([
          
            'user_id'   => auth()->id(),
            'monto'     => request('montoFinanciamiento'),
            'motivo'    => request('motivoFinanciamiento'),
     
        ]);


         

        return redirect()->back()->with('message', 'Su solictud ha sido creada exitosamente, será notificado cuando la comunidad lo avale.');
    }    

    public function listadoFinanciamiento(Request $request)
    {
        $financiamientos = DB::table('users')->select('users.name', 'users.avatar', 'users.id as user_id' ,'roles.name as role', 'prestamos.monto', 'prestamos.motivo', 'prestamos.created_at as fecha')
                        ->join('model_has_roles', function ($join){
                            $join->on('users.id', '=', 'model_has_roles.model_id');
                        })
                        ->join('roles', function ($join){
                            $join->on('model_has_roles.role_id', '=', 'roles.id');
                        })
                        ->join('prestamos', function ($join){
                            $join->on('prestamos.user_id', '=', 'users.id');
                        })                        
                        ->where('prestamos.financiante', '=', NULL)
                        ->get();                        

                        return view('listaPorFinanciar',compact('financiamientos'));
    }  

    public function financiar(Request $request, $id)
    {

          
        $userFinanciar = DB::table('users')->select('users.name', 'users.avatar' ,'roles.name as role', 'prestamos.monto', 'prestamos.motivo', 'prestamos.created_at as fecha')
        ->join('model_has_roles', function ($join){
            $join->on('users.id', '=', 'model_has_roles.model_id');
        })
        ->join('roles', function ($join){
            $join->on('model_has_roles.role_id', '=', 'roles.id');
        })
        ->join('prestamos', function ($join){
            $join->on('prestamos.user_id', '=', 'users.id');
        })                        
        ->where('users.id', '!=', $id)
        ->get();  
  

        return view('transacciones.financiar',compact('userFinanciar'));
    }


}
