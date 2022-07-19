<?php ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
    <title>Picross</title>
  </head>

    <header>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
          <img src="image.jfif" alt="" width="80" height="40" class="d-inline-block align-text-top">
          Picross
        </a> -->
        <nav class="navbar navbar-expand-lg">
        <div class="navpart left">

      <div id="logo" class="left-item">
        <img src="image.jfif" alt="" width="80" height="40" class="">
      </div>
        <div class="websitename left-item">
          <span>Picross</span>
        </div>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-3">
          <a class="nav-link navlist" href="home.php">Level 1</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link navlist" aria-current="page" href="level2.php" style="text-decoration: underline;">Level 2</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link navlist" href="level3.php">Level 3</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link navlist" href="level4.php">Level 4</a>
        </li>
      </ul>
      <form class="d-flex">
        <img src="moon.png" id="icon">
        <a href="contactus.php" class="navlist">Contact Us</a>
        <a href="index.php" class="navlist">Logout</a>
      </form>
    </div>
  </div>
</nav>
</header>


  <body>
    <hr />
    <div class="livescontainer my-3">
      <p id="lives">Lives remaining: </p>
      <p id="life"></p>
    </div>
    <div id="top">
     <div class="tablecontainer" id="append">
      <table class="table" id="table">
        <tr>
          <th> </th>
          <th scope="col">3</th>
          <th scope="col">4</th>
          <th scope="col">5</th>
          <th scope="col">4</th>
          <th scope="col">3</th>
        </tr>
        <?php
            $qst = array(5,5,5,3,1);
            $id = 0;
            for($i=0;$i<5;$i++){
              echo "<tr>";
              echo "<th>".$qst[$i]."</th>";
              for($j=0;$j<5;$j++){
                    echo "<td class='data' id='".$id."' onclick='fun(this.id)'> </td>";
                    $id++;
                  }
                echo "</tr>";
              } 
              ?>
    </table>
  </div>
  </div>
    
    <p id="result"></p>
    
    <script>
        var lifes = 3;
        var total=0;
        document.getElementById("life").innerText = lifes;
        var ans = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,0,0,0,1,0,0];
        ans.forEach(calculate);
        function calculate(item){
          if(item==1){
            total++;
          }
        }
        var clicked= [<?php for($i=0;$i<25;$i++){echo "0,";} ?>];
        function fun(clicked_id)
        {
            if(lifes>0 && clicked[clicked_id]==0 && total>0){
                clicked[clicked_id] = 1;
                if (ans[clicked_id] == 1){
                    document.getElementById(clicked_id).style.backgroundColor = "var(--s-color)";
                    total--;
                }
                else{
                    lifes-- ;
                    document.getElementById("life").innerText = lifes;
                    // var str =clicked_id.concat("1");
                    // document.getElementById(str).innerText = "x";
                    var obj=document.getElementById(clicked_id);
                    obj.setAttribute("style", "background: url('wrong2.png'); background-position: center;background-repeat: no-repeat");
                    if(lifes==0){
                        document.getElementById("result").innerText = 'Failed';
                    }
                }

                if(total==0){
                  document.getElementById("result").innerText = 'Success';
                  document.getElementById("table").remove();
                  var img = document.createElement("IMG");
                  img.setAttribute("src","level2.jpg");
                  document.getElementById("append").appendChild(img);
                }
            }
        }
    </script>
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