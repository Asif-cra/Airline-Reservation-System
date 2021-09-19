 <?php 
session_start();
if(!isset($_SESSION['lemail'])){
  header("location:index.php");
}

?> 



<html>
    <head>
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
    <title>Booking| </title>
    
    <body>
        <header>
          <!-- navbar -->
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
                    
                   
                    
                </ul>
                <div class="dropdown" id="dropIt" <?php if(isset($_SESSION['lemail'])){
                    echo "style='display:block'";
                  }  
                  else{
                    echo "style='display:none'";
                  }
                  ?> >
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php
                        if(isset($_SESSION['lemail']))
                          echo $_SESSION['fname'];
                        else
                          echo "Profile";  

                       ?>
                       

                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="manage.php">Manage</a></li>
                      <li><a class="dropdown-item" href="history.php">History</a></li>
                      <li><a class="dropdown-item" href="#" id="signOut" name="signOut" >Sign Out</a></li>
                      <li><a class="dropdown-item" href="ManageP.php">Manage Profile</a></li>
                    </ul>
                  </div>
                        
            </div>
          </div>
        </nav>
          </header>
          <!-- Booking form -->

          <div class="container text-center p-4 mb-2 mt-4">
            <h1 style="color:A19CA4;" class="mt-4"> <strong><u> Book Your Flight</u></strong> </h1>
          </div>
          
          <div class="container text-center">
              <div class="row align-items-center">
                <div class="col-lg-12 ">
                  <div class="form-floating m-4">


                  <?php
                    $origin=$_POST['oplace'];
                   echo" <input type='text' readonly id='originp' class='form-control'
                    value='{$origin}' required/>
                    <label for='destp' class='form-label'>Origin</label>"
                  ?>  


                  </div>
                </div>
                <div class="col-lg-12 ">
                  <div class="form-floating mx-4">

                  <?php
                    $destination=$_POST['dplace'];
                  echo"  <input type='text' readonly id='destp' class='form-control'
                     value='{$destination}' required/>
                    <label for='destp' class='form-label'>Destination</label>
                    ";
                  ?>

                  </div>
                </div>
                <div class="col-lg-6 ">
                  <div class="form-floating mx-4 my-4">
                    <select class="form-select" id="passangerNum" >
                      <option selected>Number of passanger</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      
                    </select>
                    <label for="passangerNum">Select</label>
                  </div>
                </div>
                <div>
                  
                </div>
                <div class="col-lg-6 ">
                  <div class="form-floating mx-4 my-4">

                  <?php
                    $cclass=$_POST['BcabinClass'];
                    $setclass='';
                    if($cclass=='E')
                      $setclass="Economy";
                    else if($cclass=='B')
                      $setclass="Business";
                    else     
                      $setclass="First Class";  
                  echo"  <input type='text' readonly id='cabinClass' class='form-control'
                     value='{$setclass}' />
                    <label for='cabinClass' class='form-label'>Destination</label>
                    ";
                  ?>

                  </div>

                </div>
                <div class="col-lg-6 offset-lg-3 mt-4 "> 
               <select class="form-select" id="dtime" name="dtime">
               <option selected>Select time</option> 
               <?php
                    include('connection.php');
                    $date=$_POST['fDate'];
                    $org=$_POST['oplace'];
                    $dg=$_POST['dplace'];

      
                    $call="call check_flight_time('$date','$org','$dg')";
                    $callpass=mysqli_query($conn,$call);

                    if(mysqli_num_rows( $callpass)>0){  
                      while($row=mysqli_fetch_assoc($callpass)){
                        echo"  <option value='{$row['dtime']}'>{$row['Stime']}</option>
                  
                      ";
                      }
                    }
               ?>
               </select>
               </div>
               
                  
               
              
                <div class="col-lg-3 mx-4 mb-5 mt-3 ">
                  <div class="form-check mx-1">
                    <input class="form-check-input" type="radio" name="baggageCheck" id="baggageRadio"
                    >
                    <label class="form-check-label" for="flexRadioDefault1">
                      Are you carrying baggage?
                    </label>
                  </div>
                </div>
                <div class="col-lg-3 ">
                  <button type="button" class="btn btn-primary " id="bookSubmit" style="display: block;">
                    Submit
                  </button> 
                </div>
             </div>     
          </div>
        

          <!-- Baggage -->

          <section class="baggage-form" style="margin-top: 200px; display: none;">
            <hr>
            <div class="container-fluid text-center mt-5">
              <h1 style="color:A19CA4;"> <strong><u> Baggage Info</u></strong> </h1>
            </div>
            <div class="text-center">
              <p class="mt-5">
                Note: Total weight of baggage of more than 23 kilograms will be charged 
              </p>
            </div>
            
            <div class="container text-start">
                  <div class="row align-items-center">             
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 mb-2 mt-4 ">
                        <label for="numOfBags" class="form-label"><b>Number of Bags</b></label>
                        <input type="text" id="numOfBags" class="form-control" placeholder="Input should be an integer" required/>                     
                      </div>
                    </div>
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 my-2 ">
                        <label for="tWeight" class="form-label">Total Weight</label>
                        <input type="text" id="tWeight" class="form-control" placeholder="Enter a number" required/>                     
                      </div>
                    </div>
                    
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 my-2 d-grid">
                        <button type="button "class="btn btn-primary" id="fbook">
                          Submit
                        </button>      
                      </div>
                      
                    </div>
                  </div>
            </div>
          
          

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
          <!-- ajax -->
          <script>
            /* If no baggage*/ 
            
          $(document).ready(function(){
            $('#bookSubmit').click(function(){
              
              
              var originp=$('#originp').val();
              var destp=$('#destp').val();
              var passangerNum=$('#passangerNum').val();
              var cabinClass=$('#cabinClass').val();
              console.log(originp);
            
              if(originp!='' && destp!=''
              && passangerNum!=''&& cabinClass!=''
              ){
              // $.ajax({
              //   url: "bookpath.php",
              //   method: "POST",
              //   data:{
              //     originp:originp,
              //     destp:destp,
              //     passangerNum:passangerNum,
              //     cabinClass:cabinClass
                  
                      
                
              //   },
              //   success:function(data){
              //     if(data ==201){
              //       alert("wrong");
                    
                    
              //     }
              //     else{
                    
              //       // location.reload();
              //        alert("correct");
              //        window.open("payment.php","_self");
                    
                                      
                    
              //     }

              //   }

              // });
            }
            


            })
            
            

          });




          $(document).ready(function(){
            $('#fbook').click(function(){
              
              
              var originp=$('#originp').val();
              var destp=$('#destp').val();
              var passangerNum=$('#passangerNum').val();
              var cabinClass=$('#cabinClass').val();
              var numOfBags=$('#numOfBags').val();
              var tWeight=$('#tWeight').val();
              var dtime=$('#dtime').val();
              if(cabinClass=="Economy")
                  cabinClass='E';
              else if(cabinClass=="Business")
                   cabinClass='B';
              else cabinClass='F'  ;
              console.log(originp,destp,passangerNum,dtime,cabinClass);
              
              
              if(originp!='' && destp!=''
              && passangerNum!=''&& numOfBags!=''
              && tWeight!='' && dtime!=''&& cabinClass!=''
              ){
              $.ajax({
                url: "bookpath.php",
                method: "POST",
                data:{originp:originp,
                  destp:destp,
                  passangerNum:passangerNum,
                  cabinClass:cabinClass,
                  numOfBags:numOfBags,
                  tWeight:tWeight,
                  dtime:dtime
                  
                      
                
                },
                success:function(data){
                  console.log(data);
                  if(data==201){
                    alert("wrong");
                    console.log(data);
                    
                    
                  }
                 else if(data==501){
                    alert("No more seats");
                    console.log(data);
                    
                    
                  }
                  else if(data==203){
                    alert("Wrong query");
                    console.log(data);
                    
                    
                  }
                  else{
                    console.log(data);
                       window.open("payment.php","_self");
                                      
                    
                  }

                }

              });
            }
            


            })
            
            

          });

        </script>
                
               
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jq.js"></script>    
    <script src="jsBookin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>