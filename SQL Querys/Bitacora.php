Laravel proyecto camaleon
- correr el script para crear las tablas: cuenta_clase, cuenta_grupo, cuenta, subcuenta, cuenta_auxiliar
	- estas tablas ya contienen los campos created_at, updated_at y deleted_at
- correr el script para llenar las tablas creadas con la informacion predefinida: data_puc.sql
- ejecutar los comandos para crear el crud a partir de las tablas creadas:
	php artisan infyom:scaffold cuenta_clase --fromTable --tableName=cuenta_clase
	php artisan infyom:scaffold cuenta_grupo --fromTable --tableName=cuenta_grupo
	php artisan infyom:scaffold cuenta --fromTable --tableName=cuenta
	php artisan infyom:scaffold subcuenta --fromTable --tableName=subcuenta
	php artisan infyom:scaffold cuenta_auxiliar --fromTable --tableName=cuenta_auxiliar

- las rutas que se han creado son:
	Route::resource('cuentaClases', 'cuenta_claseController');
	Route::resource('cuentaGrupos', 'cuenta_grupoController');
	Route::resource('cuentas', 'cuentaController');
	Route::resource('subcuentas', 'subcuentaController');
	Route::resource('cuentaAuxiliars', 'cuenta_auxiliarController');

- se modifican las vistas, con el fin de colocar el id correcto para cada tabla:
	cuentaClases.edit y cuentaClases.table cambiando el valor ->id por ->cntc_id
	cuentaGrupos.edit y cuentaGrupos.table cambiando el valor ->id por ->cntg_id
	cuentas.edit y cuentas.table cambiando el valor ->id por ->cnt_id
	subcuentas.edit y subcuentas.table cambiando el valor ->id por ->scnt_id
	cuentaAuxiliars.edit y cuentaAuxiliars.table cambiando el valor ->id por ->cntaux_id

- se coloca la paginacion en 5 registros para cada uno de los modelos
	- se modifican los controladores de cada uno, en el metodo index se cambia el valor ->all(); por ->paginate(5);
		cuenta_claseController
		cuenta_grupoController
		cuentaController
		subcuentaController
		cuenta_auxiliarController
	- se modifican las vistas index de cada uno, justo debajo de la instruccion @include('[$directorio$].table') colocar la instruccion {!! $[$variable$]->render() !!}
		cuentaClases.index 
			@include('cuentaClases.table')
			{!! $cuentaClases->render() !!}
		cuentaGrupos.index 
			@include('cuentaGrupos.table')
			{!! $cuentaGrupos->render() !!}
		cuentas.index 
			@include('cuentas.table')
			{!! $cuentas->render() !!}
		subcuentas.index 
			@include('subcuentas.table')
			{!! $subcuentas->render() !!}
		cuentaAuxiliars.index
			@include('cuentaAuxiliars.table')
			{!! $cuentaAuxiliars->render() !!}
		
- se pueden editar los tamaños de los botones 
	http://www.w3schools.com/bootstrap/bootstrap_ref_css_buttons.asp
	
- se pueden editar los iconos de los botones 
	http://www.w3schools.com/bootstrap/bootstrap_ref_comp_glyphs.asp
	http://www.w3schools.com/icons/fontawesome_icons_form.asp
	http://www.w3schools.com/bootstrap/bootstrap_badges_labels.asp
	
- se modificaron todas las vistas create, edit, index y show con la instruccion @extends('layouts.admin')
	- esto debido a que se creo un layout con un menu lateral
	
- agregar las restricciones a los campos de acuerdo a la definicion en la base de datos, si es not null, si es FK o PK
	- tener en cuenta la longitud del campo
	
- verificar los campos que estan en fillable para que no salgan errores al momento de guardar

- en el archivo /resources/lang/es/validation.php estan las validaciones para cada caso
	- se pueden modificar o agregar mensajes personalizados
		//
		...
		'required'             => 'El campo :attribute es obligatorio.',
		...
		//
	- se pueden agregar 'traducciones' para los nombres de los campos
		//
		...
		'attributes'           => [
			'name'                  => 'nombre',
		...
		//
		
- modificar los campos de llaves foraneas por selects
	//ejemplo	
	//vista /cuentaGrupos/fields
	{!! Form::label('cntg_cntcid', 'Cntg Cntcid:') !!}
	{!! Form::select('cntg_cntcid', $cuentaClase, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una clase' ])!!}
	
- en el controlador incluir el/los modelo/s de las tablas de referencia de las llaves foraneas
	//ejemplo
		
		use App\Models\cuenta_clase;
		
	- modificar el metodo create
		//ejemplo
		//se lista el nombre y el id correspondiente a todos las cuenta_clase
				$cuentaClase = cuenta_clase::lists('nombre', 'cntc_id');
				return view('cuentaGrupos.create',compact('cuentaClase'));
	