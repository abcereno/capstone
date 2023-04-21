<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Link</title>
</head>
<body>
    <h2>Hello</h2>
    here is your password link <a href='http://localhost:3000/reset/{{ $data }}'>just click here</a>
    <h3>PIN CODE: </h3>
    <p>{{ $data }}</p>
</body>
</html>