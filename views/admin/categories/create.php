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
<h1>create New Category </h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'] ?>/admin/categories" method="post">

    <label for="name"> name: </label>
    <input type="text" id="name" name="name">

    <br><br>

    <button type="submit">submit</button>
</form>
</body>
</html>
