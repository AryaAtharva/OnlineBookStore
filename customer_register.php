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
                <a class="nav-link"> <?php
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
        echo"<a class='dropdown-item' href='checkout.php' class='dropdown-item'>Login</a>";
    }
      else
      {
          echo"<a class='dropdown-item' href='logout.php' class='dropdown-item'>Logout</a>";
      }
    ?>
      <a class='dropdown-item disabled' href='#'>Total Items: <?php totalItems() ?></a>
      <a class='dropdown-item disabled' href='#'>Total Price:<?php totalPrice() ?></a>
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
    
<!--Form-->

<div class='container-fluid bg-light'>
 
    <div class="col-sm-12" style="padding-bottom:20px;">
    <form method="post" enctype="multipart/form-data" action="customer_register.php">
  
        <div class="form-group">
    <label for="text">Name:</label>
    <input name="c_name" type="text" class="form-control"  placeholder="Enter name" required>
  </div>
        
        <div class="form-group">
    <label for="text">Email:</label>
    <input name="c_email" type="text" class="form-control"  placeholder="Enter email" required>
  </div>
        <div class="form-group">
    <label for="text">Password:</label>
    <input name="c_pass" type="text" class="form-control"  placeholder="Enter password" required>
  </div>
        
   <div class="form-group">
  <label for="text">State:</label>
  <select class="form-control" name="c_state" required>
      <option value="">------------Select State------------</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
  </select>
</div>
        
        
         <div class="form-group">
    <label for="text">City:</label>
    <input name="c_city" type="text" class="form-control"  placeholder="Enter City" required>
  </div>
        
           <div class="form-group">
    <label for="text" >Contact:</label>
    <input name="c_contact" type="text" class="form-control"  placeholder="Enter Contact" required>
  </div>
        
        <div class="form-group">
    <label >Image:</label>
    <input type="file" class="form-control-file border" name="c_image" required>
  </div>
       
        <div class="form-group">
    <label for="text" >Address:</label>
    <input name="c_address" type="text" class="form-control"   placeholder="Enter Address" required>
  </div>
        

<input name="register" type="submit" class="btn btn-primary" value="Create Account">
</form>
</div>
    
</div>
    <?php
    global $conn;
    if(isset($_POST['register']))
    {
      $ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_state = $_POST['c_state'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];  
        move_uploaded_file($c_image_tmp,"customer/customer_profile_pic/$c_image");
         $insert_c = "insert into customer (customer_ip,customer_name,customer_email,customer_pass,customer_state,customer_city,customer_contact,customer_image,customer_address) values ('$ip','$c_name','$c_email','$c_pass','$c_state','$c_city','$c_contact','$c_image','$c_address')";
	
		$run_c = mysqli_query($conn,$insert_c); 
       
        $sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($conn, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
        
    }
    
    
    ?>
    <!--footer -->
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
