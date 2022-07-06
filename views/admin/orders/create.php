<<<<<<< HEAD
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Home</title>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<form id="cart-form" action="http://--><?php //echo $_SERVER['HTTP_HOST'] . "admin/orders/" ?><!--" method="post">-->
<!---->
<!--    <label for="users">users</label>-->
<!--    <select id="users" name="customer_id">-->
<!--        --><?php //foreach ($users as $user): ?>
<!--            <option value="--><?php //echo $user?->getId(); ?><!--"> --><?php //echo $user?->getFirstName() . " " . $user?->getLastName(); ?><!--</option>-->
<!--        --><?php //endforeach; ?>
<!--    </select>-->
<!--    <br> <br>-->
<!--    <label for="tea">tea: </label>-->
<!--    <input type="number" id="tea" name="tea">-->
<!---->
<!--    <br><br>-->
<!---->
<!--    <label for="tea">coffee: </label>-->
<!--    <input type="number" id="coffee" name="coffee">-->
<!---->
<!--    <br><br>-->
<!---->
<!--    <label for="tea">Enab: </label>-->
<!--    <input type="number" id="enab" name="enab">-->
<!---->
<!--    <br><br>-->
<!---->
<!--    <label for="notes">Notes: </label>-->
<!--    <textarea name="notes" id="notes">tea is too much sugar</textarea>-->
<!---->
<!--    <br><br>-->
<!---->
<!--    <label for="roomNo">Room No: </label>-->
<!--    <input type="number" id="roomNo" name="roomNo">-->
<!--    <br><br>-->
<!---->
<!--    <button type="submit">submit</button>-->
<!--</form>-->
<!---->
<!---->
<!--<script>-->
<!--    $('#cart-form').submit(function (event) {-->
<!--        event.preventDefault();-->
<!---->
<!--        let data = {-->
<!--            "customer_id": 1,-->
<!--            "products": [-->
<!--                {"product_id": 6, "quantity": 4, "price_per_unit": 5, "amount": 20},-->
<!--                {"product_id": 5, "quantity": 2, "price_per_unit": 10, "amount": 20}-->
<!--            ],-->
<!--            "notes": "tea is too much sugar",-->
<!--            "roomNo": 12,-->
<!--            "amount": 40-->
<!--        };-->
<!---->
<!--        $.post("/admin/orders", data);-->
<!--    });-->
<!--</script>-->
<!--</body>-->
<!--</html>-->


<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../../../frontend_design/CSS/style.css"/>

    <style>
        .font {
            font-size: 40px;
        }

        .font2 {
            font-size: 20px;
        }

        .button_color {
            background-color: #D9AFD9;

        }

        .a {
            text-decoration: none;
        }

        .align {
            margin-left: 700px;
        }

        .img {
            width: 50%;
        }

        .wi {
            height: 150px;
        }

        .mar {
            margin-top: 18px;
        }


        .container {
            font-family: 'Open Sans', sans-serif;
            margin: 0 auto;
            width: 980px;
        }

        #cart {
            width: 100%;
        }

        #cart h1 {
            font-weight: 300;
        }


        #cart a:hover {
            color: #000;
        }

        .product.removed {
            margin-left: 980px !important;
            opacity: 0;
        }

        .product {
            border: 1px solid #eee;
            margin: 20px 0;
            width: 100%;
            height: 195px;
            position: relative;
        }

        .product img {
            width: 100%;
            height: 100%;
        }

        .product header, .product .content {
            background-color: #fff;
            border: 1px solid #ccc;
            border-style: none none solid none;
            float: left;
        }

        .product header {
            margin: 0 1% 20px 0;
            overflow: hidden;
            padding: 0;
            position: relative;
            width: 24%;
            height: 195px;
        }


        .product header:hover h3 {
            bottom: 73px;
        }

        .product header h3 {
            background: #D9AFD9;
            color: #fff;
            font-size: 22px;
            font-weight: 300;
            line-height: 49px;
            margin: 0;
            padding: 0 30px;
            position: absolute;
            bottom: -50px;
            right: 0;
            left: 0;

            -webkit-transition: bottom .2s linear;
            -moz-transition: bottom .2s linear;
            -ms-transition: bottom .2s linear;
            -o-transition: bottom .2s linear;
            transition: bottom .2s linear;
        }

        .remove {
            cursor: pointer;
        }

        .product .content {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 140px;
            padding: 0 20px;
            width: 75%;
        }

        .product h1 {
            color: #D9AFD9;
            font-size: 25px;
            font-weight: 300;
            margin: 17px 0 20px 0;
        }

        .product footer.content {
            height: 50px;
            margin: 6px 0 0 0;
            padding: 0;
        }

        .product footer .price {
            background: #fcfcfc;
            color: #000;
            float: right;
            font-size: 15px;
            font-weight: 300;
            line-height: 49px;
            margin: 0;
            padding: 0 30px;
        }

        .product footer .full-price {
            background: #D9AFD9;
            color: #fff;
            float: right;
            font-size: 22px;
            font-weight: 300;
            line-height: 49px;
            margin: 0;
            padding: 0 30px;

            -webkit-transition: margin .15s linear;
            -moz-transition: margin .15s linear;
            -ms-transition: margin .15s linear;
            -o-transition: margin .15s linear;
            transition: margin .15s linear;
        }

        .qt, .qt-plus, .qt-minus {
            display: block;
            float: left;
        }

        .qt {
            font-size: 19px;
            line-height: 50px;
            width: 70px;
            text-align: center;
        }

        .qt-plus, .qt-minus {
            background: #fcfcfc;
            border: none;
            font-size: 30px;
            font-weight: 300;
            height: 100%;
            padding: 0 20px;

        }

        .qt-plus:hover, .qt-minus:hover {
            background: #D9AFD9;
            color: #fff;
            cursor: pointer;
        }

        .qt-plus {
            line-height: 50px;
        }

        .qt-minus {
            line-height: 47px;
        }


        .right {
            float: right;
        }

        .btn {
            background: #D9AFD9;
            border: 1px solid #999;
            border-style: none none solid none;
            display: block;
            color: #fff;
            font-size: 20px;
            font-weight: 300;
            padding: 16px 0;
            width: 290px;
            text-align: center;
        }


    </style>
</head>
<body style="height:100%; background-color: #D9AFD9;
        background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">Cafetria</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>


            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Products.php">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Users.php">Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Manual Orders.php">Manual Orders</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Checks.php">Checks</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>


    <!-- products -->

    <div class="container">

        <section id="cart">

            <?php foreach ($products as $product): ?>
                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="/assets/images/tea.png">

                            <h3>Remove product</h3>
                        </a>
                    </header>

                    <div class="content">

                        <h1><?php echo $product->getName(); ?></h1>
                    </div>

                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">0</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">
                            0 EGP
                        </h2>

                        <h2 class="price">
                            <?php echo $product->getPrice(); ?> EGP
                        </h2>
                    </footer>
                </article>
            <?php endforeach; ?>

        </section>

    </div>

    <footer id="site-footer">
        <div class="container clearfix">


            <div class="right">
                <h1 class="total">Total: <span>0</span> EGP</h1>
                <a class="btn">Checkout</a>
            </div>

        </div>
    </footer>
</section>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>

    let check = false;

    function changeVal(el) {
        var qt = parseFloat(el.parent().children(".qt").html());
        var price = parseFloat(el.parent().children(".price").html());
        var eq = Math.round(price * qt * 100) / 100;

        el.parent().children(".full-price").html(eq + " EGP");

        changeTotal();
    }

    function changeTotal() {

        var price = 0;

        $(".full-price").each(function (index) {
            price += parseFloat($(".full-price").eq(index).html());
        });

        price = Math.round(price * 100) / 100;
        var fullPrice = Math.round((price) * 100) / 100;

        if (price == 0) {
            fullPrice = 0;
        }

        $(".subtotal span").html(price);
        $(".total span").html(fullPrice);
    }

    $(document).ready(function () {


        $(".qt-plus").click(function () {
            $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);

            $(this).parent().children(".full-price").addClass("added");

            var el = $(this);
            window.setTimeout(function () {
                el.parent().children(".full-price").removeClass("added");
                changeVal(el);
            }, 150);
        });

        $(".qt-minus").click(function () {

            child = $(this).parent().children(".qt");

            if (parseInt(child.html()) > 1) {
                child.html(parseInt(child.html()) - 1);
            }

            $(this).parent().children(".full-price").addClass("minused");

            var el = $(this);
            window.setTimeout(function () {
                el.parent().children(".full-price").removeClass("minused");
                changeVal(el);
            }, 150);
        });

        window.setTimeout(function () {
            $(".is-open").removeClass("is-open")
        }, 1200);

        $(".btn").click(function () {
            check = true;
            $(".remove").click();
        });
    });

=======
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

<form id="cart-form" action="http://<?php echo $_SERVER['HTTP_HOST'] . "admin/orders/" ?>" method="post">

    <label for="users">users</label>
    <select id="users" name="customer_id">
        <?php foreach ($users as $user): ?>
            <option value="<?php echo $user?->getId(); ?>"> <?php echo $user?->getFirstName() . " " . $user?->getLastName(); ?></option>
        <?php endforeach; ?>
    </select>
    <br> <br>
    <label for="tea">tea: </label>
    <input type="number" id="tea" name="tea">

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
>>>>>>> [add-feature] Admin can create a manual order for a specific user.
    $('#cart-form').submit(function (event) {
        event.preventDefault();

        let data = {
            "customer_id": 1,
            "products": [
                {"product_id": 6, "quantity": 4, "price_per_unit": 5, "amount": 20},
                {"product_id": 5, "quantity": 2, "price_per_unit": 10, "amount": 20}
            ],
            "notes": "tea is too much sugar",
            "roomNo": 12,
            "amount": 40
        };

        $.post("/admin/orders", data);
    });
</script>
<<<<<<< HEAD

=======
>>>>>>> [add-feature] Admin can create a manual order for a specific user.
</body>
</html>