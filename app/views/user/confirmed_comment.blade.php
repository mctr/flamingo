@extends('user.layout')

@section('title')
		Onay Bekleyen Yorumlarım
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
						<a href="{{ URL::route('user/confirmed_comments') }}">Onaylanan Yorumlarım</a>
					</li>
				</ul>
			</div>

			<div class="sortable row-fluid">
				<a data-rel="tooltip" class="well span6 top-block" href="{{ URL::to('user/mycomments') }}">

					<span class="icon32 icon-color icon-envelope-open"></span>
					<div>Onaylanmış</div>
					<div>Yorumlar</div>
					<span class="notification yellow">{{ count($confirmed) }}</span>
				</a>
				
				<a data-rel="tooltip" class="well span6 top-block" href="{{ URL::route('user/confirm_waiting') }}">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div>Onaylanmamış</div>
					<div>Yorumlar</div>
					<span class="notification red">{{ count($mycomments) }}</span>
				</a>
			</div>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Onay Bekleyen Yorumlar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Yorum Yapan</th>
								  <th>Yorum İçerigi</th>
								  <th>İşlemler (Güncelle, Sil)</th>
							  </tr>
						  </thead>   
						  <tbody>
							
		
						
						  	@foreach($confirmed as $comment)
							<tr>
								@if ($who = User::find($comment->who_did_id))
								<td>{{ $who->first_name }} {{ $who->last_name }}</td>
								@endif
								<td>{{ $comment->comment }}</td>
								<!--<td>{{ Form::textarea('content',$comment->comment ) }}</td>-->
								<td class="center">
									<a class="btn btn-success" href="{{ URL::route('update', array('id' => $comment->id)) }}">
										<i class="icon-tags icon-white"></i> 
										Güncelle
									</a>
									<a class="btn btn-danger" href="{{ URL::route('delete', array('id' => $comment->id)) }}">
										<i class="icon-trash icon-white"></i> 
										Sil
									</a>
								</td>
							</tr>
							@endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
				  
			<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Güncelle</h3>
			</div>
			<div class="modal-body">
			
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
			
		</div>

		  
       
					
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				



@stop