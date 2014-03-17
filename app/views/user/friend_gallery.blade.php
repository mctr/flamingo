@extends('user.layout')
	
@section('title')
	{{ $user->first_name}} {{$user->last_name }}'ın Fotografları
@stop

@section('styles')
<style type="text/css">
	body {
		padding-bottom: 40px;
	}
</style>

@stop

@section('content')

		@include('user.friend_header')

		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::route('detail', array('id' => $user->id)) }}">{{ $user->first_name}} {{ $user->last_name }}</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::route('detail/gallery') }}">Galeri</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Resimler</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
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
						</ul>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
				<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->

@stop