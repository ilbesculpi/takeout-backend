@extends('auth.layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="box">
	
	<div class="box-header">
		<div class="box-title"><h2>Forgot your password?</h2></div>
	</div>
	
	<div class="box-body">

		<form method="post" role="form">

			<?= csrf_field() ?>

			<div class="form-group form-group-lg has-feedback">
				<input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Email" required>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
			</div>

		</form>

		<div>
			<label>Have an account?</label>
			<a href="<?= route('auth::login') ?>" class="text-center">Sign in</a>
		</div>

	</div>
	
</div>
@endsection
