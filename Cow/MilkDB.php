<?php


require_once("../dbconnect.php");

$CowID = mysqli_real_escape_string($con, $_REQUEST['CowID']);
$Date = mysqli_real_escape_string($con, $_REQUEST['mdate']);
$Quantity = mysqli_real_escape_string($con, $_REQUEST['quantity']);
$Comments = mysqli_real_escape_string($con, $_REQUEST['Comments']);

echo $CowID;
echo "<br>";

$my_query = "";

$my_query = "INSERT INTO Milk (CowID,Date,Quantity,Comments) VALUES ('$CowID','$Date','$Quantity','$Comments')";

    if (mysqli_query($con, $my_query)) {
        $message = "Records Added Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: MilkView.php");

mysqli_close();

?>