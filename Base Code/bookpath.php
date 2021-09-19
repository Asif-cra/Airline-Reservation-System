<?php
session_start();

$novacancy=501;
        include('connection.php');
        if (isset($_POST['originp']) || isset($_POST['numOfBags']) ){
        
            $error=201;
            
           $user_originp=trim($_POST['originp']);
           $user_destp=trim($_POST['destp']);
           $user_passangerNum=trim($_POST['passangerNum']);
           $user_cabinClassF=$_POST['cabinClass'];
           $user_numOfBags=0;
           $user_tWeight=0;
           
           $user_time=$_POST['dtime'];
          
           

           if(isset($_POST['numOfBags'])){
              $user_numOfBags=trim($_POST['numOfBags']);
            }

           if(isset($_POST['tWeight'])){    
           $user_tWeight=trim($_POST['tWeight']);
          }

          $chck_class="call check_class('$user_cabinClassF','$user_originp','$user_destp',
          '$user_time' );";
          $chk_class_pass=mysqli_query($conn,$chck_class);
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
            // echo $result;
            // echo $user_originp;
            // echo $user_destp;
            // 
            // echo $user_cabinClassF;
            // echo $user_numOfBags;
            // echo $user_time;
            // echo $user_mail;
            // echo $user_tWeight;
            $user_mail=$_SESSION['lemail'];



          
          $insrt="call insert_reservation('$user_originp','$user_destp',
          '$user_passangerNum','$user_cabinClassF','$user_numOfBags',
          '$user_tWeight','$user_mail','$user_time');";
          

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