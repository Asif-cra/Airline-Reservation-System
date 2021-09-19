<?php
session_start();

?>

<html>
    <head>
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"
        meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="navbar">
                <div class="container">
                <a href="index.php" class="navbar-brand"><h2>Atatturk</h2></a>
                <button 
                class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navmenu"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
  
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                          <a href="Booking.php" class="nav-link links">Book</a>
                        </li>
                        <li class="nav-item">
                          <a href="help.php" class="nav-link links">Help</a>
                        </li>
                        <!-- <li class="nav-item">
                          <a href="manage.php" class="nav-link links">Manage</a>
                        </li> -->
                       
                        <li class="nav-item" id="logIn">
                          <a href="#" class="nav-link links" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        </li>
                    </ul>
                    <div class="dropdown" id="dropIt" style="display:none;">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="manage.php">Manage</a></li>
                        <li><a class="dropdown-item" href="#">History</a></li>
                        <li><a class="dropdown-item" href="#">Sign Out</a></li>
                      </ul>
                    </div>
                            
                </div>
              </div>
            </nav>

        </header>
        <div class="container-fluid mt-4 mb-4">

        <h4 style="color:A19CA4;margin-left: 6rem;">| Flight Details</h4>

        </div>
        <div class="container mt-5">
        <?php
                include('connection.php');
               $rid=$_GET['rid'];
               $sid=$_GET['sc_id'];
               $org=$_GET['origin'];
               $dest=$_GET['cdestination'];
                $query="call details('$rid','$sid');";
                $query_fine=mysqli_query($conn, $query);
                
                if(mysqli_num_rows($query_fine)>0){
                while($row=mysqli_fetch_assoc($query_fine)){



         echo "<p><b>   Flight Id                     :</b>  $row[Flight_id]</p>
         <p><b>   Flying From                   :</b>    $org</p>
         <p><b>   Flying From                   :</b>    $row[origin]</p>
         <p><b>   Flying to                     :</b>    $dest</p>
         <p><b>   Flying to                     :</b>    $row[destiny]</p>
         <p><b>   Flight leaves from origin     :</b>    $row[Departure_time]</p>
         <p><b>   Flight Arrives On destination :</b>    $row[Arrival_time]</p>
         <p><b>   Flight duration               :</b>    $row[Duration]</p>"
         ;
        }}
        $query_fine->close();
          mysqli_next_result($conn);
        ?>
        </div>
        <hr>
        <div class="container">
        <?php 
             include('connection.php');
             $rid=$_GET['rid'];
             $query1="select Seat_Id from `seat reserved`
             where r_id='$rid';";
                $query_fine1=mysqli_query($conn, $query1);
            if($query_fine1) {
                while($row=mysqli_fetch_assoc($query_fine1)) {  
                    echo "<p><b> Seat Id:</b> $row[Seat_Id] </p>";
                }
                
        }
        else echo"error";
        ?>
        </div>





    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>