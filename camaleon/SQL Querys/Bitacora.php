Laravel proyecto camaleon
- correr el script para crear las tablas: puc_clase, puc_grupo, puc_cuenta, puc_subcuenta, puc_cuentaauxiliar
	- estas tablas ya contienen los campos created_at, updated_at y deleted_at
- correr el script para llenar las tablas creadas con la informacion predefinida: Camaleon_data_puc_con_campos.sql
- ejecutar los comandos para crear el crud a partir de las tablas creadas:
	php artisan infyom:scaffold puc_clase --fromTable --tableName=puc_clase
	php artisan infyom:scaffold puc_grupo --fromTable --tableName=puc_grupo
	php artisan infyom:scaffold puc_cuenta --fromTable --tableName=puc_cuenta
	php artisan infyom:scaffold puc_subcuenta --fromTable --tableName=puc_subcuenta
	php artisan infyom:scaffold puc_cuentaauxiliar --fromTable --tableName=puc_cuentaauxiliar

- las rutas que se han creado y modificado son:
	Route::resource('clases', 'puc_claseController');
	Route::resource('grupos', 'puc_grupoController');
	Route::resource('cuentas', 'puc_cuentaController');
	Route::resource('subcuentas', 'puc_subcuentaController');
	Route::resource('cuentasauxiliares', 'puc_cuentaauxiliarController');
	
- se crean los directorios para los archivos de cada modulo: controllers, requests, models, repositories, views
	- en el caso de PUC: \Admin\Datos\Puc
	
- se crean las url por medio de Route::group para los modulos
	- todo lo que tenga rutas debe ser modificado, normalmente son las vistas y los controladores unicamente 
	- las url se estan dejando todas en minusculas y los namespace o directorios con la primera letra en mayuscula
	- en el caso de PUC: 
		url: /admin/datos/puc/
		directorios: \Admin\Datos\Puc\

- en el Route::group de las rutas, al cambiar de namespace se debe: 
	- mover el controlador a la carpeta correcta
	- actualizar la ruta del namespace en el controlador
	- actualizar el ruta del namespace en la creacion de la clase del controlador

- para actualizar completamente el crud de otro recurso se requiere comparar y realizar las modificaciones entre:
	- controllers
	- requests
	- resources
	- models
	- repositories
	- views

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
	
- se crear la validacion para el momento de actualizar un registro, metodo update()
	- se debe crear una consulta por el id enviado y luego validar que no exista o que no sea diferente al actual
		
		//consulta si existe un registro con el cntg_id enviado
		$consultaId = $this->cuentaGrupoRepository->findWithoutFail($request->cntg_id);
		
		//valida que no exista un registro con el mismo cntg_id
		if( count($consultaId) > 0 && $id !== $request->cntg_id ){
			Flash::error('Ya existe un Grupo con ese Id');
			//Flash::error($id.' Ya existe un Grupo con ese Id'. count($cuentaGrupo) .' - '.$request->cntg_id .' - '.count($grupoNuevo)  );
			//url() .'/'. $request->path() .'/edit'
			
			//regresa al formulario de actualizacion del recurso
            return redirect(route( 'admin.datos.puc.grupos.edit',['id' => $id] ));
            //return redirect(route( 'admin.datos.puc.grupos.index'));
		}

	
- revizar el texto de las vistas y de los mensajes al usuario, que sea coherente y en español	
- ordenar los campos en el modelo, en el request y en las vistas para que salgan las validaciones en un orden mas logico
- en las vistas colocar los elementos html correctos segun los requisitos de los campos, text, number select 
- agregar la instruccion @include('flash::message') en vistas como la de edit para que muestre el retorno del controlador
- ajustar la vista de todos los recursos para que salga la llave primaria cuando ésta es editable
- cambiar el mensaje de alerta de confirmacion de eliminacion por un mensaje de tipo modal

- revizar eloquent para usarlo desde el modelo y hacer un llamado sencillo desde el controlador
- ordenar las consultas por el campo representativo
- añadir una validacion de seguridad a los campos por defecto, se podria colocar el campo created_at con el valor '0001-01-01 00:00:00' evitar que se actualicen o eliminen los campos con esa fecha de creacion
- al mostrar las llaves foraneas concatenar el id(si se requiere verlo) y el nombre o en el caso de los tipo boolean mostrar una palabra ilustrativa
- al crear y tambien al actualizar un recurso redireccionar a la vista del recurso creado
- intentar guardar la url de la lista de todos los recursos al elegir las opciones de ver, editar o eliminar el recurso, para devolverlo al mismo punto
- revizar la opcion de ir a la opcion de menu a partir de la url y mostrarla seleccionada
- contemplar la opcion de incorporar un solo boton en la lista de los recursos que aparezca 'Editar' y en el formulario de edicion incorporar la opcion de eliminar, esto posiblemente reduzca las validaciones

- se crearon unas consultas para llenar las tablas con la nueva estructura
	
			/* tabla puc_clase */
			INSERT INTO puc_clase 
			(codigo, nombre, descripcion, ajuste, naturaleza)
			SELECT codigo, nombre, descripcion, ajuste, naturaleza
			FROM apuc_clase
			ORDER BY codigo ASC

			/* tabla puc_grupo */
			INSERT INTO puc_grupo 
			(codigo, nombre, descripcion, ajuste, nativa, clase_id)
			SELECT g.codigo, g.nombre, g.descripcion, g.ajuste, '1', cast(c.id as int)
			FROM apuc_grupo g join puc_clase c on(g.clase_id=c.codigo)
			ORDER BY g.codigo ASC

			/* tabla puc_cuenta */
			INSERT INTO puc_cuenta 
			(codigo, nombre, descripcion, ajuste, nativa, grupo_id)
			SELECT c.codigo, c.nombre, c.descripcion, c.ajuste, '1', cast(g.id as int)
			FROM apuc_cuenta c join puc_grupo g on(c.grupo_id=g.codigo)
			ORDER BY c.codigo ASC

			/* tabla puc_subcuenta */
			INSERT INTO puc_subcuenta 
			(codigo, nombre, descripcion, ajuste, nativa, cuenta_id)
			SELECT s.codigo, s.nombre, s.descripcion, s.ajuste, '1', cast(c.id as int)
			FROM apuc_subcuenta s join puc_cuenta c on(s.cuenta_id=c.codigo)
			ORDER BY s.codigo ASC

			/* actualizar el campo created_at de todas las tablas puc_ */

			update puc_clase set created_at = '0001-01-01 01:01:01';
			update puc_grupo set created_at = '0001-01-01 01:01:01';
			update puc_cuenta set created_at = '0001-01-01 01:01:01';
			update puc_subcuenta set created_at = '0001-01-01 01:01:01';
			update puc_cuentaauxiliar set created_at = '0001-01-01 01:01:01';