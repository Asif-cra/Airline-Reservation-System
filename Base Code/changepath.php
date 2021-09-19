<?php
session_start();


        include('connection.php');
        if (isset($_POST['corigin'])  ){
        
            $error=201;
           $user_corigin=trim($_POST['corigin']);
           $user_cto=trim($_POST['cdestiny']);
           
           $user_sid=$_POST['csid'];
          
           $user_rid=$_POST['crid'];

           $query="call cancel_flight('$user_rid')";
           $query_pass=mysqli_query($conn,$query);
          

         
          if($query_pass){
           echo 5883;
            
            

          }
          else{
            echo $error;
          
            
          }
        
        }
        if(isset($_POST['cancel'])){
          $user_mail=$_SESSION['lemail'];


        }
        // if(isset($_POST['action'])){
        //     unset($_SESSION['lemail']);

        // }
        
        


        ?>