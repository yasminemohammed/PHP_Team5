<html>
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
       .a{
          text-decoration : none;
        }
        .align{
        margin-left:700px;
        }
      .img{
        width:50%;
      }

      .wi{
        height:150px;
      }
      .mar{
        margin-top:18px;
      }
    
    </style>
  </head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <section style="height:100hv ; background-color: #D9AFD9;
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








   <!-- make order -->



   <div class="container">

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
 
  <div class="col mb-4">
    <div class="card">
      <img src="../images/tea.png" class="card-img-top img m-5" alt="Tea">
      <div class="card-body">
        <h5 class="card-title text-center">Tea</h5>
        <p class="card-text text-center">

       <div class="price">
      <p>Price : $<span class="item_price">5</span></p>
      <p>Subtotal : <b>$<span class="total">0</span></b></p>
    </div>
    <div class="quantity">
      <span>quantity : </span>
      <input type="number" class="num" oninput="calc(0)" min="0" max="100" value="0" />
    </div>

        </p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../images/coffee.png" class="card-img-top img m-5" alt="Coffee">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text text-center">

      <div class="price">
      <p>Price : $<span class="item_price">7</span></p>
      <p>Subtotal : <b>$<span class="total">0</span></b></p>
      </div>
      <div class="quantity">
      <span>quantity : </span>
      <input type="number" class="num" oninput="calc(1)" min="0" max="100" value="0" />
      </div>

      </p>      
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../images/drink.png" class="card-img-top img m-5" alt="drink">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text text-center">

      <div class="price">
      <p>Price : $<span class="item_price">8</span></p>
      <p>Subtotal : <b>$<span class="total">0</span></b></p>
      </div>
      <div class="quantity">
      <span>quantity : </span>
      <input type="number" class="num" oninput="calc(2)" min="0" max="100" value="0" />
      </div>

      </p>     
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../images/milk.png" class="card-img-top img m-5" alt="milk">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text text-center">

      <div class="price">
      <p>Price : $<span class="item_price">10</span></p>
      <p>Subtotal : <b>$<span class="total">0</span></b></p>
      </div>
      <div class="quantity">
      <span>quantity : </span>
      <input type="number" class="num" oninput="calc(3)" min="0" max="100" value="0" />
      </div>

      </p>     
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../images/soda.png" class="card-img-top img m-5" alt="soda">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text text-center">

        <div class="price">
        <p>Price : $<span class="item_price">15</span></p>
        <p>Subtotal : <b>$<span class="total">0</span></b></p>
        </div>
        <div class="quantity">
        <span>quantity : </span>
        <input type="number" class="num" oninput="calc(4)" min="0" max="100" value="0" />
        </div>

        </p>    
          </div>
    </div>
  </div>
</div>




        <!-- details -->


        <div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Notes : </h5>
        <p class="card-text">

        <div class="mb-3">
    <textarea class="form-control " id="validationTextarea"></textarea>
  </div>

        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Room</h5>
        <p class="card-text">

        <select class="form-select" aria-label="Default select example">
        <option selected></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>


        </p>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total</h5>
        <p class="card-text">
        



        </p>
        <a href="#" class="btn btn-primary">Confirm</a>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>

    </section>

      <script>

        function calc(n) {
        let price = document.getElementsByClassName("item_price")[n].innerHTML;
        let numofitems = document.getElementsByClassName("num")[n].value;
        let total = parseFloat(price) * numofitems;
        if (!isNaN(total))
          document.getElementsByClassName("total")[n].innerHTML = total;
}







      </script>

</body>
</html>