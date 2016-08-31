<?php
use App\Archivo;
use App\Galeria;

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/', [
    'uses' => 'Cms\Admin\NoticiaController@mostrarNoticias',
    'as' => 'home'
]);

Route::get('acordion', function () {
    return view('acordion');
});
/*-------------------------------------------------------------------*/
/*                       AUTENTICACIÓN LOGIN                         */
/*-------------------------------------------------------------------*/

Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'login',
]);

Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);

Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'register'
]);

Route::post('register', 'Auth\AuthController@postRegister');

Route::get('confirmation/{token}', [
    'uses' => 'Auth\AuthController@getConfirmation',
    'as' => 'confirmation'
]);

/*-------------------------------------------------------------------*/
/*                  RECUPERAR CONTRASEÑA                             */
/*-------------------------------------------------------------------*/

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*-------------------------------------------------------------------*/
/*                           GRAL ROUTES                             */
/*-------------------------------------------------------------------*/

Route::get('mi-jardin', 'MiJardinController@index');

Route::get('papelucho-las-colonias', 'LasColoniasController@index');

Route::get('archivos?galeria={galeria}', [
    'uses' => 'BlumellController@archivosGaleria',
    'as' => 'galeria-blumell'
]);

Route::group(['prefix' => 'papelucho-blumell'], function () {
    Route::resource('', 'BlumellController');
    Route::post('send', [
        'as' => 'blumell-send',
        'uses' => 'BlumellController@send'
    ]);

});

Route::group(['prefix' => 'papelucho-las-colonias'], function () {
    Route::resource('', 'LasColoniasController');

    Route::post('send', [
        'as' => 'las-colonias-send',
        'uses' => 'LasColoniasController@send'
    ]);
});

Route::get('archivos/galeria/{galeria_id}', function ($galeria_id) {
    return Archivo::whereHas('galerias', function($q) use ($galeria_id){
        $q->where('id', $galeria_id);
    })
        ->select('id as value', 'url as text')
        ->orderBy('created_at', 'DESC')
        ->get();
});

Route::get('prueba', function () {
    return view('cms.apoderados.prueba');
});

/*-------------------------------------------------------------------*/
/*                            MIDDLEWARES                            */
/*-------------------------------------------------------------------*/

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('administrador', [
            'uses' => 'Cms\Admin\AdminController@index',
            'as' => 'administrador'
        ]);

        Route::group(['prefix' => 'administrador'], function () {

            Route::get('listAll{page?}', 'Cms\Admin\AdministradorController@listAll');
            Route::resource('administradores', 'Cms\Admin\AdministradorController');

            Route::get('listApo{page?}', 'Cms\Admin\ApoderadoController@listAllApo');
            Route::resource('apoderados', 'Cms\Admin\ApoderadoController');


            /*Pendiente*/
            Route::get('listParvulos', 'Cms\Admin\ParvuloController@listParvulos');

            Route::resource('parvulos', 'Cms\Admin\ParvuloController');

            Route::get('autocomplete/parvulos', function () {
                $search = Request::get('search');
                return App\Parvulo::where('full_name', 'LIKE', "%$search%")
                    ->orWhere('rut', 'LIKE', "%$search%")
                    ->get();
            });

            Route::post('archivos/files', [
                'uses' => 'Cms\Admin\ArchivoController@files',
                'as' => 'archivos-files'
            ]);

            Route::get('archivos/destroy/{id}', [
                'uses' => 'Cms\Admin\ArchivoController@destroy',
                'as' => 'archivos-destroy'
            ]);

            Route::resource('archivos', 'Cms\Admin\ArchivoController');

            Route::get('listGalerias{page?}', 'Cms\Admin\GaleriaController@listGalerias');
            Route::resource('galerias', 'Cms\Admin\GaleriaController');

            Route::get('galerias/jardin/{jardin_id}', function ($jardin_id) {
                return Galeria::where('jardin_id', $jardin_id)
                    ->select('id as value', 'name as text')
                    ->orderBy('name', 'ASC')
                    ->get();
            });

            Route::get('listNoticias{page?}', 'Cms\Admin\NoticiaController@listNoticia');
            Route::resource('noticias', 'Cms\Admin\NoticiaController');
        });
    });
    Route::group(['middleware' => 'role:apoderado'], function () {
        Route::get('apoderado', function () {
            return view('cms/apoderados/apoderado');
        });

        Route::get('parvulo={id}', [
            'uses' => 'Cms\Admin\ParvuloController@indexApoderado',
            'as' => 'parvulo'
        ]);
    });
});







