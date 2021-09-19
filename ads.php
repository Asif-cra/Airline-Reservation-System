<?php
session_start();

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
    <body>
        <header>
        <div class="container text-center p-4 mb-2 mt-4">
            <h1 style="color:A19CA4;" class="mt-4"> <strong><u> All flight schedules</u></strong> </h1>
        </div>
        <?php
      include('header.php');
      ?>
        </header>
        <section>
        <div class="container mt-4 p-3">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Origin</th>
            <th scope="col">Destination</th>
            <th scope="col">Departure Time</th>
            <th scope="col">Arrival time</th>
            <th scope="col">Duration</th>
          </tr>
        </thead>
        <tbody>
          <?php
           include('connection.php');
          $mail=$_SESSION['lemail'];
          $query=" call show_schedules();;";
          $query_fine=mysqli_query($conn, $query);
          $serial=1;
          while($row=mysqli_fetch_assoc($query_fine)){
         echo"
          <tr>
            <th scope='row'>{$serial}</th>
            <td>{$row['origin']}</td>
            <td>{$row['destination']}</td>
            <td>{$row['dtime']}</td>
            <td>{$row['atime']}</td>
            <td>{$row['duration']}</td>
          </tr>

          ";
          $serial++;
        }
          ?>
        </tbody>
      </table>
    </div>
    </section>
        <div class="container text-center p-4 mb-2 mt-4">
            <h1 style="color:A19CA4;" class="mt-4"> <strong><u> Add flight</u></strong> </h1>
        </div>
        <hr style="height: 3px; ">
        <section class="mt-4">
        <div class="container text-center">
        <div class="col-lg-6 offset-lg-3 mt-4 "> 
              <select class='form-select' id='oplace' name="oplace">
                  <option selected>Select Origin</option>
                  <?php
                    include('connection.php');
                    $dest="call destinations()";
                    $destpass=mysqli_query($conn,$dest);

                    if($destpass){  
                      while($row=mysqli_fetch_assoc($destpass)){
                        echo"  <option value='{$row['Airport_code']}'>{$row['City']}, {$row['Name']}</option>
                  
                      ";
                      }
                    }
               ?>
               </select>
        </div>
               <div class="col-lg-6 offset-lg-3 mt-4 "> 
               <select class="form-select" id="dplace" name="dplace">
                  <option selected>Select Destination</option>
                  <?php
                    include('connection.php');
                    $dest="call destinations()";
                    $destpass=mysqli_query($conn,$dest);

                    if($destpass){  
                      while($row=mysqli_fetch_assoc($destpass)){
                        echo"  <option value='{$row['Airport_code']}'>{$row['City']}, {$row['Name']}</option>
                  
                      ";
                      }
                    }
               ?>
               </select>
               </div>
               
                 <div class="col-lg-6 offset-lg-3 mt-4 ">   
                      <div class="form mx-4 my-2 d-grid">
                        <label for="aDate">Select arrival date</label>
                      <input type="date" class=""
                 id="aDate" name="adate" placeholder="Date">     
                      </div>
                      
                 </div>
                  
                 <div class="col-lg-6 offset-lg-3 mt-4 ">   
                      <div class="form mx-4 my-2 d-grid">
                        <select class='form-select' id='atime' name="atime">
                          <option selected>Select Arrival Time</option>
                          <option value="13:00:00">01:00 PM</option>
                          <option value="14:00:00">02:00 PM</option>
                          <option value="15:00:00">03:00 PM</option>
                        </select>      
                      </div>    
                 </div>
                 <div class="col-lg-6 offset-lg-3 mt-4 ">   
                      <div class="form mx-4 my-2 d-grid">
                      <label for="dDate">Select arrival date</label>
                      <input type="date" class=""
                 id="dDate" name="date" placeholder="Date">     
                      </div>
                      
                 </div>
                 <div class="col-lg-6 offset-lg-3 mt-4 ">   
                      <div class="form mx-4 my-2 d-grid">
                        <select class='form-select' id='dtime' name="dtime">
                          <option selected>Select Departure Time</option>
                          <option value="14:00:00">02:00 PM</option>
                          <option value="15:00:00">03:00 PM</option>
                          <option value="16:00:00">04:00 PM</option>
                        </select>      
                      </div>    
                 </div>
                 <div class="col-lg-6 offset-lg-3 mt-4 ">   
                      <div class="form mx-4 my-2 d-grid">
                        <select class='form-select' id='aricraft' name="aricraft">
                          <option selected>Assign Aricraft</option>
                          <option value="101">Boeing 737</option>
                          <option value="103">Airbus 320</option>
                          <option value="104">Boeing 720</option>
                        </select>      
                      </div>    
                 </div>
                 <div class="col-lg-6 offset-lg-3 mt-4 ">   
                      <div class="form mx-4 my-2 d-grid">
                        <button type="button "class="btn btn-primary" id="aflight">
                          Submit
                        </button>      
                      </div>
                      
                 </div>

                 

        </div>

        </section>

                    <!-- send data  -->
        <script>
          $(document).ready(function(){
            $('#aflight').click(function(){
              
              
              var oplace=$('#oplace').val();
              var dplace=$('#dplace').val();
              
              
              var aDate=$('#aDate').val();
              var dDate=$('#dDate').val();
              var atime=aDate+' '+$('#atime').val();
              var dtime=dDate+' '+$('#dtime').val();
              var aricraft=$('#aricraft').val();
              console.log(oplace,dplace,atime,dtime);
              if(oplace!='' &&atime!='' ){
              $.ajax({
                url: "addflight.php",
                method: "POST",
                data:{
                  oplace:oplace,
                  dplace:dplace,
                  aDate:aDate,
                  atime:atime,
                  dtime:dtime,
                  aricraft:aricraft
                },
                success:function(data){
                  if(data==201){
                    alert("Wrong");
                  }
                  else{
                    alert("Added");
                    location.reload();
                    
                  }
                }
              });}
            })
          });
        </script>
        <footer></footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>