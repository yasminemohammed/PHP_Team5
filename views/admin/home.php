<html>
<head>
    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .button_color {
            background-color: #D9AFD9;

        }

        .font {
            font-size: 40px;
        }

        .font2 {
            font-size: 20px;
        }

        .button_color {
            background-color: #D9AFD9;

        }

        .width {
            width: 60%
        }

        .align {
            margin-left: 740px;
        }
    </style>
</head>
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form {
        font-family: Arial, Helvetica, sans-serif;
        color: black
    }

    .bootstrap-iso form button, .bootstrap-iso form button:hover {
        color: white !important;
    }

    .asteriskField {
        color: red;
    }</style>

<body style="background-color: #D9AFD9;
        background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);">

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
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/products" ?>">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/users" ?>">Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/orders/create" ?>">Manual
                            Orders</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/orders" ?>">Checks</a>
                    </li>
            </div>

        </div>
    </nav>
    <h2 style="margin-left:50px;">orders</h2>

    <!-- tables -->
    <?php $orderIsExist = false; ?>
    <?php foreach ($users as $user): ?>
        <?php foreach ($user->getOrders() as $order): ?>
            <?php if ($order->getStatus() != "done"): ?>
                <?php $orderIsExist = true; ?>
                <table class="table g-4" style="width:70% ; margin-left:60px">
                    <thead>
                    <tr>
                        <th scope="col">Order Date</th>
                        <th scope="col"> Name</th>
                        <th scope="col"> Room</th>
                        <th scope="col"> Ext</th>
                        <th scope="col"> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $order?->order_date; ?></td>
                        <td><?php echo $user->getFirstName() . " " . $user->getLastName(); ?></td>
                        <td><?php echo $user->getRoomNo(); ?></td>
                        <td><?php echo $user->getExt(); ?></td>
                        <td>
                            <?php if ($order->getStatus() == "processing"): ?>
                                <form action="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/orders/" . $order?->getId() . "/deliver"; ?>"
                                      method="post">
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <a href="#" id="deliver"
                                       onclick="event.preventDefault(); event.target.closest('form').submit()">Deliver</a>
                                </form
                            <?php endif; ?>

                            <?php if ($order->getStatus() == "out for delivery"): ?>
                                <form action="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/orders/" . $order?->getId() . "/done"; ?>"
                                      method="post">
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <a href="#" id="done"
                                       onclick="event.preventDefault(); event.target.closest('form').submit()">Mark
                                        Done</a>
                                </form
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="row g-0 col-12 justify-content-center">
                            <?php foreach ($order->getItems() as $item): ?>
                                <div class="text-center border border-2 p-3 m-3" style="width: 8rem">
                                    <div class="my-2"><?php echo $item->getName(); ?></div>
                                    <div class="my-2"><?php echo "price:" . $item->getPrice(); ?></div>
                                    <div class="my-2"><?php echo "quantity: " . $item->getQuantity(); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </td>
                        <td colspan="3" style="position: relative">
                            <div class="text-center h6"
                                 style="width: 6rem; position: absolute; bottom: 1rem"><?php echo "Total: " . $order->getAmount(); ?></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <?php if (!$orderIsExist): ?>
        <h1 class="text-center" style="margin-top: 10rem">There are no orders at moment.</h1>
    <?php endif; ?>

</section>
</body>
</html>