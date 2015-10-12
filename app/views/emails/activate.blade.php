<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h2>Account activation</h2>

	<p>Thank you for creating an account.
		Please follow the link below to confirm your email address:</p>
	<p>{{ URL::to('activate/' . $confirmation_token) }}</p>
</body>
</html>