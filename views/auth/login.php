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

        }

        .a {
            text-decoration: none;
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

<section class="vh-100" style="background-color: #D9AFD9;
background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5 font">Sign in</h3>
                        <hr>
                        <form action="http://<?php echo $_SERVER['HTTP_HOST'] . "/login" ?>" method="POST">
                            <div class="form-outline mb-4">
                                <label for="validationDefaultUsername" class="form-label font2">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    <input type="text" class="form-control form-control-lg"
                                           id="validationDefaultUsername" name="username"
                                           aria-describedby="inputGroupPrepend2" required>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label font2" for="typePasswordX-2">Password</label>
                                <input type="password" name="password" id="typePasswordX-2"
                                       class="form-control form-control-lg"
                                       placeholder="Enter Your User Name , Please"/>
                            </div>
                            <button class="btn btn-lg btn-block button_color" type="submit">Login</button>
                            <br>
                            <br>
                            <div><a href="confirmpassword.php" class="a"> Forgot Password ?</a></div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>