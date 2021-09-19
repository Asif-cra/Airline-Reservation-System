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
    <div class="container text-center mb-3" >
        <button type="button"class="btn btn-primary" id="pbtn" onclick="window.print()"  >
        Print</button></div>
    
    <body>
        
        <div class="container " style="width: 50%;" id="tarea">
            <h1 class="text-center">Attaturk Airline</h1>
            <?php
            include('connection.php');
            $rid=$_GET['rid'];
            $sid=$_GET['sc_id'];
            $org=$_GET['origin'];
            $dest=$_GET['cdestination'];
            $query1="select * from ticket where r_id='$rid'";
               $query_fine1=mysqli_query($conn, $query1);
           if($query_fine1) {
               while($row=mysqli_fetch_assoc($query_fine1)) {         
                    echo "<hr style='height: 2px; color: red;'>
                    <p>Flying From: $org</p>
                    <p>Flying to: $dest</p>
                    <p>Seat Id: $row[Seat_id]</p>
 
                    <hr style='height: 2px;color: red;'>";


               }}
            ?>
        </div>
        <!-- <button type="button" onclick="printDiv('tarea')" class="btn btn-primary">Print</button> -->
        <header></header>
        <footer></footer>
        <!-- <script>
        $(document).ready(function(){
            $('#pbtn').click(function(){
                
                window.print();
            });
        
        });
        </script> -->
        <style>
            @media print{
                 #pbtn{
                        display:none !important;
                }
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>