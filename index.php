<?php
include "connect_db.php";


if(isset($_POST['email'])){
  if($_SERVER['REQUEST_METHOD']=='POST'){

      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM `info` WHERE email='$email'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      if($row['password']){
          if(strcmp("$password",$row['password']) == 0){
            if($row['level']==0){
              echo "<script type='text/JavaScript'> window.location.replace('home.php'); </script>";
            }
          }
          else{
              echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Failed!</strong> Please enter correct details.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
      }
      else{
          echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Please enter correct details.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
  }
}
if(isset($_POST['email1'])){
  if($_SERVER['REQUEST_METHOD']=='POST'){

    $email = $_POST['email1'];
    $password = $_POST['password1'];
    $cpassword = $_POST['c_password1'];

    if(strcmp("$password","$cpassword")==0){
        $sql = "INSERT INTO `info` (`email`, `password`, `level`) VALUES ('$email', '$password', '0');";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Sign Up Successfull.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        else{
            echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Please enter correct details.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    else{
        echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Please enter correct details.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  }
}
?>


<!-- login model --> 
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="modalModalLabel" aria-hidden="true">
        <div class="modal-dialog text-white">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalModalLabel">LogIn to Picross</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="index.php" method="POST">
                        <div class="gotosignup">
                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight"><a href="index.php">Haven't Signed Up yet ?</a></div>
                            </div>
                        </div>
                        <!-- For email -->
                        <div class="col-md-12">
                            <label for="email" class="form-label modallabel">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email ID"
                            required>
                        </div>
                        <!-- For Password -->
                        <div class="col-md-12">
                          <label for="password" class="form-label modallabel">Password</label>
                          <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter Password" required>
                        </div>
                        <!-- LogIn Button -->
                        <button type="submit" class="btn btn-primary my-3">LogIn</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<!-- SignUp model --> 
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="modalModalLabel" aria-hidden="true">
        <div class="modal-dialog text-white">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalModalLabel">SignUp to Picross</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="index.php" method="POST">
                        <!-- For email -->
                        <div class="col-md-12">
                            <label for="email" class="form-label modallabel">Email</label>
                            <input type="email" class="form-control" name="email1" id="email" placeholder="Enter Email ID"
                            required>
                        </div>
                        <!-- For Password -->
                        <div class="col-md-12">
                          <label for="password" class="form-label modallabel">Password</label>
                          <input type="password" name="password1" class="form-control" id="password"
                            placeholder="Enter Password" required>
                        </div>
                        <!-- For Confirm Password -->
                        <div class="col-md-12">
                            <label for="c_password" class="form-label modallabel">Confirm Password</label>
                            <input type="password" name="c_password1" class="form-control" id="c_password"
                            placeholder="Re-enter Password" required>
                        </div>
                        <!-- LogIn Button -->
                        <button type="submit" class="btn btn-primary my-3">SignUp</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Picross</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <header>
      <nav class="navbar">
    <div class="navpart left">

      <div id="logo" class="left-item">
        <img src="image.jfif" alt="" width="80" height="40" class="indeximg">
      </div>
        <div class="websitename left-item">
          <span>Picross</span>
        </div>
    </div>
    <div class="navpart right">
    <a href="contactus.php" class="navlist active">Contact Us</a>
    <img src="moon.png" id="icon">
    </div>
    </nav>
  </header>

  <body>
    <hr />
    <br />
    <div class="loginsignupcontainer">
    <button type="button" class="btn btn-secondary mx-3" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button> 
    
    <button type="button" class="btn btn-secondary mx-3" data-bs-toggle="modal"
                    data-bs-target="#loginModal">LogIn</button>
    </div>
    <hr />
<style>
  .dcenter{
    justify-content: center; display:flex;
  }
</style>

    <div class="dcenter">
      <h1 > How to solve Picross</h1>
    </div>
    <h5>
      The numbers on the sides of each row and column represent continuous blocks of darkened cells. Note that every block of darkened cells must be seperated by at least one blank cell. (There may be many more than one blank cell between continuous filled squares, but there must be at least one.
    </h5><br /><h5>
It’s also important to pay attention to the order the numbers are listed in. The order in which they’ll appear in the grid will match the order they are listed.
    </h5><br /><h5>
Start out by filling in cells for rows and columns with only one possible configuration of darkened cells. It is just as important to mark off the cells you know cannot be darkened as it is to color in the darkened cells. Marking blank cells with an x or a dot works well.
    </h5><br /><h5>
In this example, one blank space is needed to seperate the blocks of 3 in the center row, making the configuration of 3 dark, 1 blank, 3 dark the only possible sequence that will meet the requirement. In the same way the 1, 1, 1, 1 sequence must have at least 3 blank squares to keep the 4 single darkened cells seperate from one another.
    </h5>
    <div class="dcenter"><img src="picross1.jpg"></div>
    
    <br /><h5>
      Next, fill in the squares you can logically deduce must be darkened for every possible configuration in that row or column. For example, the rows and columns with a block of 5 darkened squares in this picross must have their center 3 cells darkened because all possible placements for the block of 5 use these same 3 cells.
    </h5>
    <div class="dcenter">
      <img src="picross2.jpg">
    </div>
    <br /><h5>
      As you darken cells, this will also reveal which cells must be empty. In this example, we know the cells with the bold orange x’s are empty for two reasons. First, the only darkened cell for each of the outermost rows and columns is identified, so we know no other cells in those rows and columns are darkend. Second, one of the cells in the block of 3 is identified. We know the most cells adjacent to this cell that could be darkend is 2, and the cells with bold orange x’s are 3 cells away from those cells.
    </h5>
    <div class="dcenter">
     <img src="picross3.jpg">
   </div>
    <br /><h5>
      By the same token, as you rule out cells and mark them with an x, this will reveal more information on which cells must be darkened. In the example, all the remaining empty cells in the rows and columns with blocks of 5 must be darkened to allow the blocks to be a full 5 cells long.
    </h5>
    <div class="dcenter">
      <img src="picross4.jpg">
    </div>
    <br /><h5>
      These strategies were enough to complete this simple puzzle.
    </h5>
    <div class="dcenter">
      <img src="picross5.jpg">
    </div>

    <br /><h5>
      Let’s look at a different puzzle to demonstrate a couple of additional strategies. In this example, one row has a block of 7 darkened squares, since 7 is the full width of this grid, all the cells in that row will be darkened.
    </h5>
    <div class="dcenter">
      <img src="picrossB1.jpg">
    </div>
    <br /><h5>
      Since we know the second cell from the bottom is darkened and the block of 5 in the center column must be continuous, we can count 5 up from the bottom of center column and darken all the cells from the second to the fifth cell in that column. The same technique can be used on the columns with blocks of 3
    </h5>
    <div class="dcenter">
      <img src="picrossB2.jpg">
    </div>
    <br /><h5>
      In the case of the column farthest to the right, we know all remaining cells will be blank, because we’ve identified the single darkened cell in that column. For the column to the far left, we know the cells below and above the single darkened cell must be blank becuase the lowest block in that column is 1 cell long. We know it cannot be the bottom-most cell becuse darkening that cell would make the last block in the column at least 2 cells long. We can also deduce with a previously mentioned technique 2 cells of the block of 3 in the left-most column.
    </h5>
    <div class="dcenter">
      <img src="picrossB3.jpg">
    </div>
    <br /><h5>
      Any time we have a cell filled in on an edge of the grid (and sometimes when we have a cell immediately against another one we know must be blank), we can count out the full span of the block we know comes next in the sequence. In the case of the cells we have in the left-most column, we know the top one must be the first in a block of 2. We can fill in one cell and rule out the cell that comes after it. In the case of the lower cell, we know the first cell in this row is only 1 cell long, so we can rule out the cell immediately next to it.
    </h5>
    <div class="dcenter">
      <img src="picrossB4.jpg">
    </div>
    <br /><h5>
      Now we can employ techniques we’ve already used to keep darkening and ruling out cells in the grid until we reveal the full image.
    </h5>
    <div class="dcenter">
     <img src="picrossB5.jpg" style="width: 370px">
    </div>
    <script>
      var icon = document.getElementById("icon");

      icon.onclick = function(){
          document.body.classList.toggle("dark-theme");
          if(document.body.classList.contains("dark-theme")){
          icon.src = "sun.png";
          }
          else{
              icon.src = "moon.png";
          }
      }
    </script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>