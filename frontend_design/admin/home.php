<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .font{
            font-size:40px;
        }
        .font2{
            font-size:20px;
        }
        .button_color{
          background-color: #D9AFD9;

        }
        .width{
          width:60%
        }
        .align{
        margin-left:740px;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <section  style=" height:100% ;background-color: #D9AFD9;
        background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);">

      

      <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
                <div class="container-fluid ">
                    <a class="navbar-brand" href="#">Cafetria</a>
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
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







                <!-- add users form -->


                <div class="container py-5 h-100 " >
            <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 width">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5 font">Add Users</h3>
                    <hr>
                <form action="#" method="POST">

                    <!-- Name -->

                    <div class="form-outline mb-4">
                        <label for="validationCustom01" class="form-label font2">Name </label>
                        <input type="text" class="form-control form-control-lg " id="validationCustom01" required>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>


                        <!-- email -->


                    <div class="form-outline mb-4">
                    <label for="exampleDropdownFormEmail1" class="form-label font2">Email address</label>
                    <input type="email" class="form-control form-control-lg" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                    </div>


                    <!-- username -->
                    <div class="form-outline mb-4">
                    <label for="validationDefaultUsername" class="form-label font2">Username</label>
                    <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    <input type="text" class="form-control form-control-lg" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                    </div>         
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-4">
                    <label class="form-label font2" for="typePasswordX-2">Password</label>
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Enter Your User Name , Please"/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- confirm password -->
                    <div class="form-outline mb-4">
                    <label class="form-label font2" for="typePasswordX-2">Confirm Password</label>
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Password dosen't match !</div>
                    </div>

                    

                    <!-- Room No. -->

                <div class="form-outline mb-4">
                <label for="formGroupExampleInput" class="form-label font2">Room No.</label>
                <input type="number" class="form-control form-control-lg" id="formGroupExampleInput">
                </div>




                <!-- Ext. -->

                <div class="form-outline mb-4">
                <label for="formGroupExampleInput" class="form-label font2">Ext.</label>
                <input type="number" class="form-control form-control-lg" id="formGroupExampleInput">
                </div>

                
                
                
                <!-- Profile Picture -->

                <div class="form-outline mb-4">
                <label for="formGroupExampleInput" class="form-label font2">Profile Picture</label>
                <input class="form-control form-control-lg" id="formFileLg" type="file" />
            </div>
                

                    <button class="btn btn-lg btn-block button_color" type="submit">Login</button>

                </form>
                </div>
                </div>
            </div>
            </div>
        </div>




    </section>





</body>