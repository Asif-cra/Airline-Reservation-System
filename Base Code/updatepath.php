<?php
session_start();

$novacancy=501;
        include('connection.php');
        if (isset($_POST['uClass']) && isset($_POST['upassangerNum']) ){
        
            $error=201;

           $user_passangerNum=trim($_POST['upassangerNum']);
           $user_cabinClass=$_POST['uClass'];
           $user_rid=$_POST['crid'];
           $user_sid=$_POST['csid'];

          $chck_seat_update="CALL `check_seats_for_update`('$user_rid','$user_cabinClass');";
          $chk_class_pass=mysqli_query($conn,$chck_seat_update);
          $result=0;

          if($chk_class_pass){
           while($row=mysqli_fetch_assoc($chk_class_pass)){
            $result=$row['classcount'];
             
           }
          }
          else {
            echo 203;
          die();
          }
          $chk_class_pass->close();
          mysqli_next_result($conn);
          
          
         
          if($result>=$user_passangerNum){
           



          
          $insrt="call update_reservation('$user_rid','$user_sid','$user_cabinClass'
          ,'$user_passangerNum');";
          

          $insrt_pass=mysqli_query($conn, $insrt);
          

         
          if($insrt_pass){
          //  echo 5533;
            
            

          }
          else{
            echo $error;
            echo mysqli_error($conn);
            die();
          
            
          }
        
        }
        else echo $novacancy;
      }
      


        if(isset($_POST['action'])){
            unset($_SESSION['lemail']);

        }
        
        


        ?>