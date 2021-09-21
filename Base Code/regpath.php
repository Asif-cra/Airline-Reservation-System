<?php

$error=201;
$duplicate=333;
include('connection.php');

if(isset($_POST['remail'])){
   

   $user_fname=trim($_POST['fname']);
   $user_lname=trim($_POST['lname']);
   $user_rmail=trim($_POST['remail']);
   $user_phone=trim($_POST['rphone']);
   $user_raddress=trim($_POST['raddress']);
   $user_rcountry=trim($_POST['rcountry']);
   $user_rpassword=trim($_POST['rpassword']);
   
   $user_rdob=trim($_POST['rdob']);
  
$chk_mail="select * from passangercredentials where email='$user_rmail'";
  $r_qury= mysqli_query($conn,$chk_mail);
  

if(mysqli_num_rows($r_qury)>0){
   
  echo $duplicate;

   
}
else{
$insrt=" call insert_passanger('$user_fname','$user_fname','$user_raddress','$user_phone','$user_rcountry','$user_rdob','$user_rpassword',' $user_rmail')";
$insrt_pass=mysqli_query($conn, $insrt);

if($insrt_pass){

}
else{
   echo $error;
}
}
}
?>

   