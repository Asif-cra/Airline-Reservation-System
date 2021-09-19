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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                      
                     
                      <li class="nav-item" id="logIn" <?php if(isset($_SESSION['lemail'])){
                        echo "style='display:none'";
                      }
                      ?>
                      >
                        <a href="#" class="nav-link links" data-bs-toggle="modal"
                         data-bs-target="#loginModal">Login</a>
                      </li>
                      <li class="nav-item" id="ads" style="display: none;">
                        <a href="ads.php" class="nav-link links" >Ads</a>
                      </li>
                  </ul>
                  <div class="dropdown" id="dropIt" <?php if(isset($_SESSION['lemail'])
                  && !(isset($_SESSION['Admin'])) ){
                    echo "style='display:block'";
                  }  
                  else{
                    echo "style='display:none'";
                  }
                  ?> >
                    <button class="btn btn-secondary dropdown-toggle"
                     type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                      <?php
                        if(isset($_SESSION['lemail']))
                          echo $_SESSION['fname'];
                        else
                          echo "Profile"; 

                       ?>
                       

                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="drpMen">
                      <li><a class="dropdown-item" href="manage.php">Manage</a></li>
                      <li><a class="dropdown-item" href="history.php">History</a></li>
                      <li><a class="dropdown-item" href="#" id="signOut"
                       name="signOut" >Sign Out</a></li>
                      <li><a class="dropdown-item" href="ManageP.php">Manage Profile</a></li>
                    </ul>
                  </div>

                  <!-- for admin -->

                  <div class="dropdown" id="drop" <?php if(isset($_SESSION['Admin'])){
                    echo "style='display:block'";
                  }  
                  else{
                    echo "style='display:none'";
                  }
                  ?> >

                    <button class="btn btn-secondary dropdown-toggle"
                     type="button"
                     data-bs-toggle="dropdown" >
                      <?php
                        if(isset($_SESSION['lemail']))
                          echo $_SESSION['fname'];
                        else
                          echo "Profile";  

                       ?>
                       

                    </button>

                    <ul class="dropdown-menu"
                     id="drpMenAds" >
                      <li><a class="dropdown-item" href="ads.php">Managead</a></li>
                      <li><a class="dropdown-item" href="#" id="signOutAds"
                       name="signOutAds" >Sign Out</a></li>

                    </ul>
                  </div>

                          
              </div>
            </div>
          </nav>
        </header>

        <!-- modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content form-elegant" >
                <div class="modal-header">
                  <h5 class="modal-title mt-3 w-100 dark-grey-text text-center" id="modalLabel">
                    <strong>Login</strong>
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                    &times;
                  </button>

                </div>
                <div class="modal-body m-3 p-2">
                  
                  <div class="form-floating m-4">
                    <input type="text" id="lemail" name="lemail" class="form-control" placeholder="example@gmail.com" required/>
                    <label for="lemail" class="form-label">Enter Email</label>
                  </div>
                  <div class="alert alert-danger" id="loginMailAlert" style="display:none">
                      <p>Invalid email</p>
                    </div>
                  <div class="form-floating m-4">
                    <input type="password" id="lpassword" name="lpassword" class="form-control" placeholder="1234aeer" required>
                    <label for="lpassword" class="form-label">Enter password</label>
                  </div>
                  <div class="alert alert-danger" id="loginPassAlert" style="display:none">
                      <p>Invalid password</p>
                    </div>
                  <div class="container d-flex justify-content-end">
                   <a href="#" >Forgot
                    Password?</a>
                  </div>
                  <div class="text-center m-3">
                    
                    <button type="button" 
                    class="btn btn-primary btn-lg" name="signIn" id="signIn" >Sign in</button>
                  </div>
                
          
                  

                </div>
                <div class="modal-footer">
                  <divc class="container text-center">
                  <p class=" " >Not a member? <a href="register.php" class="">
                      Sign Up</a></p>
                    </div>
                </div>

              </div>   
          </div>
      </div>
        <!-- modal -->
        
        <!-- access login with db -->
        <script>
          $(document).ready(function(){
            $('#signIn').click(function(){
              
              
              var lemail=$('#lemail').val();
              var lpassword=$('#lpassword').val();
              if(lemail!='' && lpassword!=''){
              $.ajax({
                url: "login.php",
                method: "POST",
                data:{lemail:lemail, lpassword:lpassword},
                success:function(data){
                  if(data ==201){
                    alert("Wrong");
                    $('#loginMailAlert').show();
                  }
                  else if(data==1005){
                    $('#loginModal').modal('hide');
                    
                    location.reload();
                    $('#logIn').hide();
                    // $('#drpMen').hide();
                    // $('drpMenAds').show();
                  }
                  else{
                    
                    $('#loginModal').modal('hide');
                    
                    location.reload();
                    $('#logIn').hide();
                   
                    
                    
                  }

                }

              });
            }
            


            })
            
            $("#signOut").click(function(){
              console.log("tapped");
                var action = "signOut";
                $.ajax({

                  url :"login.php",
                  method:"POST",
                  data :{action:action},
                  success:function(){
                    location.reload();
                   
                  }

                })

              
              });
              $("#signOutAds").click(function(){
              console.log("tapped");
                var action = "signOut";
                $.ajax({

                  url :"login.php",
                  method:"POST",
                  data :{action:action},
                  success:function(){
                    location.reload();
                   
                  }

                })

              
              });

          });

        </script>



