<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<div class='container'>

 
<h1>Symptom Information</h1>
<br><br>
<!-- Form -->
<form method='post' action=''>
    

   <!-- Record list -->
   <table border='1' style='border-collapse: collapse;' >
     <tr style='background: whitesmoke;'>
       <!-- Check/Uncheck All-->
       <th><input type='checkbox' TreatmentID='checkAll' > Check</th>
       <th>Symptom-Severity ID</th>
       <th>Symptom ID</th>
       <th>Symptom Name</th>
       <th>Severity</th>
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
     $query = "SELECT SymptomSeverityRelationship.SymSeverID, SymptomSeverityRelationship.SymptomID, Symptoms.SymptomName, SymptomSeverityRelationship.Severity FROM SymptomSeverityRelationship INNER JOIN Symptoms ON SymptomSeverityRelationship.SymptomID = Symptoms.SymptomID ORDER BY SymptomSeverityRelationship.SymSeverID ASC";
     $result = mysqli_query($con,$query);

     while($row = mysqli_fetch_array($result) ){
       $SymSeverID = $row['SymSeverID'];
       $SymptomID = $row['SymptomID'];
       $SymptomName = $row['SymptomName'];
       $Severity = $row['Severity'];
     ?>
       <tr>

         <!-- Checkbox -->
         <td><input type='checkbox' name='update[]' value='<?= $SymSeverID ?>' ></td>

         <td><?= $SymSeverID ?></td>
         <td><input type='number' name='SymptomID_<?= $SymSeverID ?>' value='<?= $SymptomID ?>' ></td>
         <td><?= $SymptomName ?></td>
         <td><input type='text' name='Severity_<?= $SymSeverID ?>' value='<?= $Severity ?>' ></td>
       </tr>
     <?php

     }
     ?>
    
   </table>
    
   <!-- Submit button -->
    <input type='submit' value='Update Selected Records' name='but_update'>&nbsp;&nbsp;<br>
   <input type='submit' value='Back to main Menu' name='Main' >&nbsp;&nbsp;
   <input type='submit' value='Back to Disease' name='Disease' >&nbsp;&nbsp;

  
   <?php
if(isset($_POST['but_update'])){
  
if(isset($_POST['update'])){
  foreach($_POST['update'] as $updateid){
    
    $SymptomID = $_POST['SymptomID_'.$updateid];
    $Severity = $_POST['Severity_'.$updateid];

    $updateUser = "UPDATE SymptomSeverityRelationship SET
                    SymptomID='".$SymptomID."',
                    Severity='".$Severity."'
                    WHERE SymSeverID=".$updateid;   
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

if(isset($_POST['Main'])){
    header("Location: ../index.php");
    
}
if(isset($_POST['Disease'])){
    header("Location: UpdateDisease.php");
    
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

