<?php


require_once("../dbconnect.php");


$CowID = mysqli_real_escape_string($con, $_REQUEST['CowID']);
$TreatmentDate = mysqli_real_escape_string($con, $_REQUEST['TreatmentDate']);
$BirthWeight = mysqli_real_escape_string($con, $_REQUEST['BirthWeight']);
$CurrentWeight = mysqli_real_escape_string($con, $_REQUEST['CurrentWeight']);
$VetID = mysqli_real_escape_string($con, $_REQUEST['VetID']);
$DiseaseID = mysqli_real_escape_string($con, $_REQUEST['DiseaseID']);
$Comments = mysqli_real_escape_string($con, $_REQUEST['Comments']);


$sql1 = "SELECT VisitCost FROM VetInfo WHERE VetID = '{$VetID}'";
$sql2 = "SELECT Cost FROM Disease_Treatment WHERE DiseaseID = '{$DiseaseID}'"; 

$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);

$val1=mysqli_fetch_assoc($result1);
$val2=mysqli_fetch_assoc($result2);
                        
$sum = (int)$val1['VisitCost'] + (int)$val2['Cost'];
function function_alert($sum) {
      
    // Display the alert box 
    echo "<script>alert('Please pay: $$sum');</script>";
}
function_alert($sum);

echo "<br>";

$my_query = "";

$my_query = "INSERT INTO MedicalHistory (CowID,TreatmentDate,BirthWeight,CurrentWeight,VetID, DiseaseID, TotCharges, Comments) VALUES ('$CowID','$TreatmentDate','$BirthWeight','$CurrentWeight','$VetID','$DiseaseID','$sum','$Comments')";

if(mysqli_query($con, $my_query)){
    $message ="Records added successfully.";
} else{
    $message ="ERROR: Could not able to execute $my_query. " . mysqli_error($con);
}
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location: MedicalView.php");

mysqli_close($con);

?>
