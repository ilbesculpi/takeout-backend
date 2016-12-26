<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $settings['app.name'] ?> | @yield('title')</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="/themes/auth/vendor/AdminLTE/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="/themes/auth/vendor/AdminLTE/plugins/iCheck/square/blue.css">
		<link rel="stylesheet" href="/themes/auth/vendor/AdminLTE/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="/themes/auth/css/styles.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition page">
		
		<div class="content">
			
			<div class="logo">
				<div>
					<a href="<?= route('auth::login') ?>">
						<img src="<?= $settings['app.logo'] ?>" alt="<?= $settings['app.name'] ?>" />
					</a>
				</div>
				<div>
					<a href="<?= route('auth::login') ?>"><?= $settings['app.name'] ?></a>
				</div>
			</div>
			
			@yield('content')
			
		</div>
		
		<script src="/themes/auth/vendor/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="/themes/auth/vendor/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
		<script src="/themes/auth/vendor/AdminLTE/plugins/iCheck/icheck.min.js"></script>
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' // optional
				});
			});
		</script>
	</body>
</html>
