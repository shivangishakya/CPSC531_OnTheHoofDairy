<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<div class='container'>

 
<h1>Disease Information</h1>
<br><br>
<!-- Form -->
<form method='post' action=''>
    

   <!-- Record list -->
   <table border='1' style='border-collapse: collapse;' >
     <tr style='background: whitesmoke;'>
       <!-- Check/Uncheck All-->
       <th><input type='checkbox' TreatmentID='checkAll' > Check</th>

       <th>Disease ID</th>
       <th>Disease Name</th>
       <th>Symptom Name</th>
       <th>Symptom-Severity ID</th>
       <th>Severity</th>
       <th>Treatment</th>
       <th>Medication</th>
       <th>Quantity</th>
       <th>Cost</th>
     </tr>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
body {
  background-color: lightblue;
}
tr:hover {background-color: coral;}
.button5 {background-color: #555555;}

input[type= submit]{ background-color: orange;
            border: none;
            text-decoration: none;
            color: white;
            padding: 20px 20px;
            margin: 20px 20px;
            cursor: pointer;
}
</style>
     <?php 
     $query = "SELECT Disease_Treatment.DiseaseID, Disease_Treatment.DiseaseName, Symptoms.SymptomName, Disease_Treatment.SymSeverID, SymptomSeverityRelationship.Severity, Disease_Treatment.Treatment, Disease_Treatment.Medication, Disease_Treatment.Quantity, Disease_Treatment.Cost  FROM Disease_Treatment INNER JOIN SymptomSeverityRelationship ON Disease_Treatment.SymSeverID = SymptomSeverityRelationship.SymSeverID INNER JOIN Symptoms ON SymptomSeverityRelationship.SymptomID = Symptoms.SymptomID ORDER BY Disease_Treatment.DiseaseID ASC";
     $result = mysqli_query($con,$query);

     while($row = mysqli_fetch_array($result) ){
       $DiseaseID = $row['DiseaseID'];
       $DiseaseName = $row['DiseaseName'];
       $SymptomName = $row['SymptomName'];
       $SymSeverID = $row['SymSeverID'];
       $Severity = $row['Severity'];
       $Treatment = $row['Treatment'];
       $Medication = $row['Medication'];
       $Quantity = $row['Quantity'];
       $Cost = $row['Cost'];
     ?>
       <tr>

         <!-- Checkbox -->
         <td><input type='checkbox' name='update[]' value='<?= $DiseaseID ?>' ></td>

         <td><?= $DiseaseID ?></td>
         <td><input type='text' name='DiseaseName_<?= $DiseaseID ?>' value='<?= $DiseaseName ?>' ></td>
         <td><?= $SymptomName ?></td>
         <td><input type='number' name='SymSeverID_<?= $DiseaseID ?>' value='<?= $SymSeverID ?>' ></td> 
         <td><?= $Severity ?></td> 
         <td><input type='text' name='Treatment_<?= $DiseaseID ?>' value='<?= $Treatment ?>' ></td>
         <td><input type='text' name='Medication_<?= $DiseaseID ?>' value='<?= $Medication ?>' ></td>
         <td><input type='number' name='Quantity_<?= $DiseaseID ?>' value='<?= $Quantity ?>' ></td>
         <td><input type='number' name='Cost_<?= $DiseaseID ?>' value='<?= $Cost ?>' ></td>
       </tr>
     <?php

     }
     ?>
    
   </table>
    
    
   <!-- Submit button -->
    <input type='submit' value='Update Selected Records' name='but_update'>&nbsp;&nbsp;<br>

   <input type='submit' value='Back to main Menu' name='Main' >&nbsp;&nbsp;
   <input type='submit' value='Update Symptom' name='Symp' >&nbsp;&nbsp;
   <input type='submit' value='Update Symptom-Severity' name='Sever' >&nbsp;&nbsp;
  
   <?php
if(isset($_POST['but_update'])){
  
if(isset($_POST['update'])){
  foreach($_POST['update'] as $updateid){
    
    $DiseaseName = $_POST['DiseaseName_'.$updateid];
    $SymSeverID = $_POST['SymSeverID_'.$updateid];
    $Treatment = $_POST['Treatment_'.$updateid];
    $Medication = $_POST['Medication_'.$updateid];
    $Quantity = $_POST['Quantity_'.$updateid];
    $Cost = $_POST['Cost_'.$updateid];


    $updateUser = "UPDATE Disease_Treatment SET 
                    DiseaseName='".$DiseaseName."', 
                    SymSeverID='".$SymSeverID."', 
                    Treatment='".$Treatment."', 
                    Medication='".$Medication."' , 
                    Quantity='".$Quantity."', 
                    Cost='".$Cost."' 
                    WHERE DiseaseID=".$updateid;  
    }
    
                
    if (mysqli_query($con, $updateUser)) {
        $message = "Record is Updated Successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
      header("Refresh:0");
    }

  }

if(isset($_POST['Symp'])){
    header("Location: UpdateSymptom.php");
    
}

if(isset($_POST['Sever'])){
    header("Location: UpdateSeverity.php");
    
}
    
if(isset($_POST['Main'])){
    header("Location: ../index.php");
    
}

?>
 </form>
</div>
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  // Check/Uncheck ALl
  $('#checkAll').change(function(){
    if($(this).is(':checked')){
      $('input[name="update[]"]').prop('checked',true);
    }else{
      $('input[name="update[]"]').each(function(){
         $(this).prop('checked',false);
      });
    }
  });

  // Checkbox click
  $('input[name="update[]"]').click(function(){
    var total_checkboxes = $('input[name="update[]"]').length;
    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;
    
    if(total_checkboxes_checked == total_checkboxes){
       $('#checkAll').prop('checked',true);
    }else{
       $('#checkAll').prop('checked',false);
    }
  });
});


</script>

