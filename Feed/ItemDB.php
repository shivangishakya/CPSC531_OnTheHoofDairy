<?php


require_once("../dbconnect.php");

$ItemName = mysqli_real_escape_string($con, $_REQUEST['ItemName']);
$Protein = mysqli_real_escape_string($con, $_REQUEST['Protein']);
$Cost = mysqli_real_escape_string($con, $_REQUEST['Cost']);


echo "<br>";

$my_query = "";

$my_query = "INSERT INTO FeedItems (ItemName,Protein,Cost) VALUES ('$ItemName','$Protein','$Cost')";

    if (mysqli_query($con, $my_query)) {
        $message = "Records Added Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: ItemView.php");

mysqli_close();

?>