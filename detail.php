<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js"></script>
  <script src="js/main.js"></script>
</head>
<body>
    <header>

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
        <a class="navbar-brand" href="homepage.php">
          <strong>Minh Thắng Phạm</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="homepage.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Pricing</a>
            </li>
            <li class="nav-item dropdown btn-group">
              <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More info</a>
              <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item">Contact</a>
                <a class="dropdown-item">Billing adress</a>
                <a class="dropdown-item">Discounts</a>
              </div>
            </li>
          </ul>
          <form class="form-inline waves-effect waves-light" action="search.php" method="GET">
            <input class="form-control" type="text" placeholder="Search" name="keyword" pattern="^[a-zA-Z ]+$">
          </form>
        </div>
      </div>
    </nav>
    <!--/.Navbar-->

  </header>

  <main>

    <!--Main layout-->
    <div class="container">
      <div class="row">

        <!--Sidebar-->
        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">

          <div class="widget-wrapper">
            <h4>Categories:</h4>
            <br>
            <?php 
              require_once('./dbconnector.php');
              $conn = new DBConnector();
              $sql = "SELECT * FROM category";
              $rows = $conn ->runQuery($sql);
             ?>
            <div class="list-group">
              <?php foreach ($rows as $key) { ?>
                <a href="shopgrid.php?catId=<?= $key['catId']?>" class="list-group-item"><?php echo $key['catName'] ?></a>
              <?php } ?>
            </div>
          </div>

          <div class="widget-wrapper wow fadeIn" data-wow-delay="0.4s">
            <h4>Log in</h4>
            <br>
            <div class="card">
              <div class="card-block">
                <p><strong>Login to our website</strong></p>
                <p>Once a week we will send you a summary of the most useful news</p>
                <div class="md-form">
                  <i class="fa fa-envelope prefix"></i>
                  <input type="text" id="form1" class="form-control">
                </div>
                <div class="md-form">
                  <i class="fa fa-user prefix"></i>
                  <input type="password" id="form2" class="form-control">
                </div>
                <button class="btn btn-default" type="submit">Login</button>

              </div>
            </div>
          </div>

        </div>
        <!--/.Sidebar-->

        <!--Main column-->
        <div class="col-lg-8">
          <br>
          <div class="divider-new">
               <h2 class="h2-responsive">Details</h2>
          </div>

          <!--row-->
          <?php 
            require_once('./dbconnector.php');
            $conn = new DBConnector();
            $sql = "SELECT * FROM product WHERE proId =" . $_GET['proId'];
            $rows = $conn -> runQuery($sql);
           ?>
          <div class="row">
            <?php foreach ($rows as $key) { ?>
              <div class="col-lg-12">
              <!--Card-->
              <div class="card  wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                  <img src="<?php echo $key['proImage'] ?>" alt="">
                  <a href="#">
                    <div class="mask"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                  <!--Title-->
                  <h4 class="card-title"><?php echo $key['proName'] ?></h4>
                  <!--Text-->
                  <p class="card-text"><?php echo $key['proDes'] ?></p>
                  <a href="#" class="btn btn-default">Buy now for <strong>$<?php echo $key['prPrice'] ?></strong></a>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->
            </div>
            <?php } ?>
          </div>
          <!--/row-->
        </div>
        <!--/.Main column-->
      </div>
    </div>
  </main>

  <footer class="page-footer center-on-small-only">
    <div class="footer-copyright">
      <div class="container-fluid">
        Copyright: <a href="https://www.facebook.com/minhthang.294"> Minh Thang Pham</a>
      </div>
    </div>
  </footer>
</body>
</html>