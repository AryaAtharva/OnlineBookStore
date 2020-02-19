<?php 
// After uploading to online server, change this connection accordingly

$conn=mysqli_connect("localhost","root","","booksdb");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>