<?php /*
                        if(isset($_SESSION['lemail']))
                          echo $_SESSION['lemail'];
                        else
                          echo "Profile";  

                     */  ?>

        <!-- access login with db -->

            <!-- <section>
            <div class="container-fluid">
            <div class="search-card shadow p-3 mb-5 bg-white rounded">
                they are
            </div>
            </div>
          </section> -->

          <!-- search card -->
          <div class="box-container" id="search-card">
            
           <form action="Booking.php" method="post">
            <i class="fas fa-plane-departure"></i>
              <select class='ips' id='oplace' name="oplace">
                  <option selected>Open this select menu</option>
                  <?php
                    include('connection.php');
                    $dest="call destinations()";
                    $destpass=mysqli_query($conn,$dest);

                    if($destpass){  
                      while($row=mysqli_fetch_assoc($destpass)){
                        echo"  <option value='{$row['City']}'>{$row['City']}, {$row['Name']}</option>
                  
                      ";
                      }
                    }
               ?>
               </select>
               <select class="ips" id="dplace" name="dplace">
                  <option selected>Open this select menu</option>
                  <?php
                    include('connection.php');
                    $dest="call destinations()";
                    $destpass=mysqli_query($conn,$dest);

                    if($destpass){  
                      while($row=mysqli_fetch_assoc($destpass)){
                        echo"  <option value='{$row['City']}'>{$row['City']}, {$row['Name']}</option>
                  
                      ";
                      }
                    }
               ?>
               </select>
                <!-- <label for="oplace"> <i class="fas fa-plane-departure"></i> From</label>
                <input type="text" class="ips" id="oplace" name="oplace" placeholder="Select a city">
                <label for="dplace"><i class="fas fa-plane-arrival"></i> TO</label>
                <input type="text" class="ips" id="dplace" name="dplace" placeholder="Select a city"> -->
                <button type="button" class="btn btn-outline-danger btn-lg mb-3"
                 id="checkFlight" style="display: none;" >Check</button>
                <button type="submit" class="btn btn-outline-primary btn-lg mb-3"
                 id="cardSubmit" style="display: none;">Submit</button>
                

                <!-- <button type="submit" class="ips" id="searchsubmit"> Submit </button> <br> -->
                <!-- <input type="text" class="invisible-inputs" id="Cabin" name="cabclass" placeholder="Class"> -->
                
                    <select class="invisible-inputs" id="BcabinClass" name="BcabinClass" >
                        <option value="E">Economy</option>
                        <option value="B">Business</option>
                        <option value="F">First class</option>
                    </select>
                    
                <input type="date" class="invisible-inputs"
                 id="fDate" name="fDate" placeholder="Date"> 
                    
                  </form>


            
            
          </div>
          
          <script>
            let secondinp= document.getElementById('dplace');
            let card=document.querySelector('.box-container')
            secondinp.addEventListener('change',function(){
              document.getElementById('checkFlight').style.display="inline";
            card.classList.add('bigger-card');
            })
          </script>

          <!-- sending data to search page -->
          <script>

          $(document).ready(function(){
            $('#checkFlight').click(function(){
              
              
              var oplace=$('#oplace').val();
              var dplace=$('#dplace').val();
              
              var fDate=$('#fDate').val();
              var BcabinClass=$('#BcabinClass').val();
              console.log(oplace,dplace,fDate);
              if(fDate!='' &&oplace!='' ){
              $.ajax({
                url: "searchFlight.php",
                method: "POST",
                data:{
                  oplace:oplace,
                  dplace:dplace,
                  fDate:fDate,
                  BcabinClass:BcabinClass
                },
                success:function(data){
                  if(data==401){
                    alert("Not found");
                  }
                  else{
                    console.log(data);
                    $('#cardSubmit').show();
                    $('#checkFlight').hide();
                  }
                }
              });}
            })
          });

          </script>




         
          <!-- long card -->
          <section>
            <div class="container">
              <div class="row p-3 g-3">
                <div class="col-lg-12">
                    <div class="card bg-dark text-white">
                      <img src="image/1.jpg" class="card-img" alt="TravleImage">
                      <div class="card-img-overlay">
                        <div class="card-body">
                          <h5 class="card-title">Where do you want to go?</h5>
                        <p class="card-text"> Travel in 16 countries </p>
                        <p class="card-text">37 Major Cities.</p>
                        </div>
                        <div class="card-footer mt-5">
                          <a class="btn btn-outline-light " href="">
                            Book now
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                    <img src="image/card2.jpg"class="card-img-top imgc"  alt="TravleImage"  >
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Where do you want to go?</h5>
                      <p class="card-text"> This is not </p>
                      <p class="card-text">THis is not</p>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <img src="image/card3.jpg" class="card-img-top"  alt="TravleImage">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Where do you want to go?</h5>
                    <p class="card-text"> This is not </p>
                    <p class="card-text">THis is not</p>
                    </div>
                    
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <img src="image/card4.jpg" class="card-img-top"  alt="TravleImage">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Where do you want to go?</h5>
                  <p class="card-text"> This is not </p>
                  <p class="card-text">THis is not</p>
                  </div>
                  
                </div>
              </div>
          </div>
            
              </div>
            </div>
          </section>
          <section class="p-5">
            <div class="container">
              <div class="row align-items-center justify-content-between">
                <div class="col-md-7">
                  <img src="image/plane pic.jpg" class="ask-img" alt="">
                </div>
                <div class="col-md">
                  <h2>Looking for safey? </h2>
                  <p>
                  We assure you that you will 
                  enjoy a safe flight with your Family and Friends.
                  </p>
                </div>
              </div>
            </div>
          </section>
        </section>
        <section class="p-3">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-md m-4 ">
                <h2>Bored at home?</h2>
                <p>
                Get the chance to view the Wonders of the world.
                Not everyone gets the chance to get such a sight.
                </p>
              </div>
              <div class="col-md-7 ml-5" style="margin-right:2px ;">
                <img src="image/air3.jpg" class="ask-img2" alt="">
              </div>
              
            </div>
          </div>
        </section>


        <section class="mb-5 mt-5 p-4 bg-dark" style="height: 300px;">
          <div class="container-fluid text-center text-white">
            <h3  >Why should you choose us?</h3>
            <hr class="mb-5 mt-4" style="height: 3px;">

            <p>We being the only airline reservation system of Bangladesh, 
              have taken oath to serve our people with all the best facilities
              available in the world, making an "All In One" System.
              We are with you by your journey from one part to the other part of the world.</p>
            
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="JSh.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>
