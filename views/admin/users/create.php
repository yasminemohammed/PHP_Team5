<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="http://<?php echo $_SERVER['HTTP_HOST'] ?>/admin/users" method="post" enctype="multipart/form-data">

    <label for="firstName">first name: </label>
    <input type="text" id="firstName" name="firstName">

    <br><br>

    <label for="lastName">last name: </label>
    <input type="text" id="lastName" name="lastName">

    <br><br>

    <label for="email">email: </label>
    <input type="email" id="email" name="email">

    <br><br>

    <label for="username">Username: </label>
    <input type="text" id="username" name="username">

    <br><br>

    <label for="password">password: </label>
    <input type="password" id="password" name="password">
    <br><br>

    <label for="password_confirm">password confirm: </label>
    <input type="password" id="password_confirm" name="password_confirm">
    <br><br>

    <label for="roomNo">Room No: </label>
    <input type="number" id="roomNo" name="roomNo">
    <br><br>

    <label for="ext">Ext.: </label>
    <input type="text" id="ext" name="ext">
    <br><br>

    <label for="avatar">profile picture: </label>
    <input type="file" id="avatar" name="avatar">

    <button type="submit">submit</button>
</form>

</body>
</html>
