<?php 
session_start();
require_once('src/initialize.php'); 
define("IMG_PATH", "./images/");
define("SHARED_PATH", "./shared/");

$productList = ProductList::find_all();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (!empty($_POST['product'])) {
    $delete = Product::delete();
    header("Location: ./");
    exit;
  } else {
    $_SESSION['error'] = "Please select products";
    header("Location: ./");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product List</title>
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/index.css">
  <script src="./src/scripts/script.js" defer></script>
</head>

<body>

<?php
    if(!$productList) {
      include_once(SHARED_PATH.'no_product.php');
      exit;
    } 
?>
<!-- Header -->
<div class="header">
  <div class="header-main header-left"><h1>Product List</h1></div>
  <div class="header-main header-right">
      <a href="add-product"><button class="button" id='add-product-btn' name="ADD">ADD</button></a>
      <input type="submit" class="button" id="delete-product-btn" value="MASS DELETE" name="MASS DELETE" onclick="formSubmit('formPost')"/>
  </div>
</div>
<!-- end -->

<div class="wrapper">
<!-- Message box -->
 <div class="message">
  <?php flashMessages(); ?> 
 </div>
<!-- end -->

<div class="header-sort">
    <form method="get" id="formSort"> 
        <select id="selectSort" name="sort" onchange="formSubmit('formSort')">
            <option name="sort_new" value="new">New products first</option>
            <option name="sort_old" value="old">Old products first</option>
            <option name="sort_priceUp" value="price_up">Price (cheaper first)</option>
            <option name="sort_priceDown" value="price_down">Price (expensive first)</option>
        </select>
      </form>
  </div>  

<!-- Main Content -->
<form method="post" id="formPost">
<div class="product-container">
<?php
        foreach ($productList as $product) {
        echo '<div class="product-item">'.$product->show().'</div>';
        }
?>
</div>
</form>
<!-- end -->
<div class="push"></div>
</div>

<!-- Footer -->
<?php include_once(SHARED_PATH.'footer.php'); ?>
<!-- end -->
</body>
</html>