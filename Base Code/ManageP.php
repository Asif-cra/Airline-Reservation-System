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
                        <li class="nav-item">
                          <a href="manage.php" class="nav-link links">Manage</a>
                        </li>
                       
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
        <div class="container text-center p-4 mb-2 mt-4">
          <h1 style="color:A19CA4;" class="mt-4"> <strong><u> Make changes to your profile</u></strong> </h1>
        </div>
        <h6 class="text-center">If you do not want something to change then please keep it empty</h6>
        
          <div class="container text-start">
                <div class="row">             
                  <div class="col-lg-6 offset-lg-3 ">   
                    
                    <div class="form mx-4 mb-2 mt-4 ">
                    <?php
                      include('connection.php');
                      $mail=$_SESSION['lemail'];
                      $query1=" call get_user_profile('$mail');";
                    $query_fine1=mysqli_query($conn, $query1);
                if($query_fine1) {
               while($row=mysqli_fetch_assoc($query_fine1)) {         
                    echo "
                    <p><b>Name:</b> $row[FirsName] $row[LastName]</p>
                    <p><b>Address:</b> $row[Address]</p>
                    <p><b>Phone:</b> $row[Phone]</p>
                    <p><b>Refund amount:</b> $row[amount]</p>
                    
                    ";
 
                    


               }}
            ?>          
                    </div>
                    <div class="container">
                    <input class="form-check-input" type="radio" name="parm" id="pradio"
                    >
                    <label class="form-check-label" for="flexRadioDefault1">
                      Change pass word
                    </label>
                    </div>
                  </div>
                  
                    <div class="col-lg-6 offset-lg-3 " id="changepass" style="display: none;">   
                      <div class="form mx-4 my-2 ">
                        <button type="submit" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#changePModal">Submit</button>
                        <button type="submit" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#changePModal">Delete Account</button>
                      </div>
                    </div>
                  
                  
                </div>
                
          </div>
          <script>
              $('#pradio').on('change', function() {
                $('#changepass').show();
            });
          </script>
        
        <!-- <div class="modal" id="changePModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Changes Applied</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Changes have been applied! You will be redirected to home page</p>
              </div>
              <form action="index.php">
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
              </div>
            </form>
            </div>
          </div>
        </div> -->

        
        <footer></footer>
        <script>
          $(document).ready(function(){
            $('#ccancel').click(function(){
              var cancel=211;
              $.ajax({
                url: "paypath.php",
                method: "POST",
                data:{
                  naddress:naddress,
                },
                success:function(data){
                  if(data ==201){
                    alert(corigin);
                    //window.open("payment.php","_self");  
                  }
                  else{

                  }
                }
              });
            });


            $('#csubmit').click(function(){
              
              
              var corigin=$('#corigin').val();
              var cto=$('#cto').val();
              var ccabinClass=$('#ccabinClass').val();
              
            
              
              $.ajax({
                url: "changepath.php",
                method: "POST",
                data:{
                  corigin:corigin,
                  cto:cto,
                  ccabinClass:ccabinClass
                  
                  
                      
                
                },
                success:function(data){
                  if(data ==201){
                    alert(corigin);
                    //window.open("payment.php","_self");
                    
                  }
                  else{
                    
                    // location.reload();
                    // alert("correct");
                    // console.log(data);
                                      
                    
                  }

                }

              });
            
            


            })
            
            

          });

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="JSh.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>