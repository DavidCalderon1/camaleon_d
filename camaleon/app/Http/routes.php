<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});

/*rutas del api generador*/
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

/*rutas de la aplicacion camaleon*/

// direcciona al metodo 'index' del controlador PrincipalController
Route::get('/','PrincipalController@index');

Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function() {
	//devuelve una pagina por defecto si no se ingresa una url correcta
	Route::get('/', function () {
		return view('layouts.default', ['site' => 'Administración']);
	});
	//devuelve una pagina por defecto si no se ingresa una url correcta
	Route::group([
		'prefix' => 'puc',
		'namespace' => 'Puc'
		//'as' => 'puc',
	], function() {
		//devuelve una pagina por defecto si no se ingresa una url correcta
		Route::get('/', function () {
			return view('layouts.default', ['site' => 'Plan Único de Cuentas']);
		});
		// /admin/puc/
		//admin.puc.buscar 
		Route::resource('operacion', 'puc_operacionesController');
		Route::get('buscar', 'puc_operacionesController@index');
		Route::get('crear', 'puc_operacionesController@create');
		Route::get('listas', 'puc_operacionesController@lista');
		//admin.puc.clases 
		Route::resource('clases', 'puc_claseController');
		//admin.puc.grupos 
		Route::resource('grupos', 'puc_grupoController');
		//admin.puc.cuentas 
		Route::resource('cuentas', 'puc_cuentaController');
		//admin.puc.subcuentas 
		Route::resource('subcuentas', 'puc_subcuentaController');
		//admin.puc.cuentasauxiliares 
		Route::resource('cuentasauxiliares', 'puc_cuentaauxiliarController');
	});
});

/*rutas de prueba*/

/*
//Route::resource('clases', 'cuenta_claseController', ['as' => 'puc.clases']);

Route::get('/my/long/calendar/cal', 'PrincipalController@create');

Route::get('reset/foo/bar', function () {
    return view('welcome');
});

Route::get('prueba','PrincipalController@index');

Route::get('/my/long/calendar/route', array(
    'as' => 'calendar',
    function() {
        return View::make('calendar');
    }
));
Route::group(['prefix' => '/dfasdfa/dlkasdf/puc2222/'], function () {
    
	Route::get('users', function ()    {
        // Matches The "/admin/users" URL
    });
});
*/

/*
Route::get('/my/long/calendar/route/{puc}', function($puc_type)
{
	switch($puc_type) {
        case 'clases':
			return Redirect::action('cuenta_claseController@index');
			//Route::get('cuenta_claseController@index');
            //return View::make('cuentaClases.index');
			//return route('cuenta_claseController@index');
            //return Redirect::route('clases.index');
			//return View::make('clases');
            break;
        case 'manager':
            //$this->profile = $this->adminProfile();
            break;
        case 'admin':
            //$this->profile = $this->adminProfile();
            break;
        case 'student':
            //$this->profile = $this->studentProfile();
            break;
        case 'staff':
            
			return View::make('calendar');
            break;
    }
});
*/
