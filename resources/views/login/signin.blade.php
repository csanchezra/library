@extends('login.index')

@section('content')

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset1">
					<form class="form-vertical" action="{{ URL::route('login-sign-in-post') }}" method="POST">
					{{-- <form class="form-vertical"  method="POST"> --}}

						@csrf
						<div class="module-head">
							<h3>Librarian / Admin Sign In</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" name="username" placeholder="Username" value="{{ Request::old('login') }}" autofocus>
									@if($errors->has('username'))
										{{ $errors->first('username')}}
									@endif
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password" placeholder="Password">
									@if($errors->has('password'))
										{{ $errors->first('password')}}
									@endif
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Login</button>
									<label class="checkbox">
										<input type="checkbox" name="remember" id="remember"> Remember me
									</label>
								</div>
							</div>
							{{-- <a href="{{ URL::route('account-create') }}">New librarian? Sign Up</a> --}}
							<a href="{{ URL::route('user-new') }}">New librarian? Sign Up</a>

						</div>
					</form>
				</div>
				<div class="module module-login span4 offset2">
					<div class="module-head">
						<h3>Student Section</h3>
					</div>
					<div class="module-body">
						<p><a href="{{ URL::route('student-new') }}"><strong>Student Registration Form</strong></a></p>
						<p><a href=""><strong>Search Book</strong></a></p>


					</div>
				</div>

			</div>
		</div>


	</div>
	{{-- @include('account.style') --}}
@stop
