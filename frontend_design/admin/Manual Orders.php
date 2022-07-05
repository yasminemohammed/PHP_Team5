<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css"/>

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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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



          

          <!-- products -->

          <div class="container">

<section id="cart"> 
  <article class="product">
    <header>
      <a class="remove">
        <img src="../images/tea.png">

        <h3>Remove product</h3>
      </a>
    </header>

    <div class="content">

      <h1>TEA</h1>
    </div>

    <footer class="content">
      <span class="qt-minus">-</span>
      <span class="qt">0</span>
      <span class="qt-plus">+</span>

      <h2 class="full-price">
        0 EGP
      </h2>

      <h2 class="price">
        5 EGP
      </h2>
    </footer>
  </article>

  <article class="product">
    <header>
      <a class="remove">
                <img src="../images/coffee.png">

        <h3>Remove product</h3>
      </a>
    </header>

    <div class="content">

      <h1>COFFEE</h1>
      
    </div>

    <footer class="content">
      
      <span class="qt-minus">-</span>
      <span class="qt">0</span>
      <span class="qt-plus">+</span>

      <h2 class="full-price">
        0 EGP
      </h2>

      <h2 class="price">
        10 EGP
      </h2>
    </footer>
  </article>

  <article class="product">
    <header>
      <a class="remove">
                <img src="../images/drink.png">

        <h3>Remove product</h3>
      </a>
    </header>

    <div class="content">

      <h1>DRINK</h1>
    </div>

    <footer class="content">
      
      <span class="qt-minus">-</span>
      <span class="qt">0</span>
      <span class="qt-plus">+</span>

      <h2 class="full-price">
        0 EGP
      </h2>

      <h2 class="price">
        15 EGP
      </h2>
    </footer>
  </article>

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
</main>

  

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>

let check = false;

function changeVal(el) {
var qt = parseFloat(el.parent().children(".qt").html());
var price = parseFloat(el.parent().children(".price").html());
var eq = Math.round(price * qt * 100) / 100;

el.parent().children(".full-price").html( eq + " EGP" );

changeTotal();			
}

function changeTotal() {

var price = 0;

$(".full-price").each(function(index){
price += parseFloat($(".full-price").eq(index).html());
});

price = Math.round(price * 100) / 100;
var fullPrice = Math.round((price) *100) / 100;

if(price == 0) {
fullPrice = 0;
}

$(".subtotal span").html(price);
$(".total span").html(fullPrice);
}

$(document).ready(function(){


$(".qt-plus").click(function(){
$(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);

$(this).parent().children(".full-price").addClass("added");

var el = $(this);
window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);
});

$(".qt-minus").click(function(){

child = $(this).parent().children(".qt");

if(parseInt(child.html()) > 1) {
  child.html(parseInt(child.html()) - 1);
}

$(this).parent().children(".full-price").addClass("minused");

var el = $(this);
window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);
});

window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);

$(".btn").click(function(){
check = true;
$(".remove").click();
});
});
</script> 


          


</body>
</html>