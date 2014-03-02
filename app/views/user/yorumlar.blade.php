@extends('user.layout')

@section('title')
		{{$user->first_name}} {{$user->last_name}} 'ın Yorumları
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
						<a href="{{ URL::route('detail', array('id' => $user->id)) }}">{{ $user->first_name}} {{ $user->last_name }}</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::route('yorumlar', array('id' => $user->id)) }}">Yorumlar</a>
					</li>
				</ul>
			</div>


			
				@foreach ($comments as $comment)
				
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							@if ($who = User::find($comment->who_did_id))
							<h2>{{ $who->first_name }} {{ $who->last_name }}</h2><br>
							@endif
							<div class="box-icon">
		
							</div>
						</div>
						<div class="box-content">
		                  	<div class="row-fluid">
		                  		
		                  		<h5></h5>	
		                  		<h4>{{$comment->comment}} </h4>
		                  	
		                        <br>
		                        <p>
						          <i class="icon-calendar"></i>{{$comment->created_at}}
						          | <i class="icon-tags"></i> Tags : 
									<a href="#"><span class="label label-success">Beğen</span></a> 
						        </p>
		                    </div>                   
		                </div>
					</div><!--/span-->
				</div>
				@endforeach		
			
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		
	</div>
</div><!--/.fluid-container-->

@stop