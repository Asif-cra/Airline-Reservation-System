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

        
        <!-- register form -->
        <section class="register-form" >
          
          <div class="container-fluid text-center mt-5">
            <h1 style="color:A19CA4;" class="mb-5"> <strong><u> Register</u></strong> </h1>
          </div>
          
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <div class="container text-start" id="remailid">
                <div class="row">             
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 mb-2 mt-4 ">
                      <label for="fname" class="form-label" ><b>First Name</b></label>
                      <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter first name" 
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>
                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2 ">
                      <label for="lname" class="form-label">Last Name</label>
                      <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last name"
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>
                  </div>
                  <div class="col-lg-6 offset-lg-3 " >   
                    <div class="form mx-4 my-2">
                      <label for="remail" class="form-label">E-mail</label>
                      <input type="email" name="remail" id="remail" class="form-control" placeholder="Enter e-mail"
                      
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>
                    <div class="alert alert-danger" id="regMailAlert" style="display:none">
                      <p>Email already exists</p>
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rphone" class="form-label">Phone</label>
                      <input type="text" name="rphone" id="rphone" class="form-control" placeholder="Enter phone number" 
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="raddress" class="form-label">Address</label>
                      <input type="text" name="raddress" id="raddress" class="form-control" placeholder="Enter your address"
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rcountry" class="form-label">Country</label>
                      <input type="text" name="rcountry" id="rcountry" class="form-control" placeholder="Enter country name"
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rpassword" class="form-label">Password</label>
                      <input type="password" name="rpassword" id="rpassword" class="form-control" placeholder="Enter password" 
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rcpassword" class="form-label">Confirm Password</label>
                      <input type="password" name="rcpassword" id="rcpassword" class="form-control" placeholder="Enter password" 
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rdob" class="form-label">Date Of Birth</label>
                      <input type="text" name="rdob" id="rdob" class="form-control" placeholder="Enter dob"
                      value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>"
                      required/>                     
                    </div>

                  </div>
         
                  <div class="col-lg-6 offset-lg-3 mt-3 mb-5 ">   
                    <div class="form mx-4 my-2">
                      <button type="submit" name="regbtn" id="regbtnd" class="btn btn-primary"  > Submit</button>   
                    </div>
                    <!-- data-bs-toggle="modal" data-bs-target="#regModal"   -->
                  </div>
                </div>
          </div>
        </form>

        <?php
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){

   $user_fname=trim($_POST['fname']);
   $user_lname=trim($_POST['lname']);
   $user_rmail=trim($_POST['remail']);
   $user_phone=trim($_POST['rphone']);
   $user_raddress=trim($_POST['raddress']);
   $user_rcountry=trim($_POST['rcountry']);
   $user_rpassword=trim($_POST['rpassword']);
   $user_rcpassword=trim($_POST['rcpassword']);
   $user_rdob=trim($_POST['rdob']);
  
$chk_mail="select * from passangercredentials where email='$user_rmail'";
  $r_qury= mysqli_query($conn,$chk_mail);
if(mysqli_num_rows($r_qury)>0){
  
   echo "<script>document.getElementById('regMailAlert').style.display='block'
   window.location.hash = '#remailid';
   </script>";
   // <script> window.open('register.php','_self') </script>

   
}
else{
$insrt="call insert_passanger('$user_fname','$user_lname','$user_raddress','$user_phone','$user_rcountry','$user_rdob','$user_rpassword','$user_rmail')";
$insrt_pass=mysqli_query($conn, $insrt);


}


}



?>

        </section>
        <!-- modal -->
        <div class="modal" id="regModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Registered</h5>
                
              </div>
              <div class="modal-body">
                <p>Thank you for registering! You will be redirected to home page</p>
              </div>
              <form action="index.php">
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>


        <!-- footer -->
        <footer class="bg-dark text-white mt-4 p-4">
          <?php
            include('footer.php');
          ?>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- <script >
      var myModal = new bootstrap.Modal(document.getElementById('regModal'))
            var inpt= document.getElementById('remail');
            
            
              var btn= document.getElementById('regbtnd');

              btn.addEventListener('click',(e)=>{
                if(inpt.value!=''){
                   myModal.show();
                  window.open('index.php','_self');
                }
              })
             
            

           
    </script> -->
  </body>
</html>