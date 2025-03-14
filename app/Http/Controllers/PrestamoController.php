<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prestamos = Prestamo::orderBy('id', 'desc')->paginate(10);
        return view('prestamos.index', compact('prestamos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventario = Inventario::orderBy('fecha_modificacion')->get();
        return view('prestamos.create', compact('inventario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required',
            'id_inventario' => 'required',
            'fecha_prevista_devolucion' => 'required',
            'importe_fianza' => 'required',
            'concepto_fianza' => 'required',
            'observaciones' => 'required',
        ],[
            'id_usuario.required'=>'Es obligatorio el id del usuario',
            'id_inventario.required'=>'Es obligatorio el id del inventario',
            'fecha_prevista_devolucion.required'=>'Es obligatorio la fecha prevista de devolucion',
            'importe_fianza.required'=>'Es obligatorio el importe de la fianza',
            'concepto_fianza.required'=>'Es obligatorio el concepto de la fianza',
            'observaciones.required'=>'Es obligatorio las observaciones'
        ]);

        try{
            $prestamo = new Prestamo();
            $prestamo->id_usuario = $request->id_usuario;
            $prestamo->id_inventario = $request->id_inventario;
            $date = new \DateTime($request->fecha_prevista_devolucion);
            $prestamo->fecha_prevista_devolucion = $date->getTimestamp();
            $prestamo->importe_fianza = $request->importe_fianza;
            $prestamo->concepto_fianza = $request->concepto_fianza;
            $prestamo->observaciones = $request->observaciones;
            $prestamo->fecha_creacion = now()->getTimestamp();
            $prestamo->fecha_modificacion = now()->getTimestamp();
            $prestamo->save();
            $this->Log("Ha solicitado un préstamo de ".$prestamo->inventario->nombre);

            return back()->with('mensaje', 'Préstamo creado');
        }catch(\Exception $ex){
            $this->Log("Error al solicitar préstamo del Inventario $request->id_inventario");
            return back()->with('error', 'El préstamo no ha podido crearse');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        $inventario = Inventario::find($prestamo->id_inventario);
        return view('prestamos.show',compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        return view('prestamos.edit', compact('prestamo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'id_usuario' => 'required',
            'id_inventario' => 'required',
            'fecha_prevista_devolucion' => 'required',
            'importe_fianza' => 'required',
            'concepto_fianza' => 'required',
            'observaciones' => 'required',
        ],[
            'id_usuario.required'=>'Es obligatorio el id del usuario',
            'id_inventario.required'=>'Es obligatorio el id del inventario',
            'fecha_prevista_devolucion.required'=>'Es obligatorio la fecha prevista de devolucion',
            'importe_fianza.required'=>'Es obligatorio el importe de la fianza',
            'concepto_fianza.required'=>'Es obligatorio el concepto de la fianza',
            'observaciones.required'=>'Es obligatorio las observaciones'
        ]);

        try{
            $prestamo->id_usuario = $request->id_usuario;
            $prestamo->id_inventario = $request->id_inventario;
            $date = new \DateTime($request->fecha_prevista_devolucion);
            $prestamo->fecha_prevista_devolucion = $date->getTimestamp();
            $prestamo->importe_fianza = $request->importe_fianza;
            $prestamo->concepto_fianza = $request->concepto_fianza;
            $prestamo->observaciones = $request->observaciones;
            $prestamo->fecha_creacion = now()->getTimestamp();
            $prestamo->fecha_modificacion = now()->getTimestamp();
            $prestamo->save();
            $this->Log("Ha solicitado un préstamo de ".$prestamo->inventario->nombre);

            return back()->with('mensaje', 'Préstamo creado');
        }catch(\Exception $ex){
            $this->Log("Error al solicitar préstamo del Inventario $request->id_inventario");
            return back()->with('error', 'El préstamo no ha podido crearse');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
