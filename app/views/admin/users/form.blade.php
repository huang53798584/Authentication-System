<div class="form-group">
	{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
	<div class="col-sm-4">
		{{ Form::text('email', null, array('placeholder' => 'email address', 'class' => 'form-control')) }}
	</div>
	<div class="col-sm-5">
		{{ $errors->first('email') }}
	</div>
</div>

<div class="form-group">
	{{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
	<div class="col-sm-4">
		{{ Form::password('password', array('placeholder' => 'password', 'class' =>'form-control')) }}
		@if(isset($user))
			<span class="help-block">Leave blank to keep current password</span>
		@endif
	</div>
	<div class="col-sm-5">
		{{ $errors->first('password') }}
	</div>
</div>

<div class="form-group">
	{{ Form::label('password_confirmation', 'Confirm password', array('class' => 'col-sm-3 control-label')) }}
	<div class="col-sm-4">
		{{ Form::password('password_confirmation', array('placeholder' => 'repeat password', 'class' =>'form-control')) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-3 col-sm-9">
		@if(isset($user) && (Auth::user()->id == $user->id))
			{{ Form::checkbox('is_admin', 1, true, array('disabled' => 'disabled')) }}
			{{ Form::hidden('is_admin', 1) }}
			{{ Form::label('is_admin', 'Administrator') }}
		@else
			{{ Form::checkbox('is_admin', 1, Input::old('is_admin'), array('id' => 'is_admin')) }}
			{{ Form::label('is_admin', 'Administrator') }}
		@endif
	</div>
</div>
