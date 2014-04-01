@extends('admin.layout')

@section('title')
	Profil
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
				</ul>
			</div>
			@include('admin.headers')

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-eye-open"></i> Profil Sayfanız</h2>
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
		</div><!--/#content.span10-->

@stop
