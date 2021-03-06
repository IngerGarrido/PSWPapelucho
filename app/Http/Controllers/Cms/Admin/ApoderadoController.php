<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApoderadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.admin.apoderados.lista');
    }
    

    public function listAllApo(Request $request){
        $apoderados = User::fullName($request->get('full_name'))->where('role','=','apoderado')->orderBy('id', 'DESC')->paginate(20);
        return view('cms.admin.apoderados.partials.table',compact('apoderados'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */

    public function create(CreateUserRequest $request)
    {
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateUserRequest $request){

        if($request->ajax()){
            $apoderado = User::create($request->all());
            return response()->json($apoderado);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $apoderado = User::find($id);

        if($request->ajax()) {
            return response()->json($apoderado);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUserRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, $id)
    {
        $apoderado = User::find($id);
        $apoderado->update($request->all());
        if($request->ajax()){
            return response()->json($apoderado);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $apoderado = User::find($id);
        $apoderado->delete();
       if($request->ajax()){
                return response()->json([
                    'id' => User::find($id),
                ]);
            }
        }

}
