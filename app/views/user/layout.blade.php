<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @section('title')
            Profil
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- The styles -->

	{{ HTML::style('assets/asset/css/bootstrap-cerulean.css') }}
	{{ HTML::style('assets/asset/css/bootstrap-responsive.css') }}
	{{ HTML::style('assets/asset/css/charisma-app.css') }}
	{{ HTML::style('assets/asset/css/jquery-ui-1.8.21.custom.css') }}
	{{ HTML::style('assets/asset/css/fullcalendar.css') }}
	{{ HTML::style('assets/asset/css/fullcalendar.print.css') }}
	{{ HTML::style('assets/asset/css/chosen.css') }}
	{{ HTML::style('assets/asset/css/uniform.default.css') }}
	{{ HTML::style('assets/asset/css/colorbox.css') }}
	{{ HTML::style('assets/asset/css/jquery.cleditor.css') }}
	{{ HTML::style('assets/asset/css/jquery.noty.css') }}
	{{ HTML::style('assets/asset/css/noty_theme_default.css') }}
	{{ HTML::style('assets/asset/css/elfinder.min.css') }}
	{{ HTML::style('assets/asset/css/elfinder.theme.css') }}
	{{ HTML::style('assets/asset/css/jquery.iphone.toggle.css') }}
	{{ HTML::style('assets/asset/css/opa-icons.css') }}
	{{ HTML::style('assets/asset/css/uploadify.css') }}

    @yield('styles')

</head>
<body background="{{asset('assets/img/content.png')}}">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<!--
				<div class="btn-group pull-right" >
					
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to('user/profile') }}">Profil</a></li>
						<li><a href="#">Kullanıcılar</a></li>
						<li class="divider"></li>
						<li><a href="{{ URL::to('logout') }}">Çıkış</a></li>
					</ul>
					
				</div>
				-->
				<div class="btn-group pull-right" >
					<a class="btn " href="{{ URL::route('user/profile') }}"><i class="icon-home"></i> Profilim</a>
					<a class="btn " href="{{ URL::route('friends') }}"><i class="icon-user"></i> Arkadaşlar</a>
					<a class="btn " href="{{ URL::to('logout') }}"> <i class="icon-lock"></i>Çıkış</a>
					
				</div>
				
				<!-- theme selector starts
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				<!-- theme selector ends -->
				
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">MEZUNİYET YILLIGI UYGULAMASI</a></li>
						<!--<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>-->
						
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid" style="margin-top:15px;">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<!--
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">
							<div class="col-md-5">
								<center><strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong></center><br>
	               				<a class="thumbnail" href="https://github.com/mctr"><img alt="" src="{{asset('assets/asset/img/gallery/2.jpg')}}"></a>
	             			</div>
						</li>
						<li><a href="{{ URL::to('user/profile') }}"><i class="icon-home"></i><span class="hidden-tablet">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a></li>
						<li><a href="dyorum.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> Yorumlar</span></a></li>
						<li><a href="dgaleri.html"><i class="icon-camera"></i><span class="hidden-tablet"> Resimler</span></a></li>
						<li><a href="{{ URL::to('friends') }}"><i class="icon-user"></i><span class="hidden-tablet"> Arkadaşlar</span></a></li>
						<li class="nav-header hidden-tablet">Durum</li>
						<li><a href="{{ URL::to('logout')}}"><i class="icon-lock"></i><span class="hidden-tablet"> Çıkış</span></a></li>
					</ul>
				</div><!--/.well
			</div><!--/span
			
			-->
	
	@yield('content')



	<!-- Javascripts -->
    {{ HTML::script('assets/asset/js/jquery-1.7.2.min.js') }}
    {{ HTML::script('assets/asset/js/jquery-ui-1.8.21.custom.min.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-transition.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-alert.js') }}    
    {{ HTML::script('assets/asset/js/bootstrap-modal.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-dropdown.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-scrollspy.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-tab.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-tooltip.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-popover.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-button.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-collapse.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-carousel.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-typeahead.js') }}
    {{ HTML::script('assets/asset/js/bootstrap-tour.js') }}
    {{ HTML::script('assets/asset/js/jquery.cookie.js') }}
    {{ HTML::script('assets/asset/js/fullcalendar.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/asset/js/excanvas.js') }}
    {{ HTML::script('assets/asset/js/jquery.flot.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.flot.pie.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.flot.stack.js') }}
    {{ HTML::script('assets/asset/js/jquery.flot.resize.min.js') }}
    
    {{ HTML::script('assets/asset/js/jquery.chosen.min.js')}}
    
    {{ HTML::script('assets/asset/js/jquery.uniform.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.colorbox.min.js') }}
    
    {{ HTML::script('assets/asset/js/jquery.cleditor.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.noty.js') }}
    {{ HTML::script('assets/asset/js/jquery.elfinder.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.raty.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.iphone.toggle.js') }}
    {{ HTML::script('assets/asset/js/jquery.autogrow-textarea.js') }}
    {{ HTML::script('assets/asset/js/jquery.uploadify-3.1.min.js') }}
    {{ HTML::script('assets/asset/js/jquery.history.js') }}
    {{ HTML::script('assets/asset/js/charisma.js') }}

    @yield('scripts')

</body>

</html>
