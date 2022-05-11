<?php


require_once("../dbconnect.php");

$CowID = mysqli_real_escape_string($con, $_REQUEST['CowID']);
$Date = mysqli_real_escape_string($con, $_REQUEST['mdate']);
$Gender = mysqli_real_escape_string($con, $_REQUEST['Gender']);
$Comments = mysqli_real_escape_string($con, $_REQUEST['Comments']);

echo "<br>";

$my_query = "";

$my_query = "INSERT INTO Births (CowID,Date,Gender,Comments) VALUES ('$CowID','$Date','$Gender','$Comments')";

    if (mysqli_query($con, $my_query)) {
        $message = "Records Added Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: BirthView.php");

mysqli_close();

?>