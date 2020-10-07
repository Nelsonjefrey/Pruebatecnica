<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios']=Usuarios::paginate(5);
    return view('Usuarios.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    return view('Usuarios.create');

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
        //$datosUsuarios=request()->all();
        $datosUsuarios=request()->except('_token');

        if($request->hasFile('Foto')){
            $datosUsuarios['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        
        Usuarios::insert($datosUsuarios);

        return redirect('usuarios')->with('mensaje', 'empleado agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosUsuarios=request()->except(['_token', '_method']);
        if($request->hasFile('Foto')){
            $usuario = Usuarios::findOrFail($id);
            
            Storage::delete('public/'.$usuario->Foto);
            
            $datosUsuarios['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        Usuarios::where('id', '=', $id)->update($datosUsuarios);
        
       // $usuario = Usuarios::findOrFail($id);
       // return view('usuarios.edit', compact('usuario'));
       return redirect('usuarios')->with('mensaje', 'empleado modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($usuario = Usuarios::findOrFail($id) ){     
            Storage::delete('public/'.$usuario->Foto);
        }
        Usuarios::destroy($id);
        
        return redirect('usuarios')->with('mensaje', 'empleado eliminado con exito');
    }
}
