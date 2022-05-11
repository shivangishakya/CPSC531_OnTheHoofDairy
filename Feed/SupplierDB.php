<?php


require_once("../dbconnect.php");

$SupplierName = mysqli_real_escape_string($con, $_REQUEST['SupplierName']);
$SupplierAddress = mysqli_real_escape_string($con, $_REQUEST['SupplierAdd']);
$City = mysqli_real_escape_string($con, $_REQUEST['City']);
$State = mysqli_real_escape_string($con, $_REQUEST['State']);
$Zip = mysqli_real_escape_string($con, $_REQUEST['Zip']);
$Phone = mysqli_real_escape_string($con, $_REQUEST['phone']);
$VisitCost = mysqli_real_escape_string($con, $_REQUEST['Cost']);

echo "<br>";

$my_query = "";

$my_query = "INSERT INTO Supplier (SupplierName,Address,City,State,Zip, Phone) VALUES ('$SupplierName','$SupplierAddress','$City','$State','$Zip','$Phone')";

    if (mysqli_query($con, $my_query)) {
        $message = "Records Added Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: SupplierView.php");

mysqli_close();

?>