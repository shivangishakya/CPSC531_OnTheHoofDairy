<?php


require_once("../dbconnect.php");

$ID = mysqli_real_escape_string($con, $_REQUEST['ID']);
$HerdID = mysqli_real_escape_string($con, $_REQUEST['HerdID']);
$Date_Time = mysqli_real_escape_string($con, $_REQUEST['Date_Time']);
$Quantity = mysqli_real_escape_string($con, $_REQUEST['Quantity']);
$Waste = mysqli_real_escape_string($con, $_REQUEST['Waste']);


echo "<br>";

$my_query = "";

$my_query = "INSERT INTO FeedInfo (ID,HerdID,Date_Time,Quantity,Waste) VALUES ('$ID','$HerdID','$Date_Time','$Quantity','$Waste')";

    if (mysqli_query($con, $my_query)) {
        $message = "Records Added Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: FeedInfoView.php");

mysqli_close();

?>