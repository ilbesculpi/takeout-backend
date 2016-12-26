@extends('auth.layouts.app')

@section('title', 'Sign In')

@section('content')
<div class="box">
	
	<div class="box-header">
		<div class="box-title"><h2>Please sign in</h2></div>
	</div>
	
	<div class="box-body">

		<form method="post" role="form">

			<?= csrf_field() ?>

			<div class="form-group form-group-lg has-feedback">
				<input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Email" required>
			</div>

			<div class="form-group form-group-lg has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>

			<div class="form-group">
				<div class="checkbox icheck">
					<label>
						<input type="checkbox"> Remember Me
					</label>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			</div>

		</form>

		<div>
			<label>New user? </label>
			<a href="<?= route('auth::register') ?>">Create new account</a>
		</div>
		<div>
			<label>Forgot your password?</label>
			<a href="<?= route('auth::forgot') ?>" class="text-center">resset password</a>
		</div>

	</div>
	
</div>
@endsection
