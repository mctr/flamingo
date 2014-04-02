@extends('user.layout')

@section('title')
		İstek | Şİkayet
@stop

@section('styles')
<style type="text/css">
	textarea{
		/*overflow: auto;*/
		font-family: arial;
        /*resize:none;*/
        width: 400px;
        height:120px;
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
						<a href="{{ URL::to('user/request_complaint') }}">İstek - Şikayet</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> İstek - Şikayetiniz</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<!--<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
					<fieldset>
						<legend>İstek - Şikayet</legend>
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
						
						{{ Form::open(array('url'=>'user/request_complaint', 'method' => 'post', 'class'=>'form-horizontal')) }}

						{{ Form::hidden('full_name', Auth::user()->first_name) }}
						{{ Form::hidden('email', Auth::user()->email) }}
		    
		              	<div class="control-group">
							  <label class="control-label" for="date01">Konu </label>
							  <div class="controls">
								{{ Form::text('issue', null, array('class'=>'form-control', 'placeholder'=>'Konu')) }}		  
							  </div>
						</div>

						<div class="control-group">
							  <label class="control-label" for="date01">Mesaj </label>
							  <div class="controls">
								  {{ Form::textarea('content', null, array('class'=>'form-control', 'placeholder'=>'Mesaj')) }}
							  </div>
						</div>

						<div class="form-actions">
								{{ Form::submit('Gönder', array('class'=>'btn btn-info'))}}
								<a href="{{ URL::route('user/profile') }}" class="btn btn-danger">İptal</a>
							</div>
						</fieldset>
            			
            			{{ Form::close() }}
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
		<hr>

		
	</div><!--/.fluid-container-->

@stop