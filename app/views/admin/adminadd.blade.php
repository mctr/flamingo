@extends('admin.layout')

@section('title')
	Admin Ekleme
@stop
@section('styles')
<style type="text/css">
	body {
		padding-bottom: 40px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	textarea{
		/*overflow: auto;*/
		font-family: arial;
        /*resize:none;*/
        width: 650px;
        height:120px;
    }
</style>

@stop

@section('content')
		@include('admin.header')

		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::to('admin/profile') }}">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::to('admin/adminadd') }}">Admin Ekle</a>
					</li>
				</ul>
			</div>
			

				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon icon-add"></i> Admin Ekle</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<center>
						<div class="box-content">
							{{ Form::open(array('url'=>'admin/adminadd', 'class'=>'form-signup')) }}

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
							
							<div class="control-group">
								{{ Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'FirstName')) }}<br>
								{{ Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'LastName')) }}<br>
								{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}<br>
								{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}<br>
								{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password Confirmation')) }}
								<br>
							</div>
							
							{{ Form::submit('Admin Ekle', array('class'=>'btn btn-large btn-success btn-block'))}}
						{{ Form::close() }}
						</div>
					</center>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/#content.span10-->
@stop
