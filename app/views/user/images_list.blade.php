@extends('user.layout')

@section('title')
		Fotograf Listem
@stop

@section('styles')
<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .smalll {
	  	width: 150px;
	  	height:80px;
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
						<a href="{{ URL::route('user/image_list') }}">Fotograf Listem</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Fotograf Listesi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>

					<div class="box-content">
						<div class="controls">
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Fotograf</th>
								  <th>Yolu</th>
								  <th>İşlemler (Sil, Profil Resmi Yap)</th>
							  </tr>
						  </thead>   
						  <tbody>
							
		
						
						  	@foreach($images as $image)
							<tr>
								<td><img class="smalll" src="{{ URL::asset($image->image_path )}}" alt="Sample Image 1"></td>
								<td>{{ $image->image_path }}</td>
								<td class="center">
									<a class="btn btn-success" href="{{ URL::route('user/profile_pic_change', array('id' => $image->id)) }}">
										<i class="icon-tags icon-white"></i> 
										Profil Resmi Yap
									</a>
									<a class="btn btn-danger" href="{{ URL::route('user/image_delete', array('id' => $image->id)) }}">
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
				</div><!--/fluid-row-->



@stop