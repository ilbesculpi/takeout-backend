@extends('auth.layouts.app')

@section('title', 'Create new account')

@section('content')
<div class="box">
	
	<div class="box-header">
		<div class="box-title"><h2>Create a new account</h2></div>
	</div>
	
	<div class="box-body">

		<form method="post" role="form">

			<?= csrf_field() ?>

			<div class="form-group form-group-lg has-feedback">
				<input type="text" name="name" class="form-control" value="<?= old('name') ?>" placeholder="Your Name" required>
			</div>
			
			<div class="form-group form-group-lg has-feedback">
				<input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Your Email" required>
			</div>

			<div class="form-group form-group-lg has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			
			<div class="form-group form-group-lg has-feedback">
				<input type="password" name="passwordConfirm" class="form-control" placeholder="Confirm Password">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Create Account</button>
			</div>

		</form>
		
	</div>
	
</div>
@endsection
