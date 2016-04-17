<?php

namespace App\Http\Controllers\Cms\Admin;

use Illuminate\Http\Request;
use App\Noticia;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::orderBy('id','DESC')->paginate();
        return view('cms.admin.noticias.lista',compact('noticias'));
    }

    public function mostrarNoticias()
    {
        $noticias = Noticia::orderBy('id','DESC')->paginate(2);
        return view('home',compact('noticias'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:200',
            'content' => 'required|max:255',
            'publish' => 'required|max:255',
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $noticia = new Noticia($request->all());
        $noticia->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if($request->ajax()){
            alert("llegue aqui");
            Noticia::create($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $noticia = Noticia::find($id);
        if($request->ajax()){
            return response()->json($noticia);
        }
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
        $noticia = Noticia::find($id);
        $noticia->update($request->all());
        if($request->ajax()){
            return response()->json($noticia);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $noticia = \App\Noticia::find($id);
        $noticia->delete();
        if($request->ajax()){
            return response()->json([
                'id' => \App\Noticia::find($id),
            ]);
        }
    }
}
