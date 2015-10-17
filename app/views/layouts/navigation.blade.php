<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			{{ HTML::linkRoute('home', 'Home', null, array('class' => 'navbar-brand')) }}
		</div>

		<div>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					@if(Auth::user()->is_admin)
						<li>{{ HTML::link('admin/users', 'User admin') }}</li>
					@endif
					<li>{{ HTML::link('profile', 'Profile') }}</li>
					<li>{{ HTML::link('logout', 'Logout') }}</li>
				@else
					<li>{{ HTML::link('signup', 'Sign up') }}</li>
					<li>{{ HTML::link('login', 'Login') }}</li>
				@endif
			</ul>
		</div>
	</div>
</nav>