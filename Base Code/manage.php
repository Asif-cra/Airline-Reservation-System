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
        <div class="container-fluid m-3 p-3">
            <h4 style="color:A19CA4;margin-left: 6rem;">| Manage your flight</h4>
        </div>
        <section>
            <div class="container mt-4 p-3">
        
        <table class="table">
            <thead>
              <tr>
              <th scope="col">#</th>
                <th scope="col">Origin</th>
                <th scope="col">Destination</th>
                <th scope="col">Date</th>
                
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php
                include('connection.php');
                $mail=$_SESSION['lemail'];
                $query="call manage_user_flight('$mail');";
                $query_fine=mysqli_query($conn, $query);
                $serial=1;
                if(mysqli_num_rows($query_fine)>0){
                while($row=mysqli_fetch_assoc($query_fine)){
                echo "
                  <tr>
                  <th scope='row'>{$serial}</th>
                    <td><input name='origin[]' readonly 
                  style='border:0;outline:0;display:inline-block' value='$row[origin]'></td>
                     <td><input name='destiny' 
                   readonly style='border:0;outline:0;display:inline-block' value='$row[destination]'></td>
                    <td><input name='dtime' readonly 
                    readonly style='border:0;outline:0;display:inline-block' value='$row[departure]'></td>
                 
                    
                    <td><input name='rid' readonly 
                    readonly style='border:0;outline:0;display:none' value='$row[s_id]'></td>

                    <td><input name='sid' readonly 
                    readonly style='border:0;outline:0;display:none' value='$row[r_id]'></td>

                    <td><a href='change.php?origin=$row[origin]&amp;sc_id=$row[s_id]&amp;
                    cdestination=$row[destination]&amp;rid=$row[r_id]&amp;dtime=$row[departure]
                    ' class='btn btn-success'>Change</a></td></td>

                    <td><a href='details.php?origin=$row[origin]&amp;sc_id=$row[s_id]&amp;
                    cdestination=$row[destination]&amp;rid=$row[r_id]
                    ' class='btn btn-danger'>Details</a></td></td>

                    <td><a href='ticket.php?origin=$row[origin]&amp;sc_id=$row[s_id]&amp;
                    cdestination=$row[destination]&amp;rid=$row[r_id]
                    ' class='btn btn-primary'  >Print</a></td></td>
                    


              </tr>";
              $serial++;
                }}
              ?>
              
              
            </tbody>
          </table>
        
        </div>
        </section>
        <iframe id="frame" src="ticket.php" style="display: none;"></iframe>


<script type="text/javascript">
  function printticket() {
    document.getElementById('frame').contentWindow.window.print();
  }
</script>
        
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>