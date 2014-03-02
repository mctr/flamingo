@extends('user.layout')

@section('title')
		Yorumlarım
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
						<a href="{{ URL::to('user/profile') }}">{{ Auth::user()->first_name}} {{ Auth::user()->last_name }}</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::route('user/mycomments') }}">Yorumlar</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				@foreach ($mycomments as $comment)
				<div class="box span10">
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
			@endforeach
			</div>
			
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		
	</div>
</div><!--/.fluid-container-->



@stop