<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         if(\Session::get('usuario')) {
 
            $ips = \App\Models\Ip::orderBy('ip_restricted', 'desc')->get();

            return view('ip.index', compact('ips'));
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

            return view('ip.create', compact('estados'));
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
            // $data = array('ip_restricted '=>$request->usuario,
            //                'enable'=>$request->estado);
            $this->validate($request, [
                'ip_restricted' => 'required|min:3|unique:ips_restricted,ip_restricted',                
                'enable' =>'required'
            ]);
            
            
            \App\Models\Ip::create($request->all());
             
            $ip = \App\Models\Ip::findOrFail($request->ip_restricted );
            
            \Session::flash('message', trans('ui.ip.message_create', array('ip' => $ip->ip_restricted )));

            return redirect('ip/create');
        }

        return redirect('auth/logout');
    }

   public function show()
    {
        if(\Session::get('usuario')) {
            $data=array();
             $a = \App\Models\Ip::all();            
             foreach ($a as $row) {
                 $estado = $row->enable ===1 ? 'Habilitado' : 'Inhabilitado';
           
                 array_push($data , array($row->ip_restricted  , $estado)); 
             }         
            
            $pdf = \PDF::loadView('ip.pdf', compact('data'));
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

            $ip = \App\Models\Ip::findOrFail($id);

            $estados =  array(''=>'','1' => 'Habilitado' , 0 => 'Inhabilitado');

            return view('ip.edit', compact('ip', 'estados'));
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
                'ip_restricted' => 'required|min:3|unique:ips_restricted,ip_restricted,'.$id.',ip_restricted',                
                'enable' =>'required'
            ]);

            $ip = \App\Models\Ip::findOrFail($id);

            $ip->update($request->all());

          
            \Session::flash('message', trans('ui.ip.message_update', array('ip' => $ip->ip_restricted )));

            return redirect('ip');
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

            $ip = \App\Models\Ip::findOrFail($id);

            \App\Models\Ip::destroy($id);

            \Session::flash('message', trans('ui.ip.message_delete', array('ip' => $ip->ip_restricted )));

            return redirect('ip');
        }

        return redirect('auth/logout');
    }
}