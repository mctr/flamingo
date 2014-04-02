<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">

						<li class="nav-header hidden-tablet">Ekleme İşlemleri</li>
						<li><a class="ajax-link" href="{{ URL::to('admin/adminadd')}}"><i class="icon icon-add"></i><span class="hidden-tablet"> Admin Ekle</span></a></li>
						
						<li class="nav-header hidden-tablet">Listeleme İşlemleri</li>
						<li><a class="ajax-link" href="{{ URL::to('admin/admins') }}"><i class="icon icon-tag"></i><span class="hidden-tablet"> Admin Listele</span></a></li>
						<li><a class="ajax-link" href="{{ URL::to('admin/users')}}"><i class="icon icon-tag"></i><span class="hidden-tablet"> Kullanıcı Listele</span></a></li>
						
						
						<li class="nav-header hidden-tablet">Durum</li>
						<li><a class="ajax-link" href="{{ URL::to('admin/profile')}}"><i class="icon icon-envelope-closed"></i><span class="hidden-tablet"> Şikayetler</span></a></li>
						<li><a href="{{ URL::to('admin/logout')}}"><i class="icon icon-locked"></i><span class="hidden-tablet"> Çıkış</span></a></li>
					</ul>
				</div><!--/.well-->
			</div><!--/span-->
