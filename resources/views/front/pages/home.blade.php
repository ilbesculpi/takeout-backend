<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $settings['app.name'] ?></title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
		
        <div class="flex-center position-ref full-height">
            
            <div class="content">
				
				<div class="thumbnail">
					<img src="<?= $settings['app.logo'] ?>" alt="<?= $settings['app.name'] ?>" />
				</div>
				
                <div class="title m-b-md">
                    <?= $settings['app.name'] ?>
                </div>

                <div class="links">
					<?php if( Auth::check() ): ?>
                    <a href="/admin/dashboard">Dashboard</a>
					<?php else: ?>
					<a href="<?= route('auth::login') ?>">Login</a>
					<?php endif; ?>
                    <a href="/api/docs">API</a>
                    <a href="https://laravel.com/docs" target="_blank">Laravel</a>
                </div>
				
            </div>
			
        </div>
		
    </body>
</html>