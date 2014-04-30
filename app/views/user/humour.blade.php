@extends('user.layout')

@section('title')
		Mizah
@stop
@section('styles')
	{{ HTML::style('assets/css/mizah.css') }}
	{{ HTML::style('assets/css/bootstrap.css') }}

@stop
@section('content')

<div class="container">
    <div class="row">

        <div class="conversation-wrap col-lg-4">            
            				
            	{{ Form::open(['url' => 'user/humour', 'files' => true, 'method' => 'post']) }}

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
						<div class="send-wrap ">
							<textarea name="humour_content" class="form-control send-message" rows="3" placeholder="Mizah paylaş..."></textarea>
						</div>
						
						<center>{{ Form::file('image', array('class' => 'input-file uniform_on')) }}</center>
											
						<button type="submit" class="btn btn-sm btn-primary pull-right">
							<i class="icon icon-comment icon-white"></i>Paylaş
						</button>
				
				{{ Form::close() }}
				
				<hr>
				<center><h2>Paylaştıgın Mizahlar</h2></center>
				<hr>

				@foreach($my_humour as $humour)
				<div class="media conversation"> 
					
					<div class="media-body">
						
						@if($humour->state == 2)
						<h6 class="pull-right"><small>Onay Bekliyor</small></h6>
						@elseif ($humour->state == 3)
						<h6 class="pull-right"><small>Reddedildi</small></h6>
						@else
						<h6 class="pull-right"><small>Onaylandı</small></h6>
						@endif
						
						<h5 class="media-heading">{{ Auth::user()->first_name, Auth::user()->last_name }}</h5>
						@if ($humour->humour_content)
							<small>{{ $humour->humour_content }}</small>
						@endif
						
						@if ($humour->image_path)
						<br>
						<a class="pull-left" href="#">
							<img class="media-object" src="{{ URL::asset($humour->image_path) }}" alt="64x64" style="width: 250px; height: 250px;">
						</a>
						@endif
						
                	</div>
            	</div>
            	@endforeach	

        </div>
        
        





        <div class="message-wrap col-lg-8">
            <div class="msg-wrap">
            	@foreach($other_humour as $humours)
				
				<div class="media msg">
                    <div class="media-body">
                        <small class="pull-right time"><i class="fa fa-clock-o"></i>{{ $humours->created_at }}</small>
                        @if ($who = User::find($humours->user_id))	
                        <h5 class="media-heading">{{ $who->first_name, $who->last_name}}</h5>
                        @endif
                        @if($humours->humour_content)
                        <small class="col-lg-10">{{ $humours->humour_content }}</small>
                        @endif
                        @if ($humours->image_path)
                        	<img class="media-object" src="{{ URL::asset($humours->image_path) }}" alt="64x64" style="width: 450px; height: 250px;">
                        @endif	
                    </div>
                </div>
				
				<hr>
				@endforeach		
            </div>
        </div>
    </div>
</div>


@stop
