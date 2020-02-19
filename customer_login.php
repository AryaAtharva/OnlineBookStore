<?php
include("includes/db.php");
?>
<div class="container col-6" style="padding-bottom:30px;">
    <h1 class="display-5">Login</h1>
<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="pass" required>
  </div>
  <input type="submit" class="btn btn-primary" name="login" value="login"><a href="checkout.php?forgot_pass" style="padding-left:10px;">Forgot Password?</a><br><br>
    
    <a href="customer_register.php" style="margin:30px;">New? Register Here</a>
</form>
    <?php
if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customer where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($conn, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
		}
    $ip=getIp();
    $sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($conn, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart);
    if($check_customer>0 AND $check_cart==0){
        echo"<script>alert('You logged in successfully , Thank You')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
    else{
        $_SESSION['customer_email']=$c_email;
        echo"<script>alert('You logged in successfully , Thank You')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";
    }
}
    ?>
</div>