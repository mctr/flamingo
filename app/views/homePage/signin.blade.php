<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @section('title')
            Login
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- CSS -->
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-modal-bs3patch.css') }}
    {{ HTML::style('assets/css/bootstrap-modal.css') }}
    {{ HTML::style('assets/css/stylish-portfolio.css') }}
    {{ HTML::style('assets/css/button.css') }}
    {{ HTML::style('assets/css/styless.css') }}
    {{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('assets/css/demo.css') }}
    {{ HTML::style('assets/css/style.css') }}

</head>
<body style="background: lightblue ;">

	<div style="margin-top: 60px;" >
          <div style="background: white" >
          	<div class="modal-footer">
            <a href="{{ URL::to('/') }}" class="btn btn-danger">Anasayfa</a>
          </div>
         
          <div class="modal-body">
            <div class="row">
            <center>
            <div class = "container" style ="position: relative;">
              {{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'form-signin')) }}
              <!--<form class="form-signin" method="post" action="#"> -->
                <h2 class="form-signin-heading">Giriş</h2>
                
                	{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
                	<br>
                	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Parola')) }}
                	<br>
                	{{ Form::Submit('GİRİŞ', array('class' => 'btn btn-primary btf')) }}
                	{{ Form::close() }}
                <!--
                  <input type="text" name="kullanici_ad" class="form-control" placeholder="Kullanıcı Adı" >
                  <input type="password" name="sifre" class="form-control" placeholder="Parola"><br>
              	
                 <input type="submit" value="GÖNDER" class = "btn  btn-primary btf"/>
                </form>
                -->
              </div>
            </center>
            </div>
          </div>
          <!--
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Anasayfa</button>
          </div>
      -->
      </div>
      </div>
    </body>

</html>
