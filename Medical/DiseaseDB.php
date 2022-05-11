<?php


require_once("../dbconnect.php");

$my_comment = $_REQUEST['Symptom'];
$Severity = $_REQUEST['Severity'];

$point_comment = "";
$levelSever = "";
$lastid = array();
$lastid1 = array();
(int)$count = 0;
(int)$count1 = 0;
$i = 0;

foreach ($my_comment as $key => $value) 
{
    $point_comment = $value;

    if(!(empty($point_comment)))
    {
        $my_query = "";
        $my_query = "INSERT INTO Symptoms (SymptomName) VALUES ('$point_comment')";

        if(mysqli_query($con, $my_query))
        {
            $lastid[$i] = mysqli_insert_id($con); 
            $i = $i+1;
            $count = $count+1;
        } 
        else
        {
            echo "ERROR: Could not able to execute $my_query. " . mysqli_error($con);
        }
    }
}

if($count > 0)
{
    //echo $count;
    //echo " Records added successfully.";
} 
else
{
    echo "ERROR: Could not able to execute $my_query. " . mysqli_error($con);
}


$a = 0;
foreach ($Severity as $key => $value)
{
    $levelSever = $value;
    if(!(empty($levelSever)))
    {
        $my_query = "";
        $my_query = "INSERT INTO SymptomSeverityRelationship (SymptomID,Severity) VALUES ('$lastid[$a]','$levelSever')";

        if(mysqli_query($con, $my_query))
        {
            $lastid1[$a] = mysqli_insert_id($con); 
            //echo $lastid1[$a];
            $count1 = $count1+1;
        } 
        else
        {
            echo "ERROR: Could not able to execute $my_query. " . mysqli_error($con);
        }
        $a = $a+1;
    }
}   

$DiseaseName = mysqli_real_escape_string($con, $_REQUEST['DiseaseName']);
$Treatment = mysqli_real_escape_string($con, $_REQUEST['Treatment']);
$Medication = mysqli_real_escape_string($con, $_REQUEST['Medication']);
$Quantity = mysqli_real_escape_string($con, $_REQUEST['Quantity']);
$Cost = mysqli_real_escape_string($con, $_REQUEST['Cost']);

echo "<br>";

for($j = 0; $j<$count1; $j++)
{
    $my_query = "";
    $my_query = "INSERT INTO Disease_Treatment (DiseaseName,SymSeverID,Treatment,Medication,Quantity, Cost) VALUES ('$DiseaseName','$lastid1[$j]','$Treatment','$Medication','$Quantity','$Cost')";

if(mysqli_query($con, $my_query)){
    $message ="Records added successfully.";
} else{
    $message ="ERROR: Could not able to execute $my_query. " . mysqli_error($con);
}
}
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location: DiseaseView.php");

mysqli_close();

?>