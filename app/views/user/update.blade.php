@extends('user.layout')

@section('title')
		Güncelleme
@stop

@section('styles')
<style type="text/css">
	body {
		padding-bottom: 40px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	textarea{
		/*overflow: auto;*/
		font-family: arial;
        /*resize:none;*/
        width: 650px;
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
						<a href="{{ URL::to('user/profile') }}">{{ Auth::user()->first_name}} {{ Auth::user()->last_name }}</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::route('user/confirm_waiting') }}">Güncelleme</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Güncelleme</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<!--<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						@foreach($guncelle as $guncel)
						
						{{ Form::open(array('url'=>'user/comment_update', 'method' => 'post', 'class'=>'form-horizontal')) }}
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
								{{ Form::textarea('content',$guncel->comment , array('rows' => '0')) }}
								{{ Form::hidden('id', $guncel->id) }}
							  </div>
							</div>
							<div class="form-actions">
								{{ Form::submit('Güncelle', array('class' => 'btn btn-success')); }}
								<a href="{{ URL::to('user/confirmed_comments') }}" class="btn btn-primary">İptal</a>
							</div>
						  </fieldset>
						{{ Form::close() }}  

						@endforeach	
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
				


			</div>

		  
       
					
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				



@stop