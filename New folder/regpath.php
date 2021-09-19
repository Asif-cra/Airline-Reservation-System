<?php
include('connection.php');
if(isset($_POST['regbtn'])){

   $user_fname=$_POST['fname'];
   $user_fname=$_POST['lname'];
   $user_rmail=$_POST['remail'];
   $user_phone=$_POST['rphone'];
   $user_raddress=$_POST['raddress'];
   $user_rcountry=$_POST['rcountry'];
   $user_rpassword=$_POST['rpassword'];
   $user_rcpassword=$_POST['rcpassword'];
   $user_rdob=$_POST['rdob'];
  
$chk_mail="select * from passangercredentials where email='$user_rmail'";
  $r_qury= mysqli_query($conn,$chk_mail);
if(mysqli_num_rows($r_qury)>0){
   header("location : register.php");
   
   // <script> window.open('register.php','_self') </script>

   
}
else{
$insrt=" call insert_passanger('$user_fname','$user_fname','$user_raddress','$user_phone','$user_rcountry','$user_rdob','$user_rpassword',' $user_rmail')";
$insrt_pass=mysqli_query($conn, $insrt);

if($insrt_pass){
//    echo "
// <script> window.open('INDEX.php','_self') </script>
// ";


exit();
   echo"successfully";
   
}
else{
   echo"no";
}
}


}

else{
echo "
<script> window.open('register.php','_self') </script>
";
exit();
}

?>

   