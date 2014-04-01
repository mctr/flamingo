@extends('admin.layout')

@section('title')
		User Personal Page
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
						<a href="{{ URL::to('admin/users') }}">{{$firstname}} {{$lastname}}</a>
					</li>
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Parola Bilgisini Güncelle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						{{ Form::open(array('url'=>'admin/user_password_update', 'class'=>'form-horizontal')) }}
						  <fieldset>
							<legend>Parola Bilgisini Güncelle</legend>
							
							{{ Form::hidden('id', $id) }}

							<div class="control-group">
							  <label class="control-label" for="date01">Yeni Parola</label>
							  <div class="controls">
								{{ Form::password('password', array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Yeni Parola(Tekrar)</label>
							  <div class="controls">
								{{ Form::password('password_confirmation', array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>
							
							<div class="form-actions">
								{{ Form::submit('Güncelle', array('class'=>'btn btn-success'))}}
								<a href="{{ URL::route('admin/users') }}" class="btn btn-danger">İptal</a>
							</div>
						</fieldset>
					{{ Form::close() }}           
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Kişisel Bilgileri</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						{{ Form::open(array('url'=>'admin/userupdate', 'method' => 'post', 'class'=>'form-horizontal')) }}
						  <fieldset>
							<legend>Üyelik Bilgileri Güncelle</legend>
							
								{{ Form::hidden('id', $id) }}

							
							<div class="control-group">
							  <label class="control-label" for="date01">E-Posta</label>
							  <div class="controls">
								{{ Form::text('email', $email, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">İsim</label>
							  <div class="controls">
								{{ Form::text('first_name', $firstname, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Soyisim</label>
							  <div class="controls">
								{{ Form::text('last_name', $lastname, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="date01">Telefon Numara</label>
							  <div class="controls">
								{{ Form::text('phone_number', $phone_number, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Doğum Tarihi</label>
							  <div class="controls">
								{{ Form::text('birthday', $birthday, array('class'=>'form-control input-xlarge datepicker')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Cinsiyet</label>
							  <div class="controls">
								{{ Form::text('gender', $gender, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>
							<legend>Okul Bilgilerim</legend>
							<div class="control-group">
							  <label class="control-label" for="date01">Fakülte</label>
							  <div class="controls">
								{{ Form::text('faculty_name', $faculty_name, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Bölüm</label>
							  <div class="controls">
								{{ Form::text('department_name', $department_name, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Okul Numarası</label>
							  <div class="controls">
								{{ Form::text('student_number', $student_number, array('class'=>'form-control input-xlarge')) }}
							  </div>
							</div>

							<div class="form-actions">
								{{ Form::submit('Güncelle', array('class'=>'btn btn-success'))}}
								<a href="{{ URL::route('admin/users') }}" class="btn btn-danger">İptal</a>
							</div>
						</fieldset>
					{{ Form::close() }}
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Yorumları</h2>
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
								  <th>Yorum Yapan</th>
								  <th>Yorum Yapılan</th>
								  <th>Yorum İçerigi</th>
								  <th>İşlemler (Düzenle, Sil)</th>
							  </tr>
						  </thead>   
						  <tbody>
							
		
						
						  	@foreach($yorumlarim as $yorum)
							<tr>
								<td>{{ $yorum->id }}</td>
								@if ($who = User::find($yorum->who_did_id))
								<td>{{ $who->first_name }} {{ $who->last_name }}</td>
								@endif
								<td>{{ $firstname }} {{ $lastname }}</td>
								<td>{{ $yorum->comment}}</td>
								<td class="center">
									<a class="btn btn-success btn-round" href="{{ URL::route('commentdetails', array('id' => $yorum->id)) }}">
										<i class="icon-edit icon-white"></i> 
										Düzenle
									</a>
									<a class="btn btn-danger btn-round" href="{{ URL::route('yorumret', array('id' => $yorum->id)) }}">
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
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Foto</h2>
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
								  <th>Fotograf</th>
								  <th>Yolu</th>
								  <th>İşlemler (Sil)</th>
							  </tr>
						  </thead>   
						  <tbody>
							
		
						
						  	@foreach($fotolar as $foto)
							<tr>
								<td>{{$foto->id}}</td>
								<td>
									
										<a href="#">
											<img class="dashboard-avatar" src="{{ URL::asset($foto->image_path )}}">
										</a>
									
									</td>
								<td>{{ $foto->image_path }}                                 
								</td>
								<td class="center">
									<a class="btn btn-danger" href="{{ URL::route('fotoret', array('id' => $foto->id)) }}">
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
