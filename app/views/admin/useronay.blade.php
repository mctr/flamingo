@extends('admin.layout')

@section('title')
	Kullanıcı Onay
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
						<a href="{{ URL::to('admin/useronay') }}">Onay Bekleyen Kullanıcılar</a> 
					</li>
				</ul>
			</div>
			
			@include('admin.headers')

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Kullanıcılar</h2>
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
								  <th>id</th>
								  <th>Ad-Soyad</th>
								  <th>E-posta</th>
								  <th>Ögrenci Numara</th>
								  <th>Cinsiyet</th>
								  <th>Fakülte Ad</th>
								  <th>Bölüm Ad</th>
								  <th>İşlemler (Kabul, Ret)</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach ($useronay as $user)
							<tr>
								<td>{{ $user-> id }}</td>
								<td>{{ $user->first_name }} {{ $user->last_name }}</td>
								
								<td>{{ $user->email }}</td>
								<td>{{ $user->student_number }}</td>

								<td>{{ $user->gender }}</td>
								<td>{{ $user->faculty_name }}</td>
								<td>{{ $user->department_name }}</td>
								<td class="center">
									<a class="btn btn-success btn-round" href="{{ URL::route('onaylama', array('id' => $user->id)) }}">
										<i class="icon-ok icon-white"></i> 
										Kabul
									</a>
									<a class="btn btn-danger btn-round" href="{{ URL::route('ret', array('id' => $user->id)) }}">
										<i class="icon-trash icon-white"></i> 
										Ret
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
	</div><!--/fluid-row-->
@stop
