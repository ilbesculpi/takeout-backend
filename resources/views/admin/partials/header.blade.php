<header class="main-header">
	<!-- Logo -->
	<a href="<?= route('admin::dashboard') ?>" class="logo">
		<span class="logo-mini">
			<img src="<?= $settings['app.logo'] ?>" alt="<?= $settings['app.name'] ?>" />
		</span>
		<span class="logo-lg">
			<img src="<?= $settings['app.logo'] ?>" alt="<?= $settings['app.name'] ?>" />
			<b><?= $settings['app.name'] ?></b>
		</span>
	</a>
	
	<nav class="navbar navbar-static-top">
		
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			
			<ul class="nav navbar-nav">
				
				<!-- User Profile -->
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= $auth->avatarUrl ?>" class="user-image" alt="<?= $auth->name ?>">
						<span class="hidden-xs"><?= $auth->name ?></span>
					</a>
					
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?= $auth->avatarUrl ?>" class="img-circle" alt="<?= $auth->name ?>">
							<p>
								<?= $auth->name ?>
								<small>Member since <?= $auth->created_at->format('F, Y') ?></small>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center">
									<a href="#">Followers</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Sales</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Friends</a>
								</div>
							</div>
							<!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?= route('auth::logout') ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>