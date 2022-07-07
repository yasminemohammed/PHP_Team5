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

<body>

<section style=" height:100% ;background-color: #D9AFD9;
        background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);">


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
    <h2 style="margin-left:50px;">orders</h2>

    <!-- tables -->
    <table class="table g-4" style="width:70% ; margin-left:60px">
        <thead>
        <tr>
            <th scope="col">Order Date</th>
            <th scope="col"> Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order?->order_date; ?></td>
                <td><?php echo $order?->getAmount(); ?></td>
            </tr>
            <tr>
                <table class="table g-4" style="width:70% ; margin-left:60px">
                    <tbody>
                    <tr>
                        <div class="d-flex flex-row bd-highlight mb-3 ml justify-content-center">
                            <?php foreach ($order?->getItems() as $item): ?>
                                <div class="p-4 border border-3 m-5">
                                    <div>
                                        <?php echo $item?->getName() ?>
                                    </div>
                                    <div>
                                        <?php echo "quantity: " . $item?->getQuantity() ?>
                                    </div>
                                    <div>
                                        <?php echo "price: " . $item?->getPrice() ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </tr>
                    </tbody>
                </table>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</body>
</html>
</section>
</body>
</html>
