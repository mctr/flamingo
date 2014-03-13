@extends('user.layout')

@section('title')
		Profil
@stop

@section('content')
		@include('user.header')

		<div id="content" class="span10">
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="{{ URL::to('user/profile') }}">Home</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>

			<div class="sortable row-fluid">
				<!--<a data-rel="tooltip" class="well span3 top-block" href="onaybekleyen.html">
					<span class="icon32 icon-red icon-user"></span>
					<div>Onay Bekleyen</div>
					<div>Kullanıcılar</div>
					<span class="notification">2</span>
				</a>

				<a data-rel="tooltip"  class="well span3 top-block" href="adminliste.html">
					<span class="icon32 icon-color icon-user"></span>
					<div>Admin</div>
					<div>Listesi</div>
					<span class="notification green">3</span>
				</a>
				-->
				<a data-rel="tooltip" class="well span6 top-block" href="{{ URL::to('user/confirmed_comments') }}">

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
						<h2><i class="icon-picture"></i> Profil Sayfanız</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<!--<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<h2>Merhaba {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h2>
						<p>Profil sayfanıza hoş geldiniz.</p>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
		<hr>

		
	</div><!--/.fluid-container-->

@stop