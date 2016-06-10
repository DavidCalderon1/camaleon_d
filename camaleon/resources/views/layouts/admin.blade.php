<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		{!!Html::style('css/metisMenu.min.css')!!}
		{!!Html::style('css/sb-admin-2.css')!!}
		{!!Html::style('css/font-awesome.min.css')!!}
		
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Camaleon Admin</a>
				</div>
				<ul class="nav navbar-top-links navbar-right">
					 <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						 <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
							</li>
							<li class="divider"></li>
							<li><a href="{!!URL::to('/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<li>
								<a href="#"><span class="label label-primary">1</span><i class="fa fa-sort-amount-asc fa-fw"></i> Clase<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/clases/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!! URL::to('/clases ') !!}"><i class='fa fa-list-ol fa-fw'></i> Clases</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">2</span><i class="fa fa-sort-amount-asc fa-fw"></i> Grupo<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/cuentaGrupos/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/cuentaGrupos')!!}"><i class='fa fa-list-ol fa-fw'></i> Grupos</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">4</span><i class="fa fa-sort-amount-asc fa-fw"></i> Cuenta<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/cuentas/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/cuentas')!!}"><i class='fa fa-list-ol fa-fw'></i> Cuentas</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">6</span><i class="fa fa-sort-amount-asc fa-fw"></i> Subcuenta<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/subcuentas/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/subcuentas')!!}"><i class='fa fa-list-ol fa-fw'></i> Subcuentas</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">8</span><i class="fa fa-sort-amount-asc fa-fw"></i> Cuenta Auxiliar<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/cuentaAuxiliars/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/cuentaAuxiliars')!!}"><i class='fa fa-list-ol fa-fw'></i> Cuentas Auxiliares</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					
					<div class="container">
						<div class="row">
							<h2 class="bold">Scrollable Menu</h2>
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Scrollable Menu <span class="caret"></span></button>
								<ul class="dropdown-menu scrollable-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<label id='choose' for='options'>Select options</label>
					<br clear='all' />
					<select id='options' size="10" style='display:none;'>
						<option>asdasdasd</option>
						<option>ttyyyy</option>
						<option>asdasdasd</option>
						<option>eeeee</option>
						<option>ee</option>
						<option>asdasdeeeasd</option>
						<option>asdasdasd</option>
						<option>asdasdasd</option>
						<option>asdasdasd</option>
						<option>asdasdasd</option>
						<option>asdasdasd</option>
						<option>asdasdasd</option>
						<option>asdasdasd</option>
						<option>dds</option>
						<option>asdasdddasd</option>
						<option>asdasddddasd</option>
						<option>ddd</option>
					</select>

					
				</div>
			</nav>
			<div id="page-wrapper">
				@yield('content')
			</div>
		</div>
		{!!Html::script('js/jquery.min.js')!!}
		{!!Html::script('js/bootstrap.min.js')!!}
		{!!Html::script('js/metisMenu.min.js')!!}
		{!!Html::script('js/sb-admin-2.js')!!}
		
		@section('scripts')
		
		@show
	</body>
</html>