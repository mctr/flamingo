@extends('user.layout')

@section('title')
		Kişisel Bilgilerim
@stop

@section('styles')
<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
@stop

@section('content')

		@include('user.header')

		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::to('user/profile') }}">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::to('user/information') }}">Kişisel Bilgilerim</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Kişisel Bilgilerim</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						{{ Form::open(array('url'=>'user/information_update', 'class'=>'form-horizontal')) }}
						  <fieldset>
							<legend>Üyelik Bilgileri Güncelle</legend>

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
							<div class="alert alert-success">{{ Session::get('message') }}</div>
							@endif

							<div class="control-group">
							  <label class="control-label" for="date01">E-Posta</label>
							  <div class="controls">
								{{ Form::text('email', Auth::user()->email, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">İsim</label>
							  <div class="controls">
								{{ Form::text('first_name', Auth::user()->first_name, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Soyisim</label>
							  <div class="controls">
								{{ Form::text('last_name', Auth::user()->last_name, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="date01">Telefon Numara</label>
							  <div class="controls">
								{{ Form::text('phone_number', Auth::user()->phone_number, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Doğum Tarihi</label>
							  <div class="controls">
								{{ Form::text('birthday', Auth::user()->birthday, array('class'=>'form-control input-xlarge datepicker')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Cinsiyet</label>
							  <div class="controls">
								{{ Form::text('gender', Auth::user()->gender, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>
							<legend>Okul Bilgilerim</legend>
							<div class="control-group">
							  <label class="control-label" for="date01">Fakülte</label>
							  <div class="controls">
								{{ Form::text('faculty_name', Auth::user()->faculty_name, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Bölüm</label>
							  <div class="controls">
								{{ Form::text('department_name', Auth::user()->department_name, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Okul Numarası</label>
							  <div class="controls">
								{{ Form::text('student_number', Auth::user()->student_number, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="form-actions">
								{{ Form::submit('Güncelle', array('class'=>'btn btn-success'))}}
								<a href="{{ URL::route('user/profile') }}" class="btn btn-primary">İptal</a>
							</div>
						</fieldset>
					{{ Form::close() }}

					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@stop