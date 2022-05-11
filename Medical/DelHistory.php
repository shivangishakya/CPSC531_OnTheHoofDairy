<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<div class='container'>

 
<h1>Medical History</h1>
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
         <td><?= $TreatmentDate ?></td>
         <td><?= $BirthWeight ?></td> 
         <td><?= $CurrentWeight ?></td>
         <td><?= $VetID ?></td>
         <td><?= $DiseaseID ?></td>
         <td><?= $TotCharges ?></td>
         <td><?= $Comments ?></td>
       </tr>
     <?php

     }
     ?>
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
   </table>
   <input type='submit' value='Back to main Menu' name='Main'>&nbsp;&nbsp;
   <input type='submit' value='Delete Selected Records' name='but_update'><br>
  <?php $sql = "SELECT VetID FROM VetInfo";
    $arr = array();
    $i = 0;
   $res= mysqli_query($con,$sql);
    if ($res->num_rows > 0){
        while($array=mysqli_fetch_row($res)){
            //echo $array[0];
            $arr[$i] = $array[0];
            $i = $i + 1;
        }
    }
    $i = 0;
    while ($i < count($arr)){
        //echo $arr[$i];
        $i = $i + 1;
    }
    

   ?>
  
   <?php
if(isset($_POST['but_update'])){
  
if(isset($_POST['update'])){
  foreach($_POST['update'] as $updateid){
    
      
    $updateUser = "DELETE FROM medicalhistory
                    WHERE TreatmentID=".$updateid;
      
    }
                
    if (mysqli_query($con, $updateUser)) {
        $message = "Record is Updated Successfully";
    } else {
        $message = "Error deleting record: " . mysqli_error($con);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
      header("Refresh:0");
    }

  }

if(isset($_POST['Main'])){
    header("Location: ../index.php");
    
}

if(isset($_POST['Medical'])){
    header("Location: Medical.php");
    
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

