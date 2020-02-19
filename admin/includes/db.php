<?php
$conn=mysqli_connect("localhost","root","googly","booksdb");
if(mysqli_connect_errno())
{
    echo"Failed to connect to Mysql:".mysqli_connect_error();
}
?>