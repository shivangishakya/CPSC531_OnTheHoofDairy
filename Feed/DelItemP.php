<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<div class='container'>

 
<h1>Purchase Information</h1>
<br><br>
<!-- Form -->
<form method='post' action=''>
    

   <!-- Record list -->
   <table border='1' style='border-collapse: collapse;' >
     <tr style='background: whitesmoke;'>
       <!-- Check/Uncheck All-->
         <th><input type='checkbox' TreatmentID='checkAll' > Check</th>
         <th>Item Purchase ID</th>
         <th>Feed Purchase ID</th>
         <th>Item ID</th>
         <th>Quantity</th>
         <th>Amount</th>
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
     $query = "SELECT * FROM ItemPurchase";
     $result = mysqli_query($con,$query);

     while($row = mysqli_fetch_array($result) ){
       $ID = $row['ID'];
       $PurchaseID = $row['PurchaseID'];
       $ItemID = $row['ItemID'];
       $Quantity = $row['Quantity'];
       $Amount = $row['Amount'];
     ?>
       <tr>

         <!-- Checkbox -->
         <td><input type='checkbox' name='update[]' value='<?= $ID ?>' ></td>
         <td><?= $ID ?></td>
         <td><?= $PurchaseID ?></td>
         <td><?= $ItemID ?></td>
         <td><?= $Quantity ?></td> 
         <td><?= $Amount ?></td>
       </tr>
     <?php

     }
     ?>
    
   </table>

   <input type='submit' value='Back to main Menu' name='Main' >&nbsp;&nbsp;
   <input type='submit' value='Back to Feed Purchase' name='FeedP' >&nbsp;&nbsp;

   <!-- Submit button -->
    <input type='submit' value='Delete Selected Records' name='but_update'>&nbsp;&nbsp;<br><br>;
  
   <?php
if(isset($_POST['but_update'])){
  $sum = 0;
if(isset($_POST['update'])){
    
  foreach($_POST['update'] as $updateid){
    $sum = 0;
 
    $updateUser = "DELETE FROM ItemPurchase
                    WHERE ID=".$updateid;
      
    }
                
    if (mysqli_query($con, $updateUser)) {
        $message = "Record is Deleted Successfully";
    } else {
        $message = "Error Deleting record: " . mysqli_error($con);
    }
    
    $sql = "SELECT * FROM FeedPurchase";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0)
    {
        $total = 0;
        while($array=mysqli_fetch_row($result))
        {
            $sql1 = "SELECT * FROM ItemPurchase";
            $result1 = mysqli_query($con, $sql1);
            if ($result1->num_rows > 0)
            {
                while($array1=mysqli_fetch_row($result1))
                {
                    if ($array1[1] === $array[0])
                    { 
                        $total = $total + $array1[4];
                    }
                }
            }
            $updateUser1 = "UPDATE FeedPurchase SET 
                            TotalCost='".$total."'
                            WHERE PurchaseID=".$array[0];
            mysqli_query($con, $updateUser1);
            $total = 0;
        }
    }
    
    echo "<script type='text/javascript'>alert('$message');</script>";
      header("Refresh:0");
    }

  }

if(isset($_POST['Main'])){
    header("Location: ../index.php");
    
}
if(isset($_POST['FeedP'])){
    header("Location: DelPurchase.php");
    
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

