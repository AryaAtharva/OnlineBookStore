<?php
include("functions/functions.php");
$ip=getIp();
global $conn;
$b_id=$_GET['book_id'];
$delete="delete from cart where b_id='$b_id' and ip_add='$ip'";
$run_delete=mysqli_query($conn,$delete);
if($run_delete)
{
    echo"<script>window.open('cart.php','_self');</script>";
}
else
{
    echo"<script>alert('error has occured');</script>";
}

?>