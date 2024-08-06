<?php 
session_start();
require_once('../src/initialize.php'); 
define("IMG_PATH", "./../images/");
define("SHARED_PATH", "./../shared/");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $data =  new Validation;
          
        if ($data->validate()) {
          Product::create();
          header("Location: ../");
          exit;
        }
        $args = $_POST['product'];
} 

$categoryList = Category::find_all();

?>

<!DOCTYPE html>
<html lang="en">
<!-- HTML HEAD -->
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product add</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/add.css">
  <script src="../src/scripts/script.js"></script>
</head>
<!-- HTML BODY -->
<body>
<!-- Header -->
<div class="header">
  <div class="header-main header-left"><h1>Add Product</h1></div> 
  <div class="header-main header-right">
      <input type="submit" class="button" value="Save" onclick="formVerify()"/>
      <a href="../"><button class="button">Cancel</button></a>
  </div>
</div>
 
<div class="wrapper">
<!-- Message box -->
  <div class="message">
      <div class="message-text"> <?php flashMessages(); ?> </div>
 </div>
<!-- end -->  

 <!-- Main Content -->
<div class="form-container">
    <form method="post" id="product_form">
      
    <div class="grid-item"> 
        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="product[product_sku]" inputname="SKU"
        value="<?=htmlspecialchars($args['product_sku'] ?? '')?>" required><br><br>
    </div>

    <div class="grid-item"> 
        <label for="name">Name:</label>
        <input type="text" id="name" name="product[product_name]" inputname="Name"
        value="<?=htmlspecialchars($args['product_name'] ?? '')?>" required><br><br>
    </div>

    <div class="grid-item"> 
        <label for="price">Price ($):</label>
        <input type="number" id="price" name="product[product_price]" inputname="Price"
        value="<?=htmlspecialchars($args['product_price'] ?? '')?>" required><br><br>
    </div>

    <div class="grid-item"> 
        <label for="productType">Product category:</label>
        <select id="productType" name="product[category_id]" inputname="Product category"
            onChange="showProductSpecs()" required>
        <option name="" value="0">please select</option>
        <?php 
        foreach ($categoryList as $category) {
          $args['category_id'] == $category->id 
                  ? $tag = 'selected'
                  : $tag = '';
          echo '<option value="'.$category->id.'" '.$tag.'  >'.$category->name.'</option>';
        } 
        ?>
        </select>
    </div>

    <div id="DVD">
            <p class="product-type-desc">Please, provide product size in MB</p>

            <label for="size">Size (MB):</label>
            <input type="number" id="size" name="product[product_size]" inputname="Size"
            value="<?=htmlspecialchars($args['product_size'] ?? '')?>">
    </div>

     <div id="Book">
            <p class="product-type-desc">Please, provide weight in KG</p>

            <label for="weight">Weight (KG):</label>
            <input type="number" id="weight" name="product[product_weight]" inputname="Weight"
            value="<?=htmlspecialchars($args['product_weight'] ?? '')?>"><br>
            
     </div>

      <div id="Furniture">

            <p class="product-type-desc">Please, provide dimensions in H x W x L format</p>

            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="product[product_height]" inputname="Height"
            value="<?=htmlspecialchars($args['product_height'] ?? '')?>">

            <label for="width">Width (cm):</label>
            <input type="number" id="width" name="product[product_width]" inputname="Width"
            value="<?=htmlspecialchars($args['product_width'] ?? '')?>">
            
            <label for="length">Length (cm):</label>
            <input type="number" id="length" name="product[product_length]" inputname="Length"
            value="<?=htmlspecialchars($args['product_length'] ?? '')?>">

      </div>

</form>
</div>
 <!-- end -->
<div class="push"></div>
</div>
<!-- Footer -->
<?php include_once(SHARED_PATH.'footer.php'); ?>
<!-- end -->
 <script>
  showProductSpecs();
</script>
</body>
<!-- HTML END -->
</html>