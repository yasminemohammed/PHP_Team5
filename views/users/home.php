<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>

<form action="http://<?php echo $_SERVER['HTTP_HOST'] . "/users/" . auth()?->getId() . "/orders" ?>" method="post">

    <label for="tea">tea: </label>
    <input type="number" id="tea" name="tea">
    <!--    <input type="number"  name="tea[]" value="">-->

    <br><br>

    <label for="tea">coffee: </label>
    <input type="number" id="coffee" name="coffee">

    <br><br>

    <label for="tea">Enab: </label>
    <input type="number" id="enab" name="enab">

    <br><br>

    <label for="notes">Notes: </label>
    <textarea name="notes" id="notes">tea is too much sugar</textarea>

    <br><br>

    <label for="roomNo">Room No: </label>
    <input type="number" id="roomNo" name="roomNo">
    <br><br>

    <button type="submit">submit</button>
</form>

</body>
</html>