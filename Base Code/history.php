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
    <?php
      include('header.php');
      ?>
    </header>
    <div class="container-fluid m-3 p-3">
        <h4 style="color:A19CA4;margin-left: 6rem;">| You can see your travel history here</h4>
    </div>
    <section>
        <div class="container mt-4 p-3">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Origin</th>
            <th scope="col">Destination</th>
            <th scope="col">Reserve Date</th>
            <th scope="col">Departure Time</th>
            <th scope="col">Payment Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
           include('connection.php');
          $mail=$_SESSION['lemail'];
          $query="call manage_user_flight('$mail');";
          $query_fine=mysqli_query($conn, $query);
          $serial=1;
          while($row=mysqli_fetch_assoc($query_fine)){
         echo"
          <tr>
            <th scope='row'>{$serial}</th>
            <td>{$row['origin']}</td>
            <td>{$row['destination']}</td>
            <td>{$row['rdate']}</td>
            <td>{$row['departure']}</td>
            <td>{$row['payment_status']}</td>
          </tr>

          ";
          $serial++;
        }
          ?>
        </tbody>
      </table>
    </div>
    </section>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="JSh.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>

</html>