<!-- Header -->
<div class="header">
  <div class="header-main header-left"><h1>Product List</h1></div>
  <div class="header-main header-right">
      <a href="add-product"><button class="button" id='add-product-btn' name="ADD">ADD</button></a>
  </div>
</div>
<!-- end -->

<div class="wrapper">
<!-- Message box -->

 <div class="message">
  <?php flashMessages(); ?> 
 </div>

<div id="no-product">
<img id="no-product-img" src="./images/no-product-found.png">
<p>NO PRODUCT</p>
<p>FOUND</p>
</div>
 <?php
      echo '<div class="push"></div></div>';
      include_once(SHARED_PATH.'footer.php');  
 ?>