<?php
session_start();


        include('connection.php');
        if (isset($_POST['lemail']) && isset($_POST['lpassword']) ){
        
            $error=201;
            $ad_Status=1005;
           $user_lmail=trim($_POST['lemail']);
           $user_lpass=trim($_POST['lpassword']);
           
         //checking_admin
         $chk_alogin="select * from admin_asi where email='$user_lmail';" ;
         $l_aquery= mysqli_query($conn,$chk_alogin);
         if(mysqli_num_rows($l_aquery)>0){
           $_SESSION['lemail']=$user_lmail;
           $name="select a_name from admin_asi where email='$user_lmail'";
           $name_fine=mysqli_query($conn,$name);
           while( $row=mysqli_fetch_assoc($name_fine)){
            $_SESSION['fname']=$row["a_name"];
            }
            $_SESSION['Admin']=1;
            echo $ad_Status;
         }
         else{





         $chk_login="select * from passangercredentials where email='$user_lmail'";
         $l_query= mysqli_query($conn,$chk_login);

        $chk_login="select * from passangercredentials where email='$user_lmail'";
          $l_query= mysqli_query($conn,$chk_login);

         
          if(mysqli_num_rows($l_query)>0){
            $_SESSION['lemail']=$user_lmail;
            $f_query="select firsName from passanger
            join passangercredentials on p_id=passanger.Id
             where email='$user_lmail';";
             
            $fname=mysqli_query($conn,$f_query);
           while( $row=mysqli_fetch_assoc($fname)){
            $_SESSION['fname']=$row["firsName"];
            }
            

          }
          else{
            echo $error;
          
            
          }
        
        }
        }
        if(isset($_POST['action'])){
            unset($_SESSION['lemail']);
            unset($_SESSION['fname']);
            if(isset($_SESSION['Admin']))
               unset($_SESSION['Admin']);
        }
        
        


        ?>
        