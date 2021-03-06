<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff">

	<script src="main.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<script>
		function goBack() {
		    window.history.back();
		}
	</script>
</head>
<body>
	<ul id="slide-out" class="side-nav fixed z-depth-2"><!--side bar-->
	    <li class="center no-padding">
	      <div class="indigo darken-2 white-text" style="height: 180px;">
	        <div class="row">
	          <img style="margin-top: 5%;" width="100" height="100" src="images/pro1.jpg" class="" />

	          <p>
	            Phạm Minh Thắng
	          </p>
	        </div>
	      </div>
	    </li>

	    <li id="dash_dashboard"><a class="waves-effect" href="admin.php"><b>Dashboard</b></a></li>

	    <ul class="collapsible" data-collapsible="accordion">
	      <li id="dash_users">
	        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Users</b></div>
	        <div id="dash_users_body" class="collapsible-body">
	          <ul>
	            <li id="users_seller">
	              <a class="waves-effect" style="text-decoration: none;" href="#!">Seller</a>
	            </li>

	            <li id="users_customer">
	              <a class="waves-effect" style="text-decoration: none;" href="#!">Customer</a>
	            </li>
	          </ul>
	        </div>
	      </li>

	      <li id="dash_products">
	        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Products</b></div>
	        <div id="dash_products_body" class="collapsible-body">
	          <ul>
	            <li id="products_product">
	              <a class="waves-effect" style="text-decoration: none;" href="product.php">Products</a>
	              <a class="waves-effect" style="text-decoration: none;" href="#!">Orders</a>
	            </li>
	          </ul>
	        </div>
	      </li>

	      <li id="dash_categories">
	        <div id="dash_categories_header" class="collapsible-header waves-effect"><b>Categories</b></div>
	        <div id="dash_categories_body" class="collapsible-body">
	          <ul>
	            <li id="categories_category">
	              <a class="waves-effect" style="text-decoration: none;" href="category.php">Category</a>
	            </li>

	            <li id="categories_sub_category">
	              <a class="waves-effect" style="text-decoration: none;" href="#!">Sub Category</a>
	            </li>
	          </ul>
	        </div>
	      </li>

	      <li id="dash_brands">
	        <div id="dash_brands_header" class="collapsible-header waves-effect"><b>Brands</b></div>
	        <div id="dash_brands_body" class="collapsible-body">
	          <ul>
	            <li id="brands_brand">
	              <a class="waves-effect" style="text-decoration: none;" href="#!">Brand</a>
	            </li>

	            <li id="brands_sub_brand">
	              <a class="waves-effect" style="text-decoration: none;" href="#!">Sub Brand</a>
	            </li>
	          </ul>
	        </div>
	      </li>
	    </ul>
  	</ul><!--End sidebar-->

  	<!--Main-->
  	<main>
    <div class="row">
      <div class="col s12">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Edit Product</b>
            </div>
          </div>
			<div class="row" style="background-color: #401F84; padding: 1rem;border-radius:5px;">
				<div class="category-item" style="text-align: left; color: white;">
					<div class="col s8">
						<div class="form-group">
							<?php 
								require_once('./dbconnector.php');
								$conn = new DBConnector();
								$sql = "SELECT * FROM product WHERE proId =" .$_GET['proId'];
								$rows = $conn -> runQuery($sql);
							 ?>
							 <?php foreach ($rows as $key): ?>
							 	<form action="product.php" method="POST">
									<label for="prid" style="color: white; font-size: 20px;">Product ID: <?php echo $_GET['proId'] ?> </label><br>
							  		<input type="hidden" class="form-control" id="prid" name="oldproId" style="color: black;" value="<?php echo $key['proId'] ?>" readonly >
							  		<label for="prname" style="color: white; font-size: 20px;">Product Name:</label>
							  		<input type="text" class="form-control" id="prname" name="newproName" style="color: white;" value="<?php echo $key['proName'] ?>" pattern="^[A-Za-z -]+$" required>
							  		<label for="fileToUpload" style="color: white; font-size: 20px;">Product Image:</label>
							  		<img class="img-responsive" src="<?php echo $key['proImage'] ?>">
							  		<input type="file" name="newproImage" id="fileToUpload" class="form-control" required>
							  		<label for="prprice" style="color: white; font-size: 20px;">Product Price:</label>
							  		<input type="number" class="form-control" id="prprice" name="newprPrice" style="color: white;" value="<?php echo $key['prPrice'] ?>" step=".01" required>
							  		<label for="prdes" style="color: white; font-size: 20px;">Product Description:</label>
							  		<input type="text" class="form-control" id="prdes" name="newproDes" style="color: white;" value="<?php echo $key['proDes'] ?>" required>
							  		<label for="sel1" style="color: white; font-size: 20px;">Category:</label>
								  <select class="form-control" id="sel1" name="newcatId" style="color: black;">
								    <?php 
								    	require_once('./dbconnector.php');
								    	$conn = new DBConnector();
								    	$sql = "SELECT * FROM `category`";
								    	$rows = $conn -> runQuery($sql);
								     ?>
								     <?php foreach ($rows as $key) { ?>
								     	<option value="<?php echo $key['catId'] ?>"><?php echo $key['catName'] ?></option>
								     <?php } ?>
								  </select>
								  <button class="btn btn-primary" type="submit">Edit</button>
								  <button class="btn" onclick="goBack()" style="background-color: #DD4242;">Go Back</button>
								</form>
							<?php endforeach ?>
						
						</div>
					</div>
				</div>
	      	</div>
          
        </div>
      </div>
    </div>
  </main><!--end main-->
</body>
</html>