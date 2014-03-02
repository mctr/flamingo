@extends('user.layout')

@section('title')
		Yorum Yap
@stop

@section('content')
		@include('user.friend_header')

		<div id="content" class="span10">
			<!-- content starts -->
			
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Profil</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Ali Candan</a>
					</li>
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Yorum Alanı</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							<legend><strong>{{ $user->first_name }} {{ $user->last_name }} </strong> Hakkında Yorum Yapınız.</legend>         
							<div class="control-group">
							  <label class="control-label" for="textarea2">Yorum</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Kaydet</button>
							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			</div><!--/#content.span10-->

@stop