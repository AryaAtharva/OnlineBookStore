<?php
$conn=mysqli_connect("localhost","root","","booksdb");

//getting ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}


//cart

function cart()
{
    if(isset($_GET['add_cart']))
    {
        global $conn;
        $ip=getIp();
        $bid=$_GET['add_cart'];
        $check_book="select * from cart where ip_add='$ip' and b_id=$bid ";
        $run_check=mysqli_query($conn,$check_book);
       if(mysqli_num_rows($run_check))
        {
            echo"";
        }
        else
        {
            $insert_book="insert into cart (b_id,ip_add) values ('$bid','$ip')";
            $run_book=mysqli_query($conn,$insert_book);
            echo"<script>window.open('index.php','_self')</script>";
        }
       
    }
}
//getting categories
function get_catg()
{
    global $conn;
    $cat_query="Select * from categories";
    $get_cat=mysqli_query($conn,$cat_query);
    while($x=mysqli_fetch_array($get_cat))
    {
        $cat_id=$x['cat_id'];
        $cat_name=$x['cat_name'];
        echo" <a class='dropdown-item' href='index.php?cat=$cat_id'>$cat_name</a>";
    }
}
//displaying books
function get_book()
{
    if(!isset($_GET['cat']))
    {
    
    global $conn;
    $get_book="select * from books order by RAND() LIMIT 0,6";
    $run_book=mysqli_query($conn,$get_book);
    echo"<div class='row'>
   ";
    while($row_book=mysqli_fetch_array($run_book))
    {
        $b_id=$row_book['book_id'];
        $b_cat=$row_book['book_category'];
        $b_title=$row_book['book_title'];
        $b_author=$row_book['book_author'];
        $b_image=$row_book['book_image'];
        $b_price=$row_book['book_price'];
        $b_id=$row_book['book_id'];
        echo "
    <div class='card' style='width: 19rem;'>
    <img class='card-img-top' src='admin/product_pics/$b_image' alt='Card image cap' height='300' width='80'>
    <div class='card-body'>
    <h5 class='card-title'>$b_title</h5>
    <p class='card-text'>Author : $b_author <br> Price : Rs.$b_price</p>
    <a href='details.php?book_id=$b_id' class='btn btn-primary'>Details</a>
    <a href='index.php?add_cart=$b_id' class='btn btn-primary'>Add to Cart</a>
    </div>
    </div>
    ";
    }
    echo"</div>";
}
}

// displaying books by category
function get_cat_book()
{
    if(isset($_GET['cat']))
    {
    $cat_id=$_GET['cat'];
    global $conn;
    $get_cat_book="select * from books where book_category=$cat_id";
    $run_cat_book=mysqli_query($conn,$get_cat_book);
   echo"<div class='row'>
   ";
    while($row_cat_book=mysqli_fetch_array($run_cat_book))
    {
        $b_id=$row_cat_book['book_id'];
        $b_cat=$row_cat_book['book_category'];
        $b_title=$row_cat_book['book_title'];
        $b_author=$row_cat_book['book_author'];
        $b_image=$row_cat_book['book_image'];
        $b_price=$row_cat_book['book_price'];
        $b_id=$row_cat_book['book_id'];
        echo "
    <div class='card' style='width: 19rem;'>
    <img class='card-img-top' src='admin/product_pics/$b_image' alt='Card image cap' height='300' width='80'>
    <div class='card-body'>
    <h5 class='card-title'>$b_title</h5>
    <p class='card-text'>Author : $b_author <br> Price : Rs.$b_price</p>
    <a href='details.php?book_id=$b_id' class='btn btn-primary'>Details</a>
    <a href='index.php?add_cart=$b_id' class='btn btn-primary'>Add to Cart</a>
    </div>
    </div>
 ";
    }
  echo"</div>";
}
}
//getting total items
function totalItems()
{
    if(isset($_GET['add_cart']))
    {
        global $conn;
        $ip=getIp();
        $get_items="select * from cart where ip_add='$ip'";
        $run_items=mysqli_query($conn,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }
    else
    {
         global $conn;
        $ip=getIp();
        $get_items="select * from cart where ip_add='$ip'";
        $run_items=mysqli_query($conn,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }
    echo $count_items;
}
//getting total price
function totalPrice()
{
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
            $values=array_sum($product_price);
            $total+=$values;
        }
    }
    echo $total;
}
//quotes
function quotes()
{
    global $conn;
    $quote="select * from quotes order by RAND() LIMIT 0,1";
    $run_quote=mysqli_query($conn,$quote);
    $e_quote=mysqli_fetch_array($run_quote);
    echo'"';
    echo $e_quote['quote'];
    echo '"';
    echo ' - ' ;
    echo $e_quote['quoted_by'];
}

?>
