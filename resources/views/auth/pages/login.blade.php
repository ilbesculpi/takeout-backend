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
			<a href="register">Create new account</a>
		</div>
		<div>
			<label>Forgot your password?</label>
			<a href="register.html" class="text-center">resset password</a>
		</div>

	</div>
	
</div>
@endsection

@section('nocontent')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
