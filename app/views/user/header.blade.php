<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">
							<div class="col-md-5">
								<center><strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong></center><br>
	               				<a class="" href=""><img alt="" src="{{asset('assets/asset/img/gallery/2.jpg')}}" width="200" height="150"></a>
	             			</div>
						</li>
						<li><a href="{{ URL::to('user/profile') }}"><i class="icon-home"></i><span class="hidden-tablet">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a></li>
						<li><a href="{{ URL::route('user/mycomments') }}"><i class="icon-eye-open"></i><span class="hidden-tablet"> Yorumlarım</span></a></li>
						<li><a href="dgaleri.html"><i class="icon-camera"></i><span class="hidden-tablet"> Resimler</span></a></li>
						<li><a href="{{ URL::to('friends') }}"><i class="icon-user"></i><span class="hidden-tablet"> Arkadaşlar</span></a></li>
						<li class="nav-header hidden-tablet">Durum</li>
						<li><a href="{{ URL::to('logout')}}"><i class="icon-lock"></i><span class="hidden-tablet"> Çıkış</span></a></li>
					</ul>
				</div><!--/.well-->
			</div><!--/span-->