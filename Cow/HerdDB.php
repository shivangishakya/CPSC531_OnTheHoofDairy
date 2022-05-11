<?php


require_once("../dbconnect.php");


$Location = mysqli_real_escape_string($con, $_REQUEST['Location']);



echo "<br>";

$my_query = "";

$my_query = "INSERT INTO Herd (Location) VALUES ('$Location')";

    if (mysqli_query($con, $my_query)) {
        $message = "Records Added Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: HerdView.php");

mysqli_close();

?>