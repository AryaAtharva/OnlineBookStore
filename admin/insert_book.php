<?php
include("includes\db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Insert Book</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/styles.css" media="all">
<body>
   <div class="container">
       
        <div class="col-sm-12 ">
    <form method="post" enctype="multipart/form-data" action="insert_book.php">
  
        <div class="form-group">
    <label for="text">Book Title</label>
    <input name="book_title" type="text" class="form-control"  placeholder="Enter Title" required>
  </div>
        
   <div class="form-group">
  <label for="text">Book Category</label>
  <select class="form-control" name="book_category" required>
     <?php
      $cat_query="Select * from categories Where cat_id!=1";
    $get_cat=mysqli_query($conn,$cat_query);
    while($x=mysqli_fetch_array($get_cat))
    {
        $cat_id=$x['cat_id'];
        $cat_name=$x['cat_name'];
        echo" <option value='$cat_id'>$cat_name</option>";
    }
      ?>
  </select>
</div>
        <div class="form-group">
    <label >Book Image</label>
    <input type="file" class="form-control-file border" name="book_image" required>
  </div>
        <div class="form-group">
    <label for="text">Book Price</label>
    <input name="book_price" type="text" class="form-control"  placeholder="Enter Price" required>
  </div>
        <div class="form-group">
    <label for="text" >Book Author</label>
    <input name="book_author" type="text" class="form-control"   placeholder="Enter Author" required>
  </div>
    <div class="form-group">
  <label for="comment">Book Description</label>
  <textarea name="book_desc" class="form-control" rows="5" id="comment"></textarea>
</div>
        <div class="form-group">
    <label >Book Keyword</label>
    <input name="book_keyword" type="text" class="form-control"  placeholder="Enter Keyword">
  </div>
<input name="insert_book" type="submit" class="btn btn-primary">
</form>
</div>
</div>     
</body>
</html>
<?php
if(isset($_POST['insert_book']))
{
    $book_title=$_POST['book_title'];
    $book_category=$_POST['book_category'];
    $book_image=$_FILES['book_image']['name'];
    $book_image_tmp=$_FILES['book_image']['tmp_name'];
    move_uploaded_file($book_image_tmp,"product_pics/$book_image");
    $book_price=$_POST['book_price'];
    $book_author=$_POST['book_author'];
    $book_desc=$_POST['book_desc'];
    $book_keyword=$_POST['book_keyword'];
    $insert_book="insert into books (book_category,book_title,book_image,book_price,book_author,book_desc,book_keyword) 
    values ('$book_category','$book_title','$book_image','$book_price','$book_author','$book_desc','$book_keyword')";
    $insert_pro=mysqli_query($conn,$insert_book);
    if($insert_pro)
    {
        echo"<script>alert('product has been inserted!')</script>";
        echo"<script>window.open('insert_book.php','_self')</script>";
    } 
}
?>