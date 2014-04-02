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
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<p class="center">
							
						</p>
						<br/>
						<ul class="thumbnails">
							@foreach ($friends as $friend)
							<li>
								<a href="{{ URL::route('detail', array('id' => $friend->id)) }}">
									<img class="dashboard-avatar" alt="" src="#"></a>
										<strong>Name : </strong>{{$friend->first_name}} {{ $friend->last_name }}
								</a><br> 
								<strong>D.T : </strong> {{ $friend->birthday }}<br>
								
								
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
