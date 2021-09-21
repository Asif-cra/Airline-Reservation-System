
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
          <?php 
            include('header.php');
          ?>
        </header>

        
        <!-- register form -->
        <section class="" >
          
          <div class="container-fluid text-center mt-5">
            <h1 style="color:A19CA4;" class="mb-5"> <strong><u> Register</u></strong> </h1>
          </div>
          
          
           <div class="container text-start" id="remailid">
                <div class="row">             
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 mb-2 mt-4 ">
                      <label for="fname" class="form-label" ><b>First Name</b></label>
                      <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter first name" 
                      
                      required/>                     
                    </div>
                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2 ">
                      <label for="lname" class="form-label">Last Name</label>
                      <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last name"
                      
                      required/>                     
                    </div>
                  </div>
                  <div class="col-lg-6 offset-lg-3 " >   
                    <div class="form mx-4 my-2">
                      <label for="remail" class="form-label">E-mail</label>
                      <input type="email" name="remail" id="remail" class="form-control" placeholder="Enter e-mail"
                      required/>                     
                    </div>
                    <div class="alert alert-danger" id="regMailAlert" style="display:none">
                      <p>Email already exists</p>
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rphone" class="form-label">Phone</label>
                      <input type="text" name="rphone" id="rphone" 
                      class="form-control" placeholder="Enter phone number" 
                      
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="raddress" class="form-label">Address</label>
                      <input type="text" name="raddress" id="raddress" class="form-control" placeholder="Enter your address"
                      
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                    <label for="rcountry" class="form-label">Country</label>
                    <select class="form-select" id='rcountry' name="rcountry">
                  <option selected>Select Country</option>
                  <?php
                    include('connection.php');
                    $query="select Country_code , `Name` from country;";
                    $query_pass=mysqli_query($conn,$query);

                    if($query_pass){  
                      while($row=mysqli_fetch_assoc($query_pass)){
                        echo"<option value='{$row['Country_code']}'>{$row['Name']}</option>
                  
                      ";
                      }
                    }
               ?>
               </select>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rpassword" class="form-label">Password</label>
                      <input type="password" name="rpassword" id="rpassword" class="form-control" placeholder="Enter password" 
                     
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rcpassword" class="form-label">Confirm Password</label>
                      <input type="password" name="rcpassword" id="rcpassword" class="form-control" placeholder="Enter password" 
                     
                      required/>                     
                    </div>

                  </div>
                  <div class="col-lg-6 offset-lg-3 ">   
                    <div class="form mx-4 my-2">
                      <label for="rdob" class="form-label">Date Of Birth</label>
                      <input type="date" name="rdob" id="rdob" class="form-control" placeholder="Enter dob"
                      
                      required/>                     
                    </div>

                  </div>
         
                  <div class="col-lg-6 offset-lg-3 mt-3 mb-5 ">   
                    <div class="form mx-4 my-2">
                      <button type="button" name="regbtn" id="regbtnd" class="btn btn-primary"  > Submit</button>   
                    </div>
                    <!-- data-bs-toggle="modal" data-bs-target="#regModal"   -->
                  </div>
                </div>
          </div>
          

  

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

        <div class="modal fade" id="warnmodal" tabindex="-1" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Empty Input</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                </div>
                <div class="modal-body">
                  <p>Please fill in all the information</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
        </div>
        <div class="modal fade" id="regmailalert" tabindex="-1" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Wrong Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
              </div>
              <div class="modal-body">
                <p class="text text-danger">Email already exists</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
        </div>



        <script>
          $(document).ready(function(){
            $('#regbtnd').click(function(){
              
              
              var fname=$('#fname').val();
              var lname=$('#lname').val();
              var remail=$('#remail').val();
              var rphone=$('#rphone').val();
              var raddress=$('#raddress').val();
              var rcountry=$('#rcountry').val();
              var rpassword=$('#rpassword').val();
              var rdob=$('#rdob').val();
              console.log(fname,lname,rphone,raddress,rcountry,rpassword,rdob,remail);
              
              
              if(fname!='' && lname!=''
              && rphone!=''&& raddress!=''
              && rcountry!='' && rpassword!='' && rdob!=''
              ){
              $.ajax({
                url: "regpath.php",
                method: "POST",
                data:{fname:fname,
                  remail:remail,
                  lname: lname,
                  rphone:rphone,
                  raddress:raddress,
                  rcountry:rcountry,
                  rpassword:rpassword,
                  rdob:rdob
                  
                  
                      
                
                },
                success:function(data){
                  console.log(data);
                  if(data==201){
                    alert("wrong");
                    console.log(data);
                    
                    
                  }
                 else if(data==333){
                    $('#regMailAlert').show();
                    console.log(data);
                    
                    
                  }
                 
                  else{
                    console.log(data);
                    $('#regModal').modal('show');
                       
                                      
                    
                  }

                }

              });
            }
            else{
              $('#warnmodal').modal('show');
            }
            


            })
            
            

          });
        </script>

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