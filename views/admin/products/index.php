<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .font {
            font-size: 40px;
        }

        .font2 {
            font-size: 20px;
        }

        .button_color {
            background-color: #D9AFD9;
            margin-left: 200px;

        }

        .width {
            width: 60%
        }

        .align {
            margin-left: 740px;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>


<section style="height:100vh ; background-color: #D9AFD9;
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

                </ul>
            </div>

        </div>
    </nav>


    <!-- products table  -->
    <h2 style="margin-left:50px;">All Products</h2>


    <table class="table" style="width:70%; margin-left:200px; margin-top:50px;">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <th scope="row"><?php echo $product?->getId() ?></th>
                <td><?php echo $product?->getName(); ?></td>
                <td><?php echo $product?->getPrice() ?></td>
                <td><img src="<?php echo $product?->getFeatureImage() ?>"></td>
                <td class="d-flex flex-row justify-content-evenly">
                    <span><?php echo $product?->isAvailable() ? "Available" : "Unavailable" ?></span>
                    <form action="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/products/" . $product?->getId(); ?>"
                          method="post">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <a href="#" id="delete"
                           onclick="event.preventDefault(); event.target.closest('form').submit()">Delete</a>
                    </form>
                    <div>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/products/" . $product?->getId() . "/edit"; ?>"
                           id="edit"">Edit</a></div>
                </td>
            </tr>
        <?php endforeach; ?>


        </tbody>
    </table>

    <a class="btn btn-lg btn-block button_color"
       href="http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/products/create"; ?>">Add Product</a>


</section>


</body>
</html>


