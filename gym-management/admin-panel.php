<!DOCTYPE html>
<?php

// php select option value from database

$hostname = "localhost:3306";
$username = "root";
$password = "";
$databaseName = "loginsystem";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `Trainer`";

// for method 1

$result1 = mysqli_query($connect, $query);



?>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/2.1.jpg" alt="First slide" style="height: 380px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/2.2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="container-fluid" style="padding :10px">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="" class="list-group-item active">Members</a>
          <a href="" class="list-group-item">Add New Member</a>
          <a href="trainer_details.php" class="list-group-item">Member details</a>
          <a href="package.php" class="list-group-item">Package details</a>
          <a href="payment.php" class="list-group-item">Payments</a>
        </div>
        <hr>
        <div class="list-group">
          <a href="" class="list-group-item active">Trainer</a>
          <a href="" class="list-group-item">Add New Trainer</a>
          <a href="trainer_details.php" class="list-group-item">Trainer details</a>
        </div>
        <hr>
        <div class="list-group">
          <a href="" class="list-group-item active">Packages</a>
          <a href="" class="list-group-item">View Package</a>
          <!-- <a href="trainer_details.php" class="list-group-item">Member details</a>
          <a href="package.php" class="list-group-item">Package details</a>
          <a href="payment.php" class="list-group-item">Payments</a> -->
        </div>
        <hr>
        <div class="list-group">
          <a href="trainer.php" class="list-group-item active">Trainer</a>
          <a href="trainer.php" class="list-group-item active">Trainer details</a>
          <a href="trainer.php" class="list-group-item active">Add new Trainer</a>
        </div>

      </div>
      <div class="col-md-9">
        <div class="card">

          <div class="card-body" style="background-color:#3498DB;color:FFFFFF;">
            <h3>Add New Member</h3>
          </div>
          <div class="card-body"></div>
          <form class="form-group" action="func.php" method="post" style="margin-left: 18px;">
            <label>First name:</label>
            <input type="text" name="fname" class="form-control"><br>
            <label>Last name:</label>
            <input type="text" name="lname" class="form-control"><br>
            <label>Email Id:</label>
            <input type="text" name="email" class="form-control"><br>
            <label>Contact Detail</label>
            <input type="text" name="contact" class="form-control"><br>
            <label>Trainer: </label>
            <select class="form-control" name="docapp">

              <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>

                <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>

              <?php endwhile; ?>

            </select>
            <br>

            <input type="submit" class="btn btn-primary" name="addMember_submit" value="Register"> <a href="func.php" class="btn btn-light"></a>


          </form>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <header>
    <nav>
      <div class="main-wrapper">

        <div class="nav-login">
          <?php
          if (isset($_SESSION['u_id'])) {
            echo '<form action="includes/index.php" method="POST">
					            <button type="submit" name="submit">logout</button>
					              </form>';
          } else {

            echo '<form action="includes/index.php" method="POST">
                              
                               						
				                </form>
				              <a href="index.php" class="btn btn-light" style="background-color:#3498DB;color:FFFFFF">Logout</a>';
          }

          ?>


        </div>
      </div>
    </nav>

  </header>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>