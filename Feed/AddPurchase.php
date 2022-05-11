<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Business website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style>
   .test {
 
   width: 20%;
  /* Large margin-right to force the next element to the new-line
           and margin-left to create a gutter between the label and input */
  margin: 0 10% 0 34%;
  text-align: left;

}
.logo {
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;
}

form {
      width: 100%;
      padding: 10px;
      border-radius: 1px;
      background:grey;
      box-shadow: 0 0 8px  #db573c; 
      align-items: left;
      }

.test,
label,
input {
  /* In order to define widths */
  display: inline-block;
}

label {
  width: 30%;
  /* Positions the label text beside the input */
  text-align: right;
}


label+input {
  width: 30%;
  /* Large margin-right to force the next element to the new-line
           and margin-left to create a gutter between the label and input */
  margin: 0 30% 0 4%;
}

label+.test {
  width: 30%;
  /* Large margin-right to force the next element to the new-line
           and margin-left to create a gutter between the label and input */
  margin: 0 30% 0 4%;
}


  </style>
    </head>
  <body>
    <div class="logo">
            <h1>Add Purchase Data</h1>
      </div>
          <form action="PurchaseDB.php" method="post">
            <div>
              <label for="Date"><b>Date:</b></label>
              <input type="date" id="Date" placeholder="Enter Date" name="Date" required>
            </div>
              <div>
                <label for="SupplierID"><b>Select Supplier : </b></label>
                <div class=test>
                <select class="form-control" name="SupplierID" value="<?php if(isset($row['SupplierID'])){echo $row['SupplierID'];}?>">
                    <option value="">Select Supplier</option>
                <?php 
                    $res=mysqli_query($con,"Select * from Supplier");
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <option value=<?php echo $row['SupplierID'];?> <?php if($_GET["SupplierID"]==$row['SupplierID']){ ?> selected<?php } ?>><?php echo $row['SupplierID']; echo ' - '; echo $row['SupplierName'];?></option>
                <?php
                      }
                ?>
                </select></div>
              </div><br>
              <div id="Itemcontainer">
                <div class="template">
                <label for="Item"><b>Select Item: </b></label>
                <div class=test>
                <select class="form-control" name="ItemID[]" value="<?php    if(isset($row['ItemID'])){echo $row['ItemID'];}?>">
                    <option value="">Select Item ID</option>
                <?php 
                    $res=mysqli_query($con,"Select * from FeedItems");
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <option value=<?php echo $row['ItemID'];?> <?php if($_GET["ItemID"]==$row['ItemID']){ ?> selected<?php } ?>><?php echo $row['ItemID']; echo ' - '; echo $row['ItemName'];?></option>
                <?php
                      }
                ?>
                  </select></div>
                <label for="Quantity"><b>Quantity:</b></label>
                <input type="number" id="Quantity" placeholder="Enter Quantity" name="Quantity[]" required>
                </div>
              </div>
            <div>
              <button onclick="additem()" type="button">Add</button>
            </div><br>
            <div>
              <label for="DCost"><b>Enter Delivery Cost: </b></label>
              <input type="number" id="DCost" placeholder="Enter Delivery Cost" name="DCost" >
            </div>
            <div>
              <button type="submit">Submit</button>
            </div>
          </form>
        <script>
        function additem()
            {
                var item=document.getElementsByClassName("template")[0];
                console.log(item);
                var clone=item.cloneNode(true);
                document.getElementById("Itemcontainer").appendChild(clone);
            }
      </script>
      <form method='post' action=''>
<input type='submit' value='Back to main Menu' name='Main'>
<?php 
    if(isset($_POST['Main'])){
      header("Location: ../index.php");   
  }
?>
</form>
  </body>
</html>

