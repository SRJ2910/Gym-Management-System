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
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body>
  <div class="dropdown">
  <div class="container">

    <button class="btn btn-secondary dropdown-toggle float-end" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
      Dropdown button
    </div>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
<div id="testimonial-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="testimonial-image" src="images/2.1.jpg" alt="dog-profile" style="height :360px;width:1350px;"/>
          </div>
          <div class="carousel-item">
            <img class="testimonial-image" src="images/2.2.jpg" alt="lady-profile" style="height :360px;width:1350px;"/>
          </div>
          <div class="carousel-item">
            <img class="testimonial-image" src="images/2.4.jpg" alt="lady-profile" style="height :360px;width:1350px;"/>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>  <div class="container-fluid" style="padding :10px">
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
  <!-- CSS only -->
<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> -->
</html>