@extends('user.layout')

@section('title')
		Arkadaşlar
@stop
@section('styles')
<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	  .smalll {
	  	width: 120px;
	  	height:140px;
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
						<a href="{{ URL::to('friends') }}">Arkadaşlar</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Arkadaşlar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<p class="center">
							
						</p>
						<br/>
						<ul class="thumbnails">
							@foreach ($friends as $friend)
								@foreach($profile_pic as $image)
								@if ($image->user_id === $friend->id)
									<li class="smalll">
										<a href="{{ URL::route('detail', array('id' => $friend->id)) }}"><img class="smalll" src="{{ URL::asset($image->image_path )}}" alt="{{ $friend->first_name, $friend->last_name }}"><center>{{ $friend->first_name, $friend->last_name }}</center></a>
									</li>

								<!--	<img class="smalll thumbnail" src="{{ URL::asset($image->image_path )}}" alt="{{ $friend->first_name, $friend->last_name }}">
									{{ $friend->first_name, $friend->last_name }}-->
								@endif
								<!--
								@if ($image->user_id != $friend->id)
									<li class="smalll">
									<a href="{{ URL::route('detail', array('id' => $friend->id)) }}"><img class="smalll" src="{{URL::asset('assets/img/user_man.jpg') }}" alt="{{ $friend->first_name, $friend->last_name }}">{{ $friend->first_name, $friend->last_name }}</a>
								</li>

								@endif-->
								@endforeach					
							<!--<li>
								<a title="{{$friend->first_name, $friend->last_name }}" href="{{ URL::route('detail', array('id' => $friend->id)) }}"> {{ ($friend->first_name) }} {{ ($friend->last_name) }} </a>
							</li><!-- <img src="{{ asset('assets/asset/img/gallery/3.jpg') }}" /> -->
							@endforeach					
						</ul>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
		<hr>

	</div><!--/.fluid-container-->

@stop
