<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">
							<div class="col-md-5">
								<center><strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong></center><br>
	               				<a class="" href=""><img alt="" src="{{ URL::asset(Session::get('path')) }}" width="200" height="150"></a>
	             			</div>
						</li>
						<li><a href="{{ URL::to('user/profile') }}"><i class="icon-home"></i><span class="hidden-tablet">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a></li>
						<li><a href="{{ URL::to('user/information') }}"><i class="icon-cog"></i><span class="hidden-tablet">Bilgilerimi Düzenle</span></a></li>
						<li><a href="{{ URL::route('user/mycomments') }}"><i class="icon-comment"></i><span class="hidden-tablet"> Yorumlarım</span></a></li>
						<li><a href="{{ URL::route('user/my_did_comments') }}"><i class="icon-comment"></i><span class="hidden-tablet">Yaptıgım Yorumlarım</span></a></li>
						<li><a href="{{ URL::route('gallery') }}"><i class="icon-camera"></i><span class="hidden-tablet"> Resimlerim</span></a></li>
						<li><a href="{{ URL::to('friends') }}"><i class="icon-user"></i><span class="hidden-tablet"> Arkadaşlar</span></a></li>
						<li><a href="{{ URL::route('user/humour') }}"><i class="icon-share"></i><span class="hidden-tablet"> Mizah</span></a></li>
						<li><a href="{{ URL::to('user/request_complaint') }}"><i class="icon icon-sent"></i><span class="hidden-tablet"> İstek | Şikayet</span></a></li>
						<li class="nav-header hidden-tablet">Durum</li>
						<li><a href="{{ URL::to('user/information') }}"><i class="icon-edit"></i><span class="hidden-tablet"> Parola Değiştir</span></a></li>
						<li><a href="{{ URL::to('logout')}}"><i class="icon-lock"></i><span class="hidden-tablet"> Çıkış</span></a></li>
					</ul>
				</div><!--/.well-->
			</div><!--/span-->