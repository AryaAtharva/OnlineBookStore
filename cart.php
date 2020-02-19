<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>StoryStack</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/styles.css" media="all">
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h1 class="display-4">StoryStack</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="all_books.php">All Books</a>
            </li>
             <li class="nav-item">
                <a class="nav-link">
                  <?php
                    if(!isset($_SESSION['customer_email']))
                    {
                        echo "Welcome user";
                    }
                    else   
                    {
                        $f=$_SESSION['customer_email'];
                        echo "Welcome:".$f;
                    }
                    
                    ?></a>
            </li>
            <li class="nav-item">
               <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Shopping Cart
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class='dropdown-item' href='cart.php'>Go to Cart</a>
         <?php
    if(!isset($_SESSION['customer_email']))
    {
        echo"<a href='checkout.php' class='dropdown-item'>Login</a>";
    }
      else
      {
          echo"<a href='logout.php' class='dropdown-item'>Logout</a>";
      }
    ?>
  </div>
            </li>
           
    
        </ul>
        <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Categories
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php
      get_catg();
      ?>
  </div>
</div>
        <form class="form-inline" method="get" enctype="multipart/form-data" action="result.php">
        <input class="form-control mr-sm-2" type="text" placeholder="search" aria-label="search" name="user_query">
            <input class="btn btn-dark my-sm-0" type="submit" name="Search" value="Search">
        </form>
    </div>
    
</div>
</nav>
<!--jumbotron-->
<div class="container-fluid" >
<div class="row jumbotron">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" >
        <p class="lead" style="text-align:center;">
            <?php quotes(); ?>
        </p>
    </div> 
</div>
</div>
    
<!--product list-->

<div class='container-fluid bg-light'>
    <h1 class="displa-1" align="center">My Cart</h1>
    <?php
    cart();
    ?>
    <form action="" enctype="multipart/form-data" method="post">
       
    <table class="table">
  <thead>
    <tr align="center">
      <th scope="col">Remove</th>
      <th scope="col">Book(s)</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
        <?php
         $total=0;
    
    global $conn;
    $ip=getIp();
    $sel_price ="Select * from cart where ip_add='$ip'";
    $run_price = mysqli_query($conn, $sel_price);
    while($p_price=mysqli_fetch_array($run_price))
    {
        $pro_id =$p_price['b_id'];
        $pro_price="select * from books where book_id='$pro_id'";
        $run_pro_price=mysqli_query($conn, $pro_price);
        while($pp_price=mysqli_fetch_array($run_pro_price))
        {
        $product_price=array($pp_price['book_price']);
            $product_title=$pp_price['book_title'];
            $product_image=$pp_price['book_image'];
            $single_price=$pp_price['book_price'];
            $values=array_sum($product_price);
            $total+=$values;

        ?>
  <tbody>
    <tr align="center">
      <th scope="row"><a href="delete.php?book_id=<?php echo $pro_id;?>" style="color:red;">Delete</a></th>
      <td><?php echo $product_title; ?><br>
        <img src="admin/product_pics/<?php echo $product_image; ?>" width="50px" height="50px">
        </td>
      <td>1</td>
      <td>Rs.<?php echo $single_price;  ?></td>
    </tr>
  
        <?php
        } 
    }
        ?>
      <tr align="center">
          <th><a href="index.php"><button type="button" class="btn btn-outline-info"> Continue Shopping </button></a>
          </th>
        <td></td>
        <td></td>
        <td>Subtotal: Rs.<?php echo $total ?><br>
            <a href="checkout.php"><button type="button" class="btn btn-outline-info">Proceed to Checkout -></button></a>
          
          </td>
      </tr>
        </tbody>
</table>
    </form>
</div>
    <section class="footer bg-dark container-fluid">
    <div class="container-fluid text-center">
        <div class="row">
        <div class="col">
            <h2>Useful Links</h2>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="privacypolicy.html">Privacy Policy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Terms of Condition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
        </ul>
            </div>
        </div>
        </div>
    
    </section>
</body>
</html>
