<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<div class='container'>

 
<h1>Vet Information</h1>
<br><br>
<!-- Form -->
<form method='post' action=''>
    

   <!-- Record list -->
   <table border='1' style='border-collapse: collapse;' >
     <tr style='background: whitesmoke;'>
       <!-- Check/Uncheck All-->
       <th><input type='checkbox' TreatmentID='checkAll' > Check</th>

       <th>Vet ID</th>
       <th>Vet Name</th>
       <th>Vet Address</th>
       <th>City</th>
       <th>State</th>
       <th>Zip</th>
       <th>Phone</th>
       <th>Visiting Charges</th>
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
     $query = "SELECT * FROM VetInfo";
     $result = mysqli_query($con,$query);

     while($row = mysqli_fetch_array($result) ){
       $VetID = $row['VetID'];
       $VetName = $row['VetName'];
       $VetAddress = $row['VetAddress'];
       $City = $row['City'];
       $State = $row['State'];
       $Zip = $row['Zip'];
       $Phone = $row['Phone'];
       $VisitCost = $row['VisitCost'];
     ?>
       <tr>

         <!-- Checkbox -->
         <td><input type='checkbox' name='update[]' value='<?= $VetID ?>' ></td>
         <td><?= $VetID ?></td>
         <td><input type='text' name='VetName_<?= $VetID ?>' value='<?= $VetName ?>' ></td>
         <td><input type='text' name='VetAddress_<?= $VetID ?>' value='<?= $VetAddress ?>' ></td>
         <td><input type='text' name='City_<?= $VetID ?>' value='<?= $City ?>' ></td> 
         <td><input type='text' name='State_<?= $VetID ?>' value='<?= $State ?>' ></td>
         <td><input type='text' name='Zip_<?= $VetID ?>' value='<?= $Zip ?>' ></td>
         <td><input type='text' name='Phone_<?= $VetID ?>' value='<?= $Phone ?>' ></td>
         <td><input type='text' name='VisitCost_<?= $VetID ?>' value='<?= $VisitCost ?>' ></td>
       </tr>
     <?php

     }
     ?>
    
   </table>

   <input type='submit' value='Back to main Menu' name='Main' >&nbsp;&nbsp;

   <!-- Submit button -->
    <input type='submit' value='Delete Selected Records' name='but_update'>&nbsp;&nbsp;<br><br>
  
   <?php
if(isset($_POST['but_update'])){
  
if(isset($_POST['update'])){
  foreach($_POST['update'] as $updateid){
    
    $VetName = $_POST['VetName_'.$updateid];
    $VetAddress = $_POST['VetAddress_'.$updateid];
    $City = $_POST['City_'.$updateid];
    $State = $_POST['State_'.$updateid];
    $Zip = $_POST['Zip_'.$updateid];
    $Phone = $_POST['Phone_'.$updateid];
    $VisitCost = $_POST['VisitCost_'.$updateid];

    $updateUser = "DELETE FROM vetinfo 
                    WHERE VetID=".$updateid;
      
      
      
    }
                
    if (mysqli_query($con, $updateUser)) {
        echo 1;
        $message = "Records Deleted Successfully";
    } else {
        echo 2;
        $message = "Error deleting record: " . mysqli_error($con);
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

