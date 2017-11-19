<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         if(\Session::get('usuario')) {
 
            $programas = \App\Models\Programa::orderBy('programs_restricted', 'desc')->get();

            return view('programa.index', compact('programas'));
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

            return view('programa.create', compact('estados'));
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
            // $data = array('programs_restricted'=>$request->usuario,
            //                'enable'=>$request->estado);
            $this->validate($request, [
                'programs_restricted' => 'required|min:3|unique:programs_restricted,programs_restricted',                
                'enable' =>'required'
            ]);
            
            
            \App\Models\Programa::create($request->all());
             
            $programa = \App\Models\Programa::findOrFail($request->programs_restricted);
            
            \Session::flash('message', trans('ui.programa.message_create', array('programa' => $programa->programs_restricted)));

            return redirect('programa/create');
        }

        return redirect('auth/logout');
    }

   public function show()
    {
        if(\Session::get('usuario')) {
            $data=array();
             $a = \App\Models\Programa::all();            
             foreach ($a as $row) {
                 $estado = $row->enable ===1 ? 'Habilitado' : 'Inhabilitado';
           
                 array_push($data , array($row->programs_restricted , $estado)); 
             }         
            
            $pdf = \PDF::loadView('programa.pdf', compact('data'));
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

            $programa = \App\Models\Programa::findOrFail($id);

            $estados =  array(''=>'','1' => 'Habilitado' , 0 => 'Inhabilitado');

            

            return view('programa.edit', compact('programa', 'estados'));
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
                'programs_restricted' => 'required|min:3|unique:programs_restricted,programs_restricted,'.$id.',programs_restricted',                
                'enable' =>'required'
            ]);

            $programa = \App\Models\Programa::findOrFail($id);

            $programa->update($request->all());

          
            \Session::flash('message', trans('ui.programa.message_update', array('programa' => $programa->programs_restricted)));

            return redirect('programa');
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

            $programa = \App\Models\Programa::findOrFail($id);

            \App\Models\Programa::destroy($id);

            \Session::flash('message', trans('ui.programa.message_delete', array('programa' => $programa->programs_restricted)));

            return redirect('programa');
        }

        return redirect('auth/logout');
    }

    
    
    
}
