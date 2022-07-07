<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<form id="cart-form" action="http://<?php echo $_SERVER['HTTP_HOST'] . "/users/" . auth()?->getId() . "/orders" ?>"
      method="post">

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


<script>
    $('#cart-form').submit(function (event) {
        event.preventDefault();

        let data = {
            "products": [
                {"product_id": 6, "quantity": 4, "price_per_unit": 5, "amount": 20},
                {"product_id": 5, "quantity": 2, "price_per_unit": 10, "amount": 20}
            ],
            "notes": "tea is too much sugar",
            "roomNo": 12,
            "amount": 40
        };

        let action = $('cart-form').action;
        $.post(action, data);
    });
</script>
</body>
</html>