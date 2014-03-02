<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none; background-image: url(Bootstrap/img/duvar.png);">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div> 
          <div class="modal-body">
            <center>
            <div class = "container">
              <form class="form-signin" method="post" action="#">
                <h2 class="form-signin-heading">Kullanıcı Bilgileri</h2>
                <hr>
                  <input type="text" name="eposta" class="form-control" placeholder="E-posta" autofocus>
                  <input type="password" name="sifre" class="form-control" placeholder="Parola">
                  <input type="password" name="sifretk"class="form-control" placeholder="Parola Tekrar" autofocus>
                
                <h2 class="form-signin-heading">Üyelik Bilgileri</h2>
                <hr>
                  <input type="text"  name="adsorad" class="form-control" placeholder="Ad Soyad">
                  <input type="text"  name="telnumara"class="form-control" placeholder="Telefon Numarası" autofocus>
                  <input type="text"  name="dogtarihi" class="form-control" placeholder="Doğum Tarihi">
                  <input type="text" name="dogtarihi" class="form-control" placeholder="Cinsiyet">
                <hr>
                
                <h2 class="form-signin-heading">Okul Bilgileri</h2>
                  <input type="text" name="fakulte" class="form-control" placeholder="Fakülte Ad">
                  <input type="text" name="bolum"class="form-control" placeholder="Bölüm Ad" autofocus>
                  <input type="text" name="onumara" class="form-control" placeholder="Öğrenci Numara"><br>
                  <input type="submit" value="GÖNDER" class = "btn btn-primary btf" />
                </form>
              </div>
            </center>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Çıkış</button>
          </div>
        </div>
        
        <div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none; background: url(assets/img/duvar.png);">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">
            <center>
            <div class = "container" style ="position: relative;">
              {{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'form-signin')) }}
              <!--<form class="form-signin" method="post" action="#"> -->
                <h2 class="form-signin-heading">Giriş</h2>
                <hr>
                	{{ Form::text('email')}}
                  <input type="text" name="kullanici_ad" class="form-control" placeholder="Kullanıcı Adı" >
                  <input type="password" name="sifre" class="form-control" placeholder="Parola"><br>
                 <input type="submit" value="GÖNDER" class = "btn  btn-primary btf"/>
                </form>
              </div>
            </center>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Çıkış</button>
          </div>
        </div>
      </div>
    </div>
