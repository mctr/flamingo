@extends('admin.layout')

@section('title')
		Sikayet
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
		@include('admin.header')
		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::to('admin/profile') }}">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::to('admin/request') }}">Şikayetler</a> 
					</li>
				</ul>
			</div>

			@include('admin.headers')

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-envelope"></i> Şikayetler</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
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
				
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>id</th>
								  <th>Ad-Soyad</th>
								  <th>E-posta</th>
								  <th>Konu Başlığı</th>
								  <th>İçerik</th>
								  <th>İşlemler (Sil)</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach ($request as $requests)
							<tr>
								<td>{{ $requests-> id }}</td>
								<td>{{ $requests->full_name }}</td> 
								<td>{{ $requests->email }}</td>
								
								<td>{{ $requests->issue }}</td>
								<td>{{ $requests->content }}</td>
								<td class="center">
									<a class="btn btn-danger btn-round" href="{{ URL::route('requestret', array('id' => $requests->id)) }}">
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
@stop
