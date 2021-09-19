<?php
session_start();
include('connection.php');
$flght_origin=trim($_POST['oplace']);
$flight_dest=trim($_POST['dplace']);
$flight_aDate=trim($_POST['aDate']);
$flight_dDate=trim($_POST['dDate']);
$flight_atime=trim($_POST['atime']);
$flight_dtime=trim($_POST['dtime']);
$flight_aricraft=trim($_POST['aricraft']);

$error=201;
$query="call insert_flight('$flght_origin','$flight_dest',
'$flight_atime','$flight_dtime','$flight_aricraft')" ;

$query_pass= mysqli_query($conn,$query);
if($query_pass){

}
else {
    echo $error;
}

?>