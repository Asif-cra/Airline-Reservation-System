<?php
session_start();


        include('connection.php');
        if (isset($_POST['originp']) || isset($_POST['numOfBags']) ){
        
            $error=201;
           $user_originp=trim($_POST['originp']);
           $user_destp=trim($_POST['destp']);
           $user_passangerNum=trim($_POST['passangerNum']);
           $user_cabinClassF='E';
           $user_numOfBags=0;
           $user_tWeight=0;
           $user_cabinClass=($_POST['cabinClass']);
          
           
          $user_mail=$_SESSION['lemail'];
          $insrt="call insert_reservation('$user_originp','$user_destp',
          '$user_passangerNum','$user_cabinClassF','$user_numOfBags',
          '$user_tWeight','$user_mail')";
          $insrt_pass=mysqli_query($conn, $insrt);
          

         
          if($insrt_pass){
           
            
            

          }
          else{
            echo $error;
          
            
          }
        
        }
        if(isset($_POST['action'])){
            unset($_SESSION['lemail']);

        }
        
        


        ?>