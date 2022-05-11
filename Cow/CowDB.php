<?php


require_once("../dbconnect.php");

$CowName = mysqli_real_escape_string($con, $_REQUEST['CowName']);
$DOB = mysqli_real_escape_string($con, $_REQUEST['DOB']);
$DateAcquired = mysqli_real_escape_string($con, $_REQUEST['DateAcquired']);
$Source = mysqli_real_escape_string($con, $_REQUEST['Source']);
$Breed = mysqli_real_escape_string($con, $_REQUEST['Breed']);
$Sire = mysqli_real_escape_string($con, $_REQUEST['Sire']);
$SoldDate = mysqli_real_escape_string($con, $_REQUEST['DateOfSold']);
$Deathdate = mysqli_real_escape_string($con, $_REQUEST['DateOfDeath']);
$Cause = mysqli_real_escape_string($con, $_REQUEST['Cause']);
$Comments = mysqli_real_escape_string($con, $_REQUEST['LineageComments']);
$HerdID = mysqli_real_escape_string($con, $_REQUEST['HerdID']);


echo "<br>";

$my_query = "";

$my_query = "INSERT INTO Cow (CowName,DOB,DateAcquired,Source,Breed, Sire, DateOfSold,DateOfDeath ,Cause, LineageComments, HerdID) VALUES ('$CowName','$DOB','$DateAcquired','$Source','$Breed','$Sire','$SoldDate','$Deathdate','$Cause','$Comments',$HerdID)";

    if (mysqli_query($con, $my_query)) {
        $message = "Records Added Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
      header("Location: CowView.php");

mysqli_close($con);

?>