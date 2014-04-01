@extends('user.layout')

@section('title')
	Galeri|Fotograf Yükleme
@stop

@section('styles')
<style type="text/css">
	body {
		padding-bottom: 40px;
	}
</style>

@stop

@section('content')

		@include('user.header')

		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::to('user/profile') }}">{{ Auth::user()->first_name}} {{ Auth::user()->last_name }}</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::route('gallery') }}">Galeri</a>
					</li>
				</ul>
			</div>

		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Fotograf Yükleme</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">

						<div class="control-group">
							  <label class="control-label" for="date01">Fotograf :</label><br>
							  <div class="controls">
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
									{{ Form::open(['url' => 'user/file_uploads', 'files' => true, 'method' => 'post']) }}	
						        	{{ Form::file('image', array('class' => 'input-file uniform_on')) }}<br><br>
									{{ Form::submit('Yükle', array('class' => 'btn btn-primary')) }}
									{{ Form::close() }}
							  </div>
						</div>
					</div>
				</div><!--/span-->
			
		</div><!--/row-->

		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Resimler</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
				

							<center><strong><h2>Fotograflar</h2></strong></center>
					
						<br/>
						<ul class="thumbnails gallery">
							@foreach($images as $image)
							<li id="image-1" class="thumbnail">
								<a style="background:url({{ URL::asset($image->image_path )}})" title="Sample Image 1" href="{{ URL::asset($image->image_path )}}"><img class="grayscale" src="{{ URL::asset($image->image_path )}}" alt="Sample Image 1"></a>
							</li>
							@endforeach
							<!--<img src="{{ URL::asset('uploads/images/trt.jpg')}}" />-->
						</ul>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
					<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->


    

@stop
