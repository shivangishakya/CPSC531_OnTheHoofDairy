<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<div class='container'>

 
<h1>Cow Data</h1>
<br><br>
<!-- Form -->
<form method='post' action=''>
    

   <!-- Record list -->
   <table border='1' style='border-collapse: collapse;' >
     <tr style='background: whitesmoke;'>
       <!-- Check/Uncheck All-->
       <th><input type='checkbox' TreatmentID='checkAll' > Check</th>

                    <th>CowID</th>
                    <th>CowName</th>
                    <th>HerdID</th>
                    <th>DOB</th>
                    <th>Date Acquired</th>
                    <th>Source</th>
                    <th>Breed</th>
                    <th>Sire</th>
                    <th>DateofSold</th>
                    <th>DateofDeath</th>
                    <th>Cause</th>
                    <th>LineageComments</th>
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
     $query = "SELECT * FROM Cow";
     $result = mysqli_query($con,$query);

     while($row = mysqli_fetch_array($result) ){
       $CowID = $row['CowID'];
       $CowName = $row['CowName'];
       $HerdID = $row['HerdID'];
       $DOB = $row['DOB'];
       $DateAcquired = $row['DateAcquired'];
       $Source = $row['Source'];
       $Breed = $row['Breed'];
       $Sire = $row['Sire'];
       $DateOfSold = $row['DateOfSold'];
       $DateOfDeath = $row['DateOfDeath'];
       $Cause = $row['Cause'];
       $LineageComments = $row['LineageComments'];
     ?>
       <tr>

         <!-- Checkbox -->
         <td><input type='checkbox' name='update[]' value='<?= $CowID ?>' ></td>
         <td><?= $CowID ?></td>
         <td><input type='text' name='CowName_<?= $CowID ?>' value='<?= $CowName ?>' ></td>
         <td><input type='number' name='HerdID_<?= $CowID ?>' value='<?= $HerdID ?>' ></td>
         <td><input type='date' name='DOB_<?= $CowID ?>' value='<?= $DOB ?>' ></td> 
         <td><input type='date' name='DateAcquired_<?= $CowID ?>' value='<?= $DateAcquired ?>' ></td>
         <td><input type='text' name='Source_<?= $CowID ?>' value='<?= $Source ?>' ></td>
         <td><input type='text' name='Breed_<?= $CowID ?>' value='<?= $Breed ?>' ></td>
         <td><input type='text' name='Sire_<?= $CowID ?>' value='<?= $Sire ?>' ></td>
         <td><input type='date' name='DateOfSold_<?= $CowID ?>' value='<?= $DateOfSold ?>' ></td> 
         <td><input type='date' name='DateOfDeath_<?= $CowID ?>' value='<?= $DateOfDeath ?>' ></td>
         <td><input type='text' name='Cause_<?= $CowID ?>' value='<?= $Cause ?>' ></td>
         <td><input type='text' name='LineageComments_<?= $CowID ?>' value='<?= $LineageComments ?>' ></td>
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
    
    $CowName = $_POST['CowName_'.$updateid];
    $HerdID = $_POST['HerdID_'.$updateid];
    $DOB = $_POST['DOB_'.$updateid];
    $DateAcquired = $_POST['DateAcquired_'.$updateid];
    $Source = $_POST['Source_'.$updateid];
    $Breed = $_POST['Breed_'.$updateid];
    $Sire = $_POST['Sire_'.$updateid];
    $DateOfSold = $_POST['DateOfSold_'.$updateid];
    $DateOfDeath = $_POST['DateOfDeath_'.$updateid];
    $Cause = $_POST['Cause_'.$updateid];
    $LineageComments = $_POST['LineageComments_'.$updateid];

    $updateUser = "UPDATE Cow SET 
                    CowName='".$CowName."',
                    DOB='".$DOB."',
                    DateAcquired='".$DateAcquired."',
                    Source='".$Source."',
                    Breed='".$Breed."',
                    Sire='".$Sire."',
                    DateOfSold='".$DateOfSold."',
                    DateOfDeath='".$DateOfDeath."',
                    Cause='".$Cause."',
                    LineageComments='".$LineageComments."',
                    HerdID='".$HerdID."'
                    WHERE CowID=".$updateid;  
    }
                
    if (mysqli_query($con, $updateUser)) {
        $message = "Records Updated Successfully";
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

