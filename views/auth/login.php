<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'] . "/login" ?>" method="post">

    <label for="username">Username: </label>
    <input type="text" id="username" name="username">

    <br><br>

    <label for="password">password: </label>
    <input type="password" id="password" name="password">

    <br><br>

    <button type="submit">submit</button>
</form>

</body>
</html>
