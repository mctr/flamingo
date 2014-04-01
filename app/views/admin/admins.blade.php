@extends('admin.layout')

@section('title')
	Admin Listesi
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

		@include('admin.header')
		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::to('admin/profile') }}">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="{{ URL::to('admin/admins') }}">Adminler</a> 
					</li>
				</ul>
			</div>

			@include('admin.headers')

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Adminler</h2>
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
								  <th>Ad</th>
								  <th>Soyad</th>
								  <th>E-posta</th>
								  <th>İşlemler (Düzenle, Sil)</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach ($admins as $admin)
							<tr>
								<td>{{ $admin-> id }}</td>
								<td>{{ $admin->first_name }}</td> 
								<td>{{ $admin->last_name }}</td>
								
								<td>{{ $admin->email }}</td>
								<td class="center">
									<a class="btn btn-success btn-round" href="{{ URL::route('admindetails', array('id' => $admin->id)) }}">
										<i class="icon-edit icon-white"></i> 
										Düzenle
									</a>
									<a class="btn btn-danger btn-round" href="{{ URL::route('adminret', array('id' => $admin->id)) }}">
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
		</div><!--/#content.span10-->
@stop
