<?php
session_start();


        include('connection.php');
        if (isset($_POST['pcardNum'])  ){
        
            $error=201;
           $user_pcardNum=trim($_POST['pcardNum']);
           $user_pcvv=trim($_POST['pcvv']);
           $user_pexDate=trim($_POST['pexDate']);
           
           $user_mail=$_SESSION['lemail'];
          $insrt="call insert_pay('$user_mail','$user_pcardNum',
          '$user_pcvv','$user_pexDate')";
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