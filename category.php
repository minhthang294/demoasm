<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Category</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff">

	<script src="main.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<script>
		function Deleteqry(id)
		{ 
		  if(confirm("Are you sure you want to delete this category?")==true)
		           window.location="category.php?del="+id;
		    return false;
		}
		function editqry(id) {
			window.location ="editcat.php?catId="+id;
			return false;
		}
	</script>
</head>
<body>
 	<?php
	if (isset($_POST['newcatName']) && isset($_POST['oldId'])) {
		if ($_POST['newcatName'] != "") {
			require_once('./dbconnector.php');
			$catName = $_POST['newcatName'];
			$catid = $_POST['oldId'];
			$conn = new DBConnector();
			$sql = "UPDATE `category` SET `catName`= '$catName' WHERE catId=".$catid;
			$sql1 ="SELECT*FROM category WHERE catName ='". $catName ."'";
			$row = $conn -> runQuery($sql1);
			if (count($row)>0) {
				$message = "Category existed! try again";
				echo "<script type='text/javascript'>alert('$message'); window.history.back();</script>";
			} else {
				$conn -> execStatement($sql);
				$message = "Category changed successfully!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}
 	?>
	<?php
	if (isset($_POST['catName'])) {
		if ($_POST['catName'] != "") {
			require_once('./dbconnector.php');
			$catName = $_POST['catName'];
			$conn = new DBConnector();
			$sql = "INSERT INTO `category`(`catName`) VALUES ('". $catName ."')";
			$sql1 ="SELECT*FROM category WHERE catName ='". $catName ."'";
			$row = $conn -> runQuery($sql1);
			if (count($row)>0) {
				$message = "Category existed! try again";
				echo "<script type='text/javascript'>alert('$message'); window.history.back();</script>";
			} else {
				$conn -> execStatement($sql);
				$message = "Category added successfully!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		} else {
			$mess = "Please insert category name";
			echo "<script type='text/javascript'>alert('$mess');</script>";
		}
	}
 	?>
	<?php 
		require_once('./dbconnector.php');
		if(isset($_GET['del']))
	   {
	   	$conn = new DBConnector();
	   	$id = $_GET['del'];
	    $sql ="DELETE FROM category WHERE catId ='". (int)$id ."'";
	    $conn->execStatement($sql);
	    $message = "Your category is not empty,all the product in this will have no category";
		echo "<script type='text/javascript'>alert('$message');</script>";
	   }
	 ?>
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
	<header>
    <ul class="dropdown-content" id="user_dropdown">
      <li><a class="indigo-text" href="index.php">Home Page</a></li>
      <li><a class="indigo-text" href="#!">Logout</a></li>
    </ul>

    <nav class="indigo" role="navigation">
      <div class="nav-wrapper">
        <a data-activates="slide-out" class="button-collapse show-on-" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

        <ul class="right hide-on-med-and-down">
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>
  	</header>
  	<!--Main-->
  	<main>
    <div class="row">
      <div class="col s12">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Category Management</b>
              <a href="addcat.php" role="button" data-toggle="modal" class="btn btn-info btn-lg">
          		<span class="glyphicon glyphicon-plus"></span>Add Category 
        		</a>
            </div>
          </div>
			<?php
			require_once('./dbconnector.php');
              $conn = new DBConnector();
              $sql = "SELECT * FROM category";
              $rows = $conn ->runQuery($sql);
			?>
			<?php foreach ($rows as $key) { ?>
			<div class="row" style="background-color: #401F84; padding: 1rem;border-radius:5px;">
				<div class="category-item" style="text-align: left; color: white;">
					<div class="col s10" style="font-size: 30px;"><?php echo $key['catName'] ?></div>
					<div class="col s2">
						<button type="button" class="btn btn-default btn-sm" style="margin-bottom: 5px;" onclick="return editqry(<?php echo $key['catId'] ?>)">
				          <span class="glyphicon glyphicon-edit"></span>
				        </button>
				        <button type="button" class="btn btn-default btn-sm" style="background-color: #ED4F4F;" onclick="return Deleteqry(<?php echo $key['catId'] ?>);" >
				          <span class="glyphicon glyphicon-remove"></span>
				        </button>
					</div>
				</div>
          	</div>
			<?php } ?>
          
        </div>
      </div>
    </div>
  </main><!--end main-->
</body>
</html>