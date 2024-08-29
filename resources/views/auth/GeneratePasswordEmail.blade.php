<!DOCTYPE html>
<html>
<head>
    <title>Automatic Generate Password Email</title>
</head>
<body>
    <h1>Hello, {{ $name }}</h1>
    <p>Your email is: {{ $email }}</p>
    <p>Your generated password is: {{ $password }}</p>
    <p>Expired date: {{ $expired_at }}</p>

    <p>Please use this password to access your account.</p>
    <br>
    on this link: <a href="http://127.0.0.1:8000/login">Login.</a>

</body>
</html>