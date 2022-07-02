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
       .a{
          text-decoration : none;
        }
        .align{
        margin-left:900px;
        }
      .img{
        width:50%;
      }
    </style>
  </head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <section class="vh-100" style="background-color: #D9AFD9;
        background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);">


        <!-- navbar -->


        <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
                <div class="container-fluid ">
                    <a class="navbar-brand" href="#">Cafetria</a>
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                    <i class="fas fa-bars"></i>
                    </button>
                

                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align">

                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="#">My Orders</a>
                        </li>

                     
                    </ul>
                    </div>
                
                </div>
                </nav>


                <!-- home -->




   <div class="container">

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
 
  <div class="col mb-4">
    <div class="card">
      <img src="../images/tea.png" class="card-img-top img m-5" alt="Tea">
      <div class="card-body">
        <h5 class="card-title text-center">Tea</h5>
        <p class="card-text text-center">

       <div class="price">
      <p>Price : $<span class="item_price">7</span></p>
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
      <input type="number" class="num" oninput="calc(0)" min="0" max="100" value="0" />
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
      <p>Price : $<span class="item_price">7</span></p>
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
    <img src="../images/milk.png" class="card-img-top img m-5" alt="milk">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text text-center">

      <div class="price">
      <p>Price : $<span class="item_price">7</span></p>
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
    <img src="../images/soda.png" class="card-img-top img m-5" alt="soda">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text text-center">

        <div class="price">
        <p>Price : $<span class="item_price">7</span></p>
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
</div>
  
  
 
           
    </section>

      <script>
        function calc(n) {
        var price = document.getElementsByClassName("item_price")[n].innerHTML;
        var numofitems = document.getElementsByClassName("num")[n].value;
        var total = parseFloat(price) * numofitems;
        if (!isNaN(total))
          document.getElementsByClassName("total")[n].innerHTML = total;
}
      </script>

</body>
