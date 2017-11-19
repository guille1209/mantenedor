<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         if(\Session::get('usuario')) {
 
            $clientes = \App\Models\Cliente::orderBy('user_restricted', 'desc')->get();

            return view('cliente.index', compact('clientes'));
        }

        return redirect('auth/logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Session::get('usuario')) {

           $estados =  array(''=>'','1' => 'Habilitado' , 0 => 'Inhabilitado');

            return view('cliente.create', compact('estados'));
        }

        return redirect('auth/logout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Session::get('usuario')) {
            // $data = array('user_restricted'=>$request->usuario,
            //                'enable'=>$request->estado);
            $this->validate($request, [
                'user_restricted' => 'required|min:3|unique:user_restricted,user_restricted',                
                'enable' =>'required'
            ]);
            
            
            \App\Models\Cliente::create($request->all());
             
            $cliente = \App\Models\Cliente::findOrFail($request->user_restricted);
            
            \Session::flash('message', trans('ui.cliente.message_create', array('usuario' => $cliente->user_restricted)));

            return redirect('cliente/create');
        }

        return redirect('auth/logout');
    }

   public function show()
    {
        if(\Session::get('usuario')) {
            $data=array();
             $a = \App\Models\Cliente::all();            
             foreach ($a as $row) {
                 $estado = $row->enable ===1 ? 'Habilitado' : 'Inhabilitado';
           
                 array_push($data , array($row->user_restricted , $estado)); 
             }         
            
            $pdf = \PDF::loadView('cliente.pdf', compact('data'));
            return $pdf->stream();
        }

        return redirect('auth/logout');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Session::get('usuario')) {

            $cliente = \App\Models\Cliente::findOrFail($id);

            $estados =  array(''=>'','1' => 'Habilitado' , 0 => 'Inhabilitado');

            

            return view('cliente.edit', compact('cliente', 'estados'));
        }

        return redirect('auth/logout');
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
         if(\Session::get('usuario')) {

            $this->validate($request, [
                'user_restricted' => 'required|min:3|unique:user_restricted,user_restricted,'.$id.',user_restricted',                
                'enable' =>'required'
            ]);

            $cliente = \App\Models\Cliente::findOrFail($id);

            $cliente->update($request->all());

          
            \Session::flash('message', trans('ui.cliente.message_update', array('usuario' => $cliente->user_restricted)));

            return redirect('cliente');
        }

             return redirect('auth/logout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Session::get('usuario')) {

            $cliente = \App\Models\Cliente::findOrFail($id);

            \App\Models\Cliente::destroy($id);

            \Session::flash('message', trans('ui.cliente.message_delete', array('usuario' => $cliente->user_restricted)));

            return redirect('cliente');
        }

        return redirect('auth/logout');
    }

    
    
    
}
