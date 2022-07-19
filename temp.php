<?php ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Picross</title>
    <style>
      table{
        width: 1000px;
        height: 1000px;
      }
        td{
            /* width: 10%;
            height: 10%; */
            border: 1px solid black;
            /* background: center center relative no-repeat; */
        }
        .data{
            border: 3px solid black;
        }
    </style>
  </head>

    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
          <img src="image.jfif" alt="" width="80" height="40" class="d-inline-block align-text-top">
          Picross
        </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Level 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Level 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Level 3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Level 4</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="index.php">logout</a>
      </form>
    </div>
  </div>
</nav>
</header>


  <body>
  <p>Lives remaining: </p>
    <p id="life"></p>
    <table cellspacing=0 cellpadding=5>
        <tr>
            <th> </th>
            <?php
                $uppqst = array('5','5','5 1','5 2','1 1','10','10','2 5','2 1 5','2 5');
                for($i=0;$i<10;$i++){
                    echo "<th>".$uppqst[$i]."</th>";
                } 
            ?>
        </tr>
        <?php
            $qst = array(5,8,'3 2','4 2 1','4 2','4 5','2 5','1 2 5',7,5);
            $id = 0;
            for($i=0;$i<10;$i++){
                echo "<tr>";
                echo "<th>".$qst[$i]."</th>";
                for($j=10;$j<5;$j++){
                    echo "<td class='data' id='".$id."' onclick='fun(this.id)'> </td>";
                    $id++;
                }
                echo "</tr>";
            } 
        ?>
    </table>

    <p id="result"></p>
    
    <script>
        var lifes = 3;
        var total=0;
        document.getElementById("life").innerText = lifes;
        var ans = [0,0,0,0,0,1,1,1,1,1,0,0,1,1,1,1,1,1,1,1,0,1,1,1,0,1,1,0,0,0,1,1,1,1,0,1,1,0,1,0,
                    1,1,1,1,0,1,1,0,0,0,1,1,1,1,0,1,1,1,1,1,1,1,0,0,0,1,1,1,1,1,1,0,1,1,0,1,1,1,1,1,
                    0,0,0,1,1,1,1,1,1,1,0,0,0,0,0,1,1,1,1,1];
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
                    document.getElementById(clicked_id).style.backgroundColor = "#333333";
                    total--;
                }
                else{
                    lifes-- ;
                    document.getElementById("life").innerText = lifes;
                    // var str =clicked_id.concat("1");
                    // document.getElementById(str).innerText = "x";
                    var obj=document.getElementById(clicked_id);
                    obj.setAttribute("style", "background: url('wrong2.png'); position: relative; left:5%; top:20%; background-repeat: no-repeat");
                    if(lifes==0){
                        document.getElementById("result").innerText = 'Failed';
                    }
                }

                if(total==0){
                  document.getElementById("result").innerText = 'Success';
                }
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