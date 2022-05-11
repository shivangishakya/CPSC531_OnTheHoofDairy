
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
            <h1>Add Feed Information</h1>
      </div>
          <form action="FeedInfoDB.php" method="post">
              <div>
                <label for="ID"><b>Select Item Purchase ID : </b></label>
                <div class=test>
                <select class="form-control" name="ID" value="<?php if(isset($row['ID'])){echo $row['ID'];}?>">
                    <option value="">Select Item</option>
                <?php 
                    $res=mysqli_query($con,"Select * from ItemPurchase");
                    while ($row=mysqli_fetch_array($res)) {
                        $res1=mysqli_query($con,"Select * from FeedItems");
                    while ($row1=mysqli_fetch_array($res1)) {
                        if ($row['ItemID'] == $row1['ItemID']){
                ?>
                <option value=<?php echo $row['ID'];?> <?php if($_GET["ID"]==$row['ID']){ ?> selected<?php } ?>><?php echo $row['ID']; echo ' - '; echo $row1['ItemName'];?></option>
                <?php
                      }}}
                ?>
                    </select></div>
              </div>
              <div id="Itemcontainer">
                <label for="HerdID"><b>Choose Herd:  </b></label>
                <div class=test>
                <select class="form-control" name="HerdID" value="<?php    if(isset($row['HerdID'])){echo $row['HerdID'];}?>">
                    <option value="">Select Herd ID</option>
                <?php 
                    $res=mysqli_query($con,"Select * from Herd");
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <option value=<?php echo $row['HerdID'];?> <?php if($_GET["HerdID"]==$row['HerdID']){ ?> selected<?php } ?>><?php echo $row['HerdID']; echo ' - '; echo $row['Location'];?></option>
                <?php
                      }
                ?>
                    </select></div>
              </div>
            <div>
              <label for="Date_Time"><b>Enter Date and Time: </b></label>
              <input type="datetime-local" id="Date_Time" placeholder="Enter Date and Time" name="Date_Time" >
            </div>
            <div>
              <label for="Quantity"><b>Enter Quantity Fed to Herd: </b></label>
              <input type="number" id="Quantity" placeholder="Enter Quantity Fed to Herd" name="Quantity" >
            </div>
            <div>
              <label for="Waste"><b>Enter Amount of Feed Wasted: </b></label>
              <input type="number" id="Waste" placeholder="Amount of Feed Wasted" name="Waste" >
            </div>
            <div>
              <button type="submit">Submit</button>
            </div>
          </form>
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

