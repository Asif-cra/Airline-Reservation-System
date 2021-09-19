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
              <th scope="col">Reservation Date</th>
              <th scope="col">Total + VAT</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
           include('connection.php');
          $mail=$_SESSION['lemail'];
          $query="call show_payment();";
          $query_fine=mysqli_query($conn, $query);
         
          while($row=mysqli_fetch_assoc($query_fine)){
         echo"
          <tr>
            
            <td>{$row['seats']}</td>
            <td>{$row['class']}</td>
            <td>{$row['ddate']}</td>
            <td>{$row['amount']}</td>
          </tr>

          ";
          
        }
        $query_fine->close();
          mysqli_next_result($conn);
          ?>
           
            
          </tbody>
        </table>
        <!-- breakdown -->
        <section>
          <div class="container mt-4 p-3">
      <table class="table table-striped">
          <thead>
            <tr>
              
              <th scope="col">Bag Charge</th>
              <th scope="col">Flight charge+Food and drinks</th>
              <th scope="col">seatprice</th>
              
              
            </tr>
          </thead>
          <tbody>
          <?php
           include('connection.php');
          $mail=$_SESSION['lemail'];
          $query=" call show_pay_breakdown('$mail');";
          $query_fine=mysqli_query($conn, $query);
         
          while($row=mysqli_fetch_assoc($query_fine)){
         echo"
          <tr>
            
            <td>{$row['bag']}</td>
            <td>{$row['duration']}</td>
            <td>{$row['seatprice']}</td>
            
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
                  <div class="row">             
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 mb-2 mt-4 ">
                        <label for="pcardNum" class="form-label">Card Number</label>
                        <input type="text" id="pcardNum" class="form-control" placeholder="Enter card number" required/>                     
                      </div>
                    </div>
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 my-2 ">
                        <label for="pcvv" class="form-label">CVV</label>
                        <input type="text" id="pcvv" class="form-control" placeholder="Enter CVV" required/>                     
                      </div>
                    </div>
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 my-2">
                        <label for="pexDate" class="form-label">Expiry Date</label>
                        <input type="text" id="pexDate" class="form-control" placeholder="Enter Expiry Fate" required/>                     
                      </div>
                    <div class="col-lg-6 offset-lg-3 mt-3 mb-5 ">   
                      <div class="form mx-4 my-2 d-grid" role="button" >
                        <button type="button" class="btn btn-primary" id="psubmit">Submit</button></a>     
                      <!-- </div>data-bs-toggle="modal" data-bs-target="#payModal -->
                      
                    </div>
                  </div>
            </div>
          
          
          <!-- <div class="modal" id="payModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Completed</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Payment has been completed! You will be redirected to home page</p>
                </div>
                <form action="index.php">
                <div class="modal-footer">
                  
                  <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                </div>
              </form>
              </div>
            </div>
          </div> -->
  
          </section>


          <footer class="bg-dark text-white mt-4 p-4">
            <div class="container text-left">
              <div class="row text-left">
                <div class="col-4 p-2 m-4" >
                  <h4 class="mb-4">Contact Us</h4>
                  <p> <i class="fas fa-phone-alt"> | 01712345675</i></p>
                  <p> <i class="far fa-envelope"> | ata@gmail.com</i> </p>
                  <p> <i class="far fa-map"> | Dhaka, Bangladesh</i>         </p>
                </div>
                <div class="col text-end p-3 mt-3">
                  
                  <a href="#"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-twitter-square"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <p class="mt-5">@2021 Ataturk. All rights reserved</p>
                </div>
              </div>
            </div>
          </footer>
          <script>
            $(document).ready(function(){
            $('#psubmit').click(function(){
              
              
              var pcardNum=$('#pcardNum').val();
              var pcvv=$('#pcvv').val();
              var pexDate=$('#pexDate').val();
              
            
              if(pcardNum!='' && pcvv!=''
              && pexDate!=''
              ){
              $.ajax({
                url: "paypath.php", 
                method: "POST",
                data:{
                  pcardNum:pcardNum,
                  pcvv:pcvv,
                  pexDate:pexDate
                  
                  
                      
                
                },
                success:function(data){
                  if(data ==201){
                    alert("Wrong");
                    
                    //window.open("payment.php","_self");
                    
                  }
                  else{
                    
                    window.open("index.php","_self");
                                      
                    
                  }

                }

              });
            }
            


            })
            
            

          });

          </script>        

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>