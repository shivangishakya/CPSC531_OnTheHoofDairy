<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<div class='container'>

 
<h1>Medical History</h1>
<br><br>
<!-- Form -->
<form method='post' action=''>
    

   <!-- Record list -->
   <table border='1' style='border-collapse: collapse;' >
     <tr style='background: whitesmoke;'>
       <!-- Check/Uncheck All-->
       <th><input type='checkbox' TreatmentID='checkAll' > Check</th>

       <th>CowID</th>
       <th>TreatmentDate</th>
       <th>BirthWeight</th>
       <th>CurrentWeight</th>
       <th>VetID</th>
       <th>DiseaseID</th>
       <th>TotCharges</th>
       <th>comments</th>
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
     $query = "SELECT * FROM medicalhistory";
     $result = mysqli_query($con,$query);

     while($row = mysqli_fetch_array($result) ){
       $TreatmentID = $row['TreatmentID'];
       $CowID = $row['CowID'];
       $TreatmentDate = $row['TreatmentDate'];
       $BirthWeight = $row['BirthWeight'];
       $CurrentWeight = $row['CurrentWeight'];
       $VetID = $row['VetID'];
       $DiseaseID = $row['DiseaseID'];
       $TotCharges = $row['TotCharges'];
       $Comments = $row['Comments'];
     ?>
       <tr>

         <!-- Checkbox -->
         <td><input type='checkbox' name='update[]' value='<?= $TreatmentID ?>' ></td>

         <td><?= $CowID ?></td>
         <td><input type='date' name='TreatmentDate_<?= $TreatmentID ?>' value='<?= $TreatmentDate ?>' ></td>
         <td><input type='number' name='BirthWeight_<?= $TreatmentID ?>' value='<?= $BirthWeight ?>' ></td> 
         <td><input type='number' name='CurrentWeight_<?= $TreatmentID ?>' value='<?= $CurrentWeight ?>' ></td>
         <td><input type='number' name='VetID_<?= $TreatmentID ?>' value='<?= $VetID ?>' ></td>
         <td><input type='number' name='DiseaseID_<?= $TreatmentID ?>' value='<?= $DiseaseID ?>' ></td>
         <td><?= $TotCharges ?></td>
         <td><input type='text' name='Comments_<?= $TreatmentID ?>' value='<?= $Comments ?>' ></td>
       </tr>
     <?php

     }
     ?>
    
   </table>

   <input type='submit' value='Back to main Menu' name='Main' >&nbsp;&nbsp;

   <!-- Submit button -->
    <input type='submit' value='Update Selected Records' name='but_update'>&nbsp;&nbsp;<br><br>;
  
   <?php
if(isset($_POST['but_update'])){
  
if(isset($_POST['update'])){
  foreach($_POST['update'] as $updateid){
    
    $TreatmentDate = $_POST['TreatmentDate_'.$updateid];
    $BirthWeight = $_POST['BirthWeight_'.$updateid];
    $CurrentWeight = $_POST['CurrentWeight_'.$updateid];
    $VetID = $_POST['VetID_'.$updateid];
    $DiseaseID = $_POST['DiseaseID_'.$updateid];
    $TotCharges_ = $_POST['TotCharges_'.$updateid];
    $Comments = $_POST['Comments_'.$updateid];
      
    $sql1 = "SELECT VisitCost FROM VetInfo WHERE VetID = '{$VetID}'";
    $sql2 = "SELECT Cost FROM Disease_Treatment WHERE DiseaseID = '{$DiseaseID}'"; 

    $result1 = mysqli_query($con,$sql1);
    $result2 = mysqli_query($con,$sql2);

    $val1=mysqli_fetch_assoc($result1);
    $val2=mysqli_fetch_assoc($result2);
                        
    $sum = (int)$val1['VisitCost'] + (int)$val2['Cost'];


    $updateUser = "UPDATE medicalhistory SET 
                    TreatmentDate='".$TreatmentDate."',
                    BirthWeight='".$BirthWeight."',
                    CurrentWeight=".$CurrentWeight.",
                    VetID=".$VetID.",DiseaseID='".$DiseaseID."' ,
                    TotCharges='".$sum."',
                    Comments='".$Comments."' 
                    WHERE TreatmentID=".$updateid;
      
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

