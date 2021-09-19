<?php
session_start();
include('connection.php');
$not_found=401; //if flight not found
if(isset($_POST['oplace'])){
$flight_oplace=$_POST['oplace'];
$flight_dplace=$_POST['dplace'];

$flight_fDate=$_POST['fDate'];

$query="call check_flight('$flight_oplace','$flight_dplace','$flight_fDate');";
$query_pass=mysqli_query($conn,$query);
if(mysqli_num_rows($query_pass)>0){

}
else{
    echo $not_found;
}
}
else echo $not_found;
?>