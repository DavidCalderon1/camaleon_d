<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Camaleon: {{ isset($title_page)? $title_page : 'Mas que un software contable' }}</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="{{{ '/menu_multilevel/img/logo-01.ico' }}}">
	{!! Html::style('/assets/css/bootstrap.css') !!}
		
	<!-- menu_multilevel food icons -->
	{!! Html::style('/menu_multilevel/css/organicfoodicons.css') !!}
	<!-- menu_multilevel demo styles -->
	{!! Html::style('/menu_multilevel/css/demo.css') !!}
	<!-- menu_multilevel menu styles -->
	{!! Html::style('/menu_multilevel/css/component.css') !!}
	
	<!-- general styles -->
	{!! Html::style('/general/css/styles.css') !!}
	
	<!-- menu_multilevel modernizr styles -->
	{!! Html::script('/menu_multilevel/js/modernizr-custom.js') !!}
	
	<!-- aqui se mostraran los style colocados en las vistas en la misma seccion -->
	@section('styles')
	
	@show
</head>

<body>
	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
				<a href="/" style="cursor:auto">
					<div class="dummy-icon foodicon foodicon--coconut"></div>
				</a>
				<!--h2 class="dummy-heading">Fooganic</h2-->
			</div>
			<div class="bp-header__main">
				<span class="bp-header__present">Camaleón<span class="bp-tooltip bp-icon bp-icon--about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1 class="bp-header__title">Software contable</h1>
				<nav class="bp-nav">
					<a class="bp-nav__item bp-icon bp-icon--prev" href="http://tympanus.net/Blueprints/PageStackNavigation/" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<!--a class="bp-nav__item bp-icon bp-icon--next" href="" data-info="next Blueprint"><span>Next Blueprint</span></a-->
					<a class="bp-nav__item bp-icon bp-icon--drop" href="http://tympanus.net/codrops/?p=25521" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a class="bp-nav__item bp-icon bp-icon--archive" href="http://tympanus.net/codrops/category/blueprints/" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
			</div>
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="{!!URL::to('/admin')!!}">Módulo Administrativo</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Fruits</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Grains</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Mylk &amp; Drinks</a></li>
					<!--li class="menu__item"><a class="menu__link" data-submenu="submenu-5" href="#">Mylk &amp; Grains 5</a></li-->
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="#">Mylk &amp; Grains 5</a></li>
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="{!!URL::to('/admin/puc')!!}">Manejo de Plan Único de Cuentas</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Roots &amp; Seeds</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Cabbages</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Salad Greens</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Mushrooms</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-6" href="#">Sale %</a></li>
				</ul>
				<!-------------------------------------------------->
				<!-------------------------------------------------->
				<!-- Submenu 1-1 -->
				<ul data-menu="submenu-1-1" class="menu__level" >
					<li class="menu__item"><a class="menu__link" href={!!URL::to('/admin/puc/crear')!!}><i class='glyphicon glyphicon-plus btn-xs'></i> Creación de cuenta</a></li>
					<li class="menu__item"><a class="menu__link" href={!!URL::to('/admin/puc/buscar')!!}><i class='glyphicon glyphicon-search btn-xs'></i> Busqueda de cuenta</a></li>
					<li class="menu__item menu__item_dropdown dropdown_parent">
						<div class="menu__link_dropdown a">
							<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">1</span></i>Clase<span class="btn-xs pull-right"><span class="caret "></span></span>
						</div>
						<ul class="dropdown_child">
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!!URL::to('/admin/puc/clases/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
							</li>
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!! URL::to('/admin/puc/clases ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Clases</a>
							</li>
						</ul>
					</li>
					<li class="menu__item menu__item_dropdown dropdown_parent">
						<div class="menu__link_dropdown a">
							<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">2</span></i>Grupo<span class="btn-xs pull-right"><span class="caret "></span></span>
						</div>
						<ul class="dropdown_child">
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!!URL::to('/admin/puc/grupos/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
							</li>
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!! URL::to('/admin/puc/grupos ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Grupos</a>
							</li>
						</ul>
					</li>
					<li class="menu__item menu__item_dropdown dropdown_parent">
						<div class="menu__link_dropdown a">
							<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">4</span></i>Cuenta<span class="btn-xs pull-right"><span class="caret "></span></span>
						</div>
						<ul class="dropdown_child">
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!!URL::to('/admin/puc/cuentas/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
							</li>
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!! URL::to('/admin/puc/cuentas ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Cuentas</a>
							</li>
						</ul>
					</li>
					<li class="menu__item menu__item_dropdown dropdown_parent">
						<div class="menu__link_dropdown a">
							<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">6</span></i>Subcuenta<span class="btn-xs pull-right"><span class="caret "></span></span>
						</div>
						<ul class="dropdown_child">
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!!URL::to('/admin/puc/subcuentas/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
							</li>
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!! URL::to('/admin/puc/subcuentas ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Subcuentas</a>
							</li>
						</ul>
					</li>
					<li class="menu__item menu__item_dropdown dropdown_parent">
						<div class="menu__link_dropdown a">
							<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">10</span></i>Cuenta Auxiliar<span class="btn-xs pull-right"><span class="caret "></span></span>
						</div>
						<ul class="dropdown_child">
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!!URL::to('/admin/puc/cuentasauxiliares/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
							</li>
							<li class="menu__item_dropdown">
								<a class="menu__link" href="{!! URL::to('/admin/puc/cuentasauxiliares') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Cuentas Auxiliares</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-------------------------------------------------->
				<!-------------------------------------------------->
				
				<!-- Submenu 1-6 -->
				<ul data-menu="submenu-1-6" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Fair Trade Roots</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Dried Veggies</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Our Brand</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-6-4" href="#">Homemade</a></li>
				</ul>
				<!-- Submenu 1-6-4 -->
				<ul data-menu="submenu-1-6-4" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Fair Trade Roots</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Dried Veggies</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Our Brand</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Homemade</a></li>
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Citrus Fruits</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Berries</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2-1" href="#">Special Selection</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Tropical Fruits</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Melons</a></li>
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Exotic Mixes</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Wild Pick</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Vitamin Boosters</a></li>
				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Buckwheat</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Millet</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Quinoa</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Wild Rice</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Durum Wheat</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3-1" href="#">Promo Packs</a></li>
				</ul>
				<!-- Submenu 3-1 -->
				<ul data-menu="submenu-3-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Starter Kit</a></li>
					<li class="menu__item"><a class="menu__link" href="#">The Essential 8</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Bolivian Secrets</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Flour Packs</a></li>
				</ul>
				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Grain Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Seed Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nutri Drinks</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>
				</ul>
				<!-- Submenu 4-1 -->
				<ul data-menu="submenu-4-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
				<!-- Submenu 5 -->
				<ul data-menu="submenu-5" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Grain Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Seed Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nutri Drinks</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>
				</ul>
				<!-- Submenu 5-1 -->
				<ul data-menu="submenu-5-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
				
			</div>
		</nav>
		<div class="content">
			<!-- <p class="info">Please choose a category</p> -->
			<!-- Ajax loaded content here -->
			@yield('content')
		</div>
		<div class="modal_loading" id="modal_loading"></div>
	</div>
	<!-- /view -->
	
	<!-- jquery & bootstrap scripts -->
	{!! Html::script('assets/js/jquery.min.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	
	<!-- general scripts -->	
	{!! Html::script('/general/js/script_select_dynamic.js') !!}
	{!! Html::script('/general/js/script_eliminar_por_ajax.js') !!}

	<!-- menu_multilevel scripts -->
	{!! Html::script('/menu_multilevel/js/classie.js') !!}
	{!! Html::script('/menu_multilevel/js/dummydata.js') !!}
	{!! Html::script('/menu_multilevel/js/main.js') !!}
	<script>
		(function() {
			$body = $("body");
			$(document).on({
			    ajaxStart: function() { $body.addClass("loading");    },
			     ajaxStop: function() { $body.removeClass("loading"); }    
			});
		})();

		(function() {
			$('.dropdown_child').hide();
			$('.dropdown_parent > .a').click(function() {
				$(this).parent('.dropdown_parent').siblings('.dropdown_parent').find('ul').slideUp();
				$(this).parent('.dropdown_parent').find('ul').slideToggle();
			});
			var menuEl = document.getElementById('ml-menu'),
				mlmenu = new MLMenu(menuEl, {
					//breadcrumbsCtrl : true, // show breadcrumbs
					initialBreadcrumb : 'Inicio', // initial breadcrumb text
					backCtrl : true, // show back button
					itemsDelayInterval : 0, // delay between each menu item sliding animation
					onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
				});

			// mobile menu toggle
			var openMenuCtrl = document.querySelector('.action--open'),
				closeMenuCtrl = document.querySelector('.action--close');

			openMenuCtrl.addEventListener('click', openMenu);
			closeMenuCtrl.addEventListener('click', closeMenu);

			function openMenu() {
				classie.add(menuEl, 'menu--open');
			}

			function closeMenu() {
				classie.remove(menuEl, 'menu--open');
			}

			// simulate grid content loading
			var gridWrapper = document.querySelector('.content');

			function loadDummyData(ev, itemName) {
				//ev.preventDefault();

				closeMenu();
				gridWrapper.innerHTML = '';
				classie.add(gridWrapper, 'content--loading');
				setTimeout(function() {
					classie.remove(gridWrapper, 'content--loading');
					gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
				}, 700);
			}
		})();
	</script>
	
	<!-- aqui se mostraran los scripts colocados en las vistas en la misma seccion -->
	@section('scripts')
	
	@show
	
	</body>
</html>
