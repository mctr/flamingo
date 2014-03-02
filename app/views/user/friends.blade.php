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
						<ul class="thumbnails">
							@foreach ($friends as $friend)
							<li>
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