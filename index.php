<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Minh Thang Website</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  
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
        <a class="navbar-brand" href="index.php">
          <strong>Minh Thắng Phạm</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
              <?php while ($rows) { ?>
                <a href="shopgrid.php?catId=<?= $rows['catId']?>" class="list-group-item"><?php echo $rows['catName'] ?></a>
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

          <!--First row-->
          <div class="row wow fadeIn" data-wow-delay="0.4s">
            <div class="col-lg-12">
              <div class="divider-new">
                <h2 class="h2-responsive">What's new?</h2>
              </div>


              <!--Carousel Wrapper-->
              <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                  <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                  <!--First slide-->
                  <?php 
                    require_once('./dbconnector.php');
                    $conn = new DBConnector();
                    $sql = "SELECT * FROM promote";
                    $rows = $conn ->runQuery($sql);
                   ?>
                   <?php foreach ($rows as $key) { ?>
                    <?php if ($key['adId']==1): ?>
                      <div class="carousel-item active">
                        <img src="<?=$key['adImage']?>">
                        <div class="carousel-caption">
                          <h4><?php echo $key['adCaption'] ?></h4>
                          <br>
                        </div>
                      </div>
                    <?php else: ?>
                      <div class="carousel-item">
                        <img src="<?=$key['adImage']?>">
                        <div class="carousel-caption">
                          <h4><?php echo $key['adCaption'] ?></h4>
                          <br>
                        </div>
                      </div>
                    <?php endif ?>
                   <?php } ?>
                  
                  <!--/First slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
              </div>
              <!--/.Carousel Wrapper-->
            </div>
          </div>
          <!--/.First row-->
          <br>
          <hr class="extra-margins">

          <!--Second row-->
          <?php 
            require_once('./dbconnector.php');
            $conn = new DBConnector();
            $sql = "SELECT * FROM product LIMIT 6";
            $rows = $conn -> runQuery($sql);
           ?>
          <div class="row">
            <!--columnn-->
            <?php foreach ($rows as $key) { ?>
             <div class="col-lg-4">
              <!--Card-->
              <div class="card  wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                  <img src="<?php echo $key['proImage'] ?>" class="img-fluid" alt="">
                  <a href="detail.php?proId=<?php echo $key['proId'] ?>">
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
            <!--/column-->
          </div>
          <!--/.Second row-->
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