<?php 
session_start();
if(!isset($_SESSION['lemail'])){
  header("location:index.php");
}

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
          <!-- navbar -->
          <?php
      include('header.php');
      ?>
          </header>
        
        <section>
          <div class="container mt-4 p-3">
      <table class="table table-striped">
          <thead>
            <tr>
              
              <th scope="col">Number of seats</th>
              <th scope="col">Seat Class</th>
              
              <th scope="col">Total + VAT</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
           include('connection.php');
          $user_rid=$_GET['rid'];
         
          echo "getthis$user_rid";
           $query="select Total_amount,Total_passanger,class from payment p
           join reservation r on r.Id=p.Reservation_Id
           where p.Reservation_Id='$user_rid' ;";
           $query_fine=mysqli_query($conn, $query);
         
           while($row=mysqli_fetch_assoc($query_fine)){
          echo"
           <tr>
            
             <td>{$row['Total_passanger']}</td>
             <td>{$row['class']}</td>
             <td>{$row['Total_amount']}</td>
           </tr>

           ";
          
         }
          ?>
           
            
          </tbody>
        </table>
      </div>
      </section>
        <section class="register-form" >
          
            <div class="container-fluid text-center mt-5">
              <h1 style="color:A19CA4;" class="mb-5"> <strong><u> Payment</u></strong> </h1>
            </div>
            
            
            <div class="container text-start">
                <?php
                    include('connection.php');
                   $user_mail= $_SESSION['lemail'];
                   $query="select CardNum from creditcardinfo
                   join payment on payment.Id=creditcardinfo.pay_id
                   order by payment.Id
                   limit 1;";
                   $query_pass=mysqli_query($conn,$query);
                   $result;
                   while($row=mysqli_fetch_assoc($query_pass)){
                    $result=$row['CardNum'];
                   }
                
                echo"  <div class='row>             
                    <div class='col-lg-6 offset-lg-3'>   
                      <div class='form mx-4 mb-2 mt-4 '>
                        <label for='pcardNum' class='form-label'>Card Number</label>
                        <input type='text' readonly id='pcardNum' class='form-control'
                         value='$result'/>                     
                      </div>
                    </div>
                    ";
                    
                      ?>
                   
            
            <div class="col-lg-6 offset-lg-3 mt-3 mb-5 ">   
                      <div class="form mx-4 my-2 d-grid" role="button" >
                        <a href="index.php" class="btn btn-primary">Submit</a> 
                      <!-- </div>data-bs-toggle="modal" data-bs-target="#payModal -->
                      
                    </div>
                  </div>
          
          
         
  
          </section>

            <div style="height: 200px;"></div>
          
                  

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>