<p>To Verify Email <a href="{{ route('verify',["email"=>$user->email,"verifyToken"=>$user->verifyToken]) }}">Click Here</a></p>

<ul>
	<li>Username : {{ $user->email }}</li>
	<li>Password : {{ $password }}</li>
</ul>

