<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Galeria;
use App\Http\Requests\CreateParvuloRequest;
use App\Archivo;
use App\Nivel;
use App\Jornada;
use App\Jardin;
use App\Parvulo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ParvuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $niveles = Nivel::with('parvulos')->get();
        $jornadas = Jornada::with('parvulos')->get();
        $jardines = Jardin::with('parvulos')->get();
        $apoderado = User::find($request->get('user'));
        $parvulos = Parvulo::apoderado($request->get('user'))->orderBy('id', 'DESC')->paginate();

        return view('cms.admin.parvulos.lista',compact('apoderado', 'niveles', 'jornadas', 'jardines','parvulos'));
    }

    public function indexApoderado(Request $request, $id)
    {
        $archivos = Archivo::get();
        $parvulo = Parvulo::findOrFail($id);
        $archivos = Archivo::doesntHave('galerias')->doesntHave('jardines')->doesntHave('niveles')->doesntHave('parvulos')->get();
        $fotografias = $parvulo->jardines->archivos()->orderBy('id', 'DESC')->take(20)->get();
        return view('cms.apoderados.parvulos', compact('parvulo','archivos','fotografias'));
    }

    public function listJornadas(Request $request)
    {
        $jornadas = Jornada::jornadas($request->get('jornada'))->paginate();
        return $jornadas;
    }

    public function getJornadas(Request $request)
    {
        if ($request->ajax()) {
            $jornadas = Jornada::jornadas();
            return response()->json($jornadas);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateParvuloRequest $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(CreateParvuloRequest $request)
    {
        if ($request->ajax()) {
            $parvulo = Parvulo::create($request->all());
            return response()->json($parvulo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Request $request, $id)
    {
        $parvulo = Parvulo::find($id);

        if ($request->ajax()) {
            return response()->json($parvulo);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param CreateParvuloRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function update(CreateParvuloRequest $request, $id)
    {
        $parvulo = Parvulo::find($id);
        $parvulo->update($request->all());
        if ($request->ajax()) {
            return response()->json($parvulo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id, Request $request)
    {
        $parvulos = Parvulo::find($id);
        $parvulos->delete();
        if ($request->ajax()) {
            return response()->json([
                'id' => Parvulo::find($id),
            ]);
        }


    }
}
