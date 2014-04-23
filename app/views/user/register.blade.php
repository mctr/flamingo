<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
        @section('title')
            Kaydol
        @show
    </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<!-- The styles -->
	{{ HTML::style('assets/css/bootstrap.css') }}
	<style type="text/css">
	  body {
	  	background-image: url({{asset('assets/img/6.jpg')}});
	  }
	  .top_space {
		padding-top: 10px;
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
    	<a class="btn btn-danger pull-left" href="{{ URL::to('/') }}"> << Anasayfa</a><br><br>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
            	<div class="panel-heading">
                     <center><h3 class="panel-title">Mezuniyet Yıllık Uygulaması</h3><br><h3 class="panel-title">Lütfen Kayıt Olun.</h3></center>
                 </div>
                <div class="panel-body">
					{{ Form::open(array('url'=>'user/register', 'class'=>'form-signup')) }}

						@if ($errors->count() > 0)

							<div class="alert alert-danger">
			
								<ul>
								@foreach ($errors->all() as $msg)
								<li>{{ $msg }}</li>
								@endforeach
								</ul>
							</div>

						@endif
						@if(Session::get('message'))
						<a href="{{ URL::to('user/register') }}" class="close" data-dismiss="alert">&times;</a>
						<div class="alert alert-success">{{ Session::get('message') }}</div>
						@endif
						            	<div class="panel-heading">
                     <h3 class="panel-title"><center>User İnformation</center></h3>
                 </div>
						{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
						{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
						{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password Confirmation')) }}
						<br>
						            	<div class="panel-heading">
                     <h3 class="panel-title"><center>Membership İnformation</center></h3>
                 </div>
                 		{{ Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'FirstName')) }}
						{{ Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'LastName')) }}
						{{ Form::text('birthday', null, array('class'=>'form-control', 'placeholder'=>'Birthday(gün/ay/yıl)')) }}
						{{ Form::text('phone_number', null, array('class'=>'form-control', 'placeholder'=>'Phone Number')) }}
						{{ Form::text('gender', null, array('class'=>'form-control', 'placeholder'=>'Gender')) }}
						<br>
						            	<div class="panel-heading">
                     <h3 class="panel-title"><center>College İnformation</center></h3>
                 </div>
						{{ Form::text('faculty_name', null, array('class'=>'form-control', 'placeholder'=>'Faculty Name')) }}
						{{ Form::text('department_name', null, array('class'=>'form-control', 'placeholder'=>'Department Name')) }}
						{{ Form::text('student_number', null, array('class'=>'form-control', 'placeholder'=>'Student Number')) }}
						<br>
						{{ Form::submit('Register', array('class'=>'btn btn-large btn-success btn-block'))}}
					{{ Form::close() }}
				</div>
            </div>
        </div>
    </div>
</div>	
		
</body>
</html>
