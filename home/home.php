<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
session_start();
if(isset($_SESSION['name'])){
    header("Location:../login/login.php");

}
$id = $_SESSION['id'];
$plan_rows = "select * from plan where creator = '$id'";
$plan_rows_result = mysqli_query($con,$plan_rows);
$rows = mysqli_num_rows($plan_rows_result);
if ($rows == 0){
    header("Location:../home/noplan.php");
}
else{
    header('Location:../home/withplan.php');
    
}
?>