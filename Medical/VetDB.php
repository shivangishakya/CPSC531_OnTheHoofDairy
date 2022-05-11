<?php


require_once("../dbconnect.php");

$VetName = mysqli_real_escape_string($con, $_REQUEST['VetName']);
$VetAddress = mysqli_real_escape_string($con, $_REQUEST['VetAdd']);
$City = mysqli_real_escape_string($con, $_REQUEST['City']);
$State = mysqli_real_escape_string($con, $_REQUEST['State']);
$Zip = mysqli_real_escape_string($con, $_REQUEST['Zip']);
$Phone = mysqli_real_escape_string($con, $_REQUEST['phone']);
$VisitCost = mysqli_real_escape_string($con, $_REQUEST['Cost']);

echo "<br>";

$my_query = "";

$my_query = "INSERT INTO VetInfo (VetName,VetAddress,City,State,Zip, Phone, VisitCost) VALUES ('$VetName','$VetAddress','$City','$State','$Zip','$Phone','$VisitCost')";

if(mysqli_query($con, $my_query)){
    $message ="Records added successfully.";
} else{
    $message ="ERROR: Could not able to execute $my_query. " . mysqli_error($con);
}
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location: VetView.php");

mysqli_close();

?>