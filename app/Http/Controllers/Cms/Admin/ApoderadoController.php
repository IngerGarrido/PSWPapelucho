<?php

namespace App\Http\Controllers\Cms\Admin;
use GuzzleHttp\Subscriber\Redirect;

use Validator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ApoderadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $apoderados = \App\User::fullName($request->get('full_name'))->where('role','=','apoderado')->orderBy('id', 'DESC')->paginate();
        return view('cms.admin.apoderados.lista', compact('apoderados'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'rut' => 'required|max:12',
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
            'role' => 'max:12',
        ]);
    }
    public function create(Request $request)
    {
        $apoderado = new User($request->all());
        $apoderado->role = 'apoderado';

        $apoderado->save();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if($request->ajax()){
            User::create($request->all());
            return response()->json([]);
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
        $apoderado = User::findOrFail($id);
        return view('cms.admin.apoderados.form', compact('apoderado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apoderado = User::find($id);
        if (is_null ($apoderado))
        {
            \App::abort(404);
        }

        return view('cms.admin.apoderados.form')->with('user', $apoderado);
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
