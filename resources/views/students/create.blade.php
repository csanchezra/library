@extends('login.index')

@section('content')

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset1">
					<form class="form-vertical" action="{{ URL::route('student-store') }}" method="POST">
						@csrf
						<div class="module-head">
							<h3>Student Registration Form</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span6" type="text" placeholder="First Name" name="first_name" value="{{ Request::old('first_name') }}" />
									<input class="span6" type="text" placeholder="Last Name" name="last_name" value="{{ Request::old('last_name') }}" />

									@if($errors->has('first'))
										{{ $errors->first('first')}}
									@endif
									@if($errors->has('last'))
										{{ $errors->first('last')}}
									@endif
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span4" type="number" placeholder="Roll number" name="roll_num" value="{{ Request::old('roll_num') }}" />
									<select class="span4" style="margin-bottom: 0;" name="branch">
										<option value="0">select branch</option>
										@foreach($branch_list as $branch)
					                        <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
					                    @endforeach
									</select>
									<input class="span4" type="number" placeholder="Year" name="year" value="{{ Request::old('year') }}" />

									@if($errors->has('roll_num'))
										{{ $errors->first('roll_num')}}
									@endif
									@if($errors->has('branch'))
										{{ $errors->first('branch')}}
									@endif
									@if($errors->has('year'))
										{{ $errors->first('year')}}
									@endif

								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span8" type="email" placeholder="E-mail" name="email_id" autocomplete="false" value="{{ Request::old('email_id') }}" />
									<select class="span4" style="margin-bottom: 0;" name="category">
										<option value="0">select category</option>
										@foreach($student_categories_list as $student_category)
					                        <option value="{{ $student_category->cat_id }}">{{ $student_category->category }}</option>
					                    @endforeach
									</select>

									@if($errors->has('email_id'))
										{{ $errors->first('email_id')}}
									@endif
									@if($errors->has('category'))
										{{ $errors->first('category')}}
									@endif
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-info pull-right">Register for Library</button>
									@csrf
								</div>
							</div>
							<a href="{{ URL::route('login') }}">Go Back!</a>
						</div>
			</div>
		</div>


	</div>
	{{-- @include('account.style') --}}
@stop
