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

         

          <div class="container text-center p-4 mb-2 mt-4">
        
            <h1 style="color:A19CA4;" class="mt-4"> <strong><u> Make changes</u></strong> </h1>
          </div>








           <div class="container text-center text-danger"

           <?php
           
           $dtime=$_GET['dtime'];
           include('connection.php');

           $query="SELECT TIMESTAMPDIFF(HOUR, '$dtime', Now()) as timeas;";
           $query_pass=mysqli_query($conn,$query);
           $result=0;
           while($row=mysqli_fetch_assoc($query_pass)){
            $result=$row['timeas'];
           }       
           if($result>3)
            echo " style='display: block;'";

          else
             echo " style='display: none;'";
           $query_pass->close();
           mysqli_next_result($conn);   


           ?>
          
          
           >
                  <p>You cannot change before 24 hours</p>
           </div>       


          <h6 class="text-center">If you want to change something you must delete this flight and make a new one</h6>
            <div class="container text-start"
            <?php
           
           $dtime=$_GET['dtime'];
           include('connection.php');

           $query="SELECT TIMESTAMPDIFF(HOUR, '$dtime', Now()) as timeas;";
           $query_pass=mysqli_query($conn,$query);
           $result=0;
           while($row=mysqli_fetch_assoc($query_pass)){
            $result=$row['timeas'];
           }       
           if($result>3)
            echo " style='display: none;'";

          else
             echo " style='display: block;'";
           $query_pass->close();
           mysqli_next_result($conn);   


           ?>
            
            
            >
                  <div class="row">   
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 mb-2 mt-4 ">
                        <label for="corigin" class="form-label"><b>Previous Origin</b></label>
                        <?php
                        $origin=$_GET['origin'];
                       echo" <input type='text' id='corigin' class='form-control' readonly
                        value='{$origin}'
                        />   ";
                        ?>                  
                      </div>
                    </div> 
                    <div class="col-lg-6 offset-lg-3 ">   
                      <div class="form mx-4 mb-2 mt-4 ">
                        <label for="cdestiny" class="form-label"><b>Previous Destination</b>
                      </label>
                      <?php
                        $destin=$_GET['cdestination'];
                       echo" <input type='text' id='cdestiny' class='form-control' readonly
                        value='{$destin}'
                        />   ";
                        ?> 
                      </div>
                    </div>  
                    <div class="col-lg-6 offset-lg-3 " >   
                      <div class="form mx-4 mb-2 mt-4 ">
                      <select class="form-select" id="upassangerNum" >
                      <option selected>Number of passanger</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      
                    </select>
                      </div>
                    </div>
                    <div class="col-lg-6 offset-lg-3 " >   
                      <div class="form mx-4 mb-2 mt-4 ">
                      <select class="form-select" id="uClass" >
                     
                      <option value="E">Economy</option>
                      <option value="F">First Class</option>
                      <option value="B">Business</option>
                      
                    </select>
                      </div>
                    </div>     
                    <div class="col-lg-6 offset-lg-3 " style="display: none;">   
                      <div class="form mx-4 mb-2 mt-4 ">
                        <label for="csid" class="form-label"><b>Previous Destination</b>
                      </label>
                      <?php
                        $sid=$_GET['sc_id'];
                       echo" <input type='text' id='csid' class='form-control' readonly
                        value='{$sid}'
                        />   ";
                        ?> 
                      </div>
                    </div> 
                    

                    <div class="col-lg-6 offset-lg-3 "style="display: none;">   
                      <div class="form mx-4 mb-2 mt-4 ">
                       
                      <?php
                        $rid=$_GET['rid'];
                       echo" <input type='text' id='crid' class='form-control' readonly
                        value='{$rid}'
                        />   ";
                        ?> 
                      </div>
                    </div> 
                 
                    <div class="col-lg-6 offset-lg-3 ">   
                        <div class="form mx-4 my-2 ">
                          <button type="button" class="btn btn-primary" id="csubmit" >Submit</button>
                        </div>
                  </div>
                      <div class="col-lg-6 offset-lg-3 ">   
                        <div class="form mx-4 my-2 ">
                          <button type="button" class="btn btn-danger" id="ccancel" >Cancel Flight</button>
                        </div>
                      
                    
                    
                  </div>
                  
                  
            </div>
          

          <!-- <div class="modal" id="changeModal" tabindex="-1">
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

        <footer>

        </footer>
        <script>
          $(document).ready(function(){
           


            $('#ccancel').click(function(){
              
              
              var corigin=$('#corigin').val();
              var cdestiny=$('#cdestiny').val();
              
              var csid=$('#csid').val();
              var crid=$('#crid').val();
              console.log(corigin,cdestiny,crid,csid);
            
              if(1){
              $.ajax({
                url: "changepath.php",
                method: "POST",
                data:{
                  corigin:corigin,
                  cdestiny:cdestiny,
                  csid:csid,
                  crid:crid
                  
                  
                      
                
                },
                success:function(data){
                  if(data ==201){
                    alert("submit went wrong");
                    
                    
                  }
                  else{
                    
                    // location.reload();
                    // alert("correct");
                     window.open("index.php");
                    
                                      
                    
                  }

                }

              });}
            
            


            });
            // change submit
            $('#csubmit').click(function(){
              
              
              
              
              var upassangerNum=$('#upassangerNum').val();
              var uClass=$('#uClass').val();
              var csid=$('#csid').val();
              var crid=$('#crid').val();
              console.log(uClass,upassangerNum,csid,crid);
              // window.open('updatedpayment.php?rid='+crid,'_self');
              if(1){
              $.ajax({
                url: "updatepath.php",
                method: "POST",
                data:{
                  uClass:uClass,
                  upassangerNum:upassangerNum,
                  csid:csid,
                  crid:crid
                  
                  
                      
                
                },
                success:function(data){
                  if(data ==201){
                    alert("submit went wrong");
                    
                    
                  }
                  else if(data==501){
                    alert("no more seats");
                  }
                  else if(data==203){
                    alert("cant search seat");
                  }
                  else{
                    
                    // location.reload();
                    // alert("correct");
                    window.open('updatedpayment.php?rid='+crid,'_self');
                    // window.open("index.php");
                    
                                      
                    
                  }

                }

              });}
            
            


            });
            
            

          });

        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="JSh.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>