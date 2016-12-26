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


@section('nocontent')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
