			
			<div class="sortable row-fluid">
				<a data-rel="tooltip" class="well span3 top-block" href="{{ URL::to('admin/useronay') }}">
					<span class="icon32 icon-red icon-user"></span>
					<div>Onay Bekleyen</div>
					<div>Kullanıcılar</div>
					<span class="notification">{{ count($useronay) }}</span>
				</a>

				<a data-rel="tooltip"  class="well span3 top-block" href="{{ URL::to('admin/admins') }}">
					<span class="icon32 icon-color icon-user"></span>
					<div>Admin</div>
					<div>Listesi</div>
					<span class="notification green">{{ count($admins)}}</span>
				</a>

				<a data-rel="tooltip" class="well span3 top-block" href="{{ URL::to('admin/users') }}">

					<span class="icon32 icon-color icon-user"></span>
					<div>Kullanıcı</div>
					<div>Listesi</div>
					<span class="notification yellow">{{ count($users) }}</span>
				</a>
				
				<a data-rel="tooltip" class="well span3 top-block" href="{{ URL::to('admin/mizah') }}">
					<span class="icon32 icon-color icon-messages"></span>
					<div>Paylaşılan</div>
					<div>Mizahlar</div>
					<span class="notification red">0</span>
				</a>
			</div>
