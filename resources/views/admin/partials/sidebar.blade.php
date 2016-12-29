<aside class="main-sidebar">
	
	<section class="sidebar">
		
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= $auth->avatarUrl ?>" class="img-circle" alt="<?= $auth->name ?>">
			</div>
			<div class="pull-left info">
				<p><?= $auth->name ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		
		<ul class="sidebar-menu">
			
			<li class="header">MAIN NAVIGATION</li>
			
			<li class="active">
				<a href="<?= route('admin::dashboard') ?>">
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>
			
			<li>
				<a href="<?= url('admin/catalog/products') ?>">
					<i class="fa fa-cubes"></i>
					<span>Product Catalog</span>
				</a>
			</li>
			
			<li>
				<a href="#">
					<i class="fa fa-shopping-cart"></i>
					Orders
				</a>
			</li>
			
			<li class="header">SYSTEM</li>
			
			<li>
				<a href="<?= route('auth::logout') ?>">
					<i class="fa fa-power-off text-red"></i>
					<span>Sign out</span>
				</a>
			</li>
			
		</ul>
		
	</section>
	
</aside>