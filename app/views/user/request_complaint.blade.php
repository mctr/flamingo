@extends('user.layout')

@section('title')
		İstek | Şİkayet
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
						{{ Form::open(array('url'=>'homePage/iletisim', 'method' => 'post', 'class'=>'form-signup')) }}
		              
		              	<div class="control-group">
							  <label class="control-label" for="date01">Konu </label>
							  <div class="controls">
								{{ Form::text('issue', null, array('class'=>'form-control', 'placeholder'=>'Konu')) }}		  
							  </div>
						</div>

						<div class="control-group">
							  <label class="control-label" for="date01">Mesaj </label>
							  <div class="controls">
								  {{ Form::textarea('content', null, array('class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Mesaj')) }}
							  </div>
						</div>

						<div class="form-actions">
								{{ Form::submit('Güncelle', array('class'=>'btn btn-success'))}}
								<a href="{{ URL::to('') }}" class="btn btn-primary">İptal</a>
							</div>
						</fieldset>
						


		                  {{ Form::text('full_name', null, array('class'=>'form-control', 'placeholder'=>'Ad ve Soyad')) }}
		                  {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
		                  {{ Form::text('issue', null, array('class'=>'form-control', 'placeholder'=>'Konu')) }}
						  {{ Form::textarea('content', null, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Mesaj')) }}
		                  {{ Form::submit('Gönder', array('class' => 'btn btn-primary')) }}        
            			
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