@extends('user.layout')

@section('title')
		Personal Page
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

		@include('user.friend_header')
		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::to('user/profile') }}">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::to('friends') }}">Arkadaşlar</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Kişinin Bilgileri</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<p class="center">
							<button id="toggle-fullscreen" class="btn btn-large btn-primary visible-desktop" data-toggle="button">Toggle Fullscreen</button>
						</p>
						<br/>
						<ul>
							<div class="span6">
								<h3>İsim : {{{ $user->first_name }}}</h3>
								<h3>Soyisim: {{{ $user->last_name }}}</h3>
								<h3>Dogum Tarihi: {{{ $user->birthday }}}</h3>
								<h3>Telefon: {{{ $user->phone_number }}}</h3>
								<h3>Cinsiyet: {{{ $user->gender }}}</h3>
							</div>
							<div class="span6">
								<h3>E-mail: {{{ $user->email }}} </h3>
								<h3>Fakülte: {{{ $user->faculty_name }}}</h3>
								<h3>Bölüm: {{{ $user->department_name }}}</h3>
								<h3>Ögrenci Numarası: {{{ $user->student_number }}}</h3>
							</div>
										
						</ul>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

						<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Yorum Alanı</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						{{ Form::open(array('url'=>'newComment', 'method' => 'post', 'class'=>'form-horizontal')) }}
						  <fieldset>
							<legend><strong>{{ $user->first_name }} {{ $user->last_name }} </strong> Hakkında Yorum Yapınız.</legend>         
							<div class="control-group">
								@if ($errors->count() > 0)

								    <div class="alert alert-danger">
								      
								        <ul>
								        @foreach ($errors->all() as $msg)
								        <li>{{ $msg }}</li>
								        @endforeach
								        </ul>
								    </div>

								@endif

							  <label class="control-label" for="textarea2">Yorum</label>
							  <div class="controls">
								<!-- <textarea class="cleditor" id="textarea2" rows="3"></textarea> -->
								{{ Form::textarea('content', Input::old('content'), array('class' => 'cleditor')) }}
								{{ Form::hidden('yorum_yapilan', $user->id) }}
							  </div>
							</div>
							<div class="form-actions">
								{{ Form::submit('Kaydet', array('class' => 'btn btn-primary')); }}
							</div>
						  </fieldset>
						{{ Form::close() }}  

					</div>
				</div><!--/span-->
    

			<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		
	</div><!--/.fluid-container-->

@stop