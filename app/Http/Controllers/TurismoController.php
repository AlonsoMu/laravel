<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turismo;
use Illuminate\Support\Facades\DB;

class TurismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $turismos = DB::table('turismo')
        ->select('id', 'nombre_lugar', 'imagen', 'descripcion')
        ->where('nombre_lugar', 'LIKE', '%' . $texto . '%')
        ->orWhere('descripcion', 'LIKE', '%' . $texto . '%')
        ->orderBy('nombre_lugar', 'asc')
        ->paginate(8);

        return view('turismo.index', compact('turismos', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('turismo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turismo = new Turismo;
        $turismo->nombre_lugar = $request->input('nombre_lugar');
        $turismo->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenData = file_get_contents($imagen->getRealPath());
            $turismo->imagen = $imagenData;
        }

        $turismo->save();

        return redirect()->route('turismo.index');
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
        $turismo = Turismo::findOrFail($id);

        return view('turismo.edit', compact('turismo'));
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
        $turismo = Turismo::findOrFail($id);
        $turismo->nombre_lugar = $request->input('nombre_lugar');
        $turismo->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenData = file_get_contents($imagen->getRealPath());
            $turismo->imagen = $imagenData;
        }

        $turismo->save();

        return redirect()->route('turismo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turismo = Turismo::findOrFail($id);
        $turismo->delete();
        return redirect()->route('turismo.index');
    }
}
