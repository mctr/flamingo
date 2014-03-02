<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
        @section('title')
            Login
        @show
    </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<!-- The styles -->

	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/css/bootstrap.min.css') }}
	<style type="text/css">
	  body {
	  	background-image: url({{asset('assets/img/15.jpg')}});
	  }
	  .top_space {
		padding-top: 30px;
	  }
	</style>
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		
</head>

<body>
	
		<div class="container">
    <div class="row top_space">
    	<a class="btn btn-danger pull-left" href="{{ URL::to('/') }}"><< Anasayfa</a><br>
    		<center><h1>Mezuniyet Yıllık Uygulaması</h1></center><br><br>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
            	<div class="panel-heading">
                     <h3 class="panel-title text-center">Ögrenci Girişi</h3>
                 </div>
                <div class="panel-body">
					{{ Form::open(array('url'=>'login', 'method' => 'post', 'class'=>'form-signup')) }}

					@if ($errors->count() > 0)

    					<div class="alert alert-danger">
      	
 					    	<ul>
        					@foreach ($errors->all() as $msg)
        					<li>{{ $msg }}</li>
        					@endforeach
        					</ul>
    					</div>

					@endif
						</ul>
						      
						{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}<br>
						{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
						<br>
						<!--            	<div class="panel-heading">
                     <h3 class="panel-title">Membership İnformation</h3>
                 </div>
                 		{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'FirstName')) }}
						{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'LastName')) }}
						{{ Form::text('birtday', null, array('class'=>'form-control', 'placeholder'=>'Birtday')) }}
						{{ Form::text('phone_number', null, array('class'=>'form-control', 'placeholder'=>'Phone Number')) }}
						{{ Form::text('gender', null, array('class'=>'form-control', 'placeholder'=>'Garden')) }}
						<br>
						            	<div class="panel-heading">
                     <h3 class="panel-title">College İnformation</h3>
                 </div>
						{{ Form::text('faculty_name', null, array('class'=>'form-control', 'placeholder'=>'Faculty Name')) }}
						{{ Form::text('department_name', null, array('class'=>'form-control', 'placeholder'=>'Department Name')) }}
						{{ Form::text('student_number', null, array('class'=>'form-control', 'placeholder'=>'Student Number')) }}
						<br>-->
						{{ Form::submit('Giriş', array('class'=>'btn btn-large btn-success btn-block'))}}
					{{ Form::close() }}
				</div>
            </div>
        </div>
    </div>
</div>	

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="asset/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="asset/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="asset/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="asset/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="asset/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="asset/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="asset/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="asset/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="asset/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="asset/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="asset/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="asset/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="asset/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="asset/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="asset/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="asset/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='asset/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='asset/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="asset/js/excanvas.js"></script>
	<script src="asset/js/jquery.flot.min.js"></script>
	<script src="asset/js/jquery.flot.pie.min.js"></script>
	<script src="asset/js/jquery.flot.stack.js"></script>
	<script src="asset/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="asset/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="asset/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="asset/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="asset/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="asset/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="asset/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="asset/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="asset/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="asset/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="asset/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="asset/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="asset/js/charisma.js"></script>
	
		
</body>
</html>
