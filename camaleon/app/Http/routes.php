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
Route::get('/', function () {
    return view('welcome');
});
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
	Route::group(['prefix' => 'datos', 'namespace' => 'Datos'],function() {
		//devuelve una pagina por defecto si no se ingresa una url correcta
		Route::get('/', function () {
			return view('layouts.default', ['site' => 'Datos y Variables']);
		});
		Route::group([
			'prefix' => 'puc',
			'namespace' => 'Puc'
			//'as' => 'puc',
		], function() {
			//devuelve una pagina por defecto si no se ingresa una url correcta
			Route::get('/', function () {
				return view('layouts.default', ['site' => 'Plan Único de Cuentas']);
			});
			// /admin/datos/puc/
			//admin.datos.puc.clases 
			Route::resource('clases', 'puc_claseController');
			
			//admin.datos.puc.grupos 
			//Route::resource('grupos', 'cuenta_grupoController');
			//admin.datos.puc.cuentas 
			//Route::resource('cuentas', 'cuentaController');
			//admin.datos.puc.subcuentas 
			//Route::resource('subcuentas', 'subcuentaController');
			//admin.datos.puc.cuentasAuxiliares 
			//Route::resource('cuentasAuxiliares', 'cuenta_auxiliarController');
			
		});
	});
});

/*rutas de prueba*/

/*
Route::group([
	'prefix' => '/admin/datos/puc',
	
], function() {
	Route::resource('clases', 'cuenta_claseController');
	// Define Routes Here
});
*/

/*
Route::get('/admin/datos/puc', array(
    'as' => 'puc',
));
*/

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
Route::get('/my/long/calendar/puc/{tipo}', function($puc_type)
{
	//['uses' => 
//(
	switch($puc_type) {
        case 'clases':
			'cuenta_claseController@index'
			//return Redirect::action('cuenta_claseController@index');
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
            
			//return View::make('calendar');
            break;
    }
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


Route::resource('grupos', 'puc_grupoController');
Route::resource('cuentas', 'puc_cuentaController');
Route::resource('subcuentas', 'puc_subcuentaController');
Route::resource('cuentasauxiliares', 'puc_cuentaauxiliarController');