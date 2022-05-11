
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
            <h1>Add Supplier Information</h1>
      </div>
          <form action="SupplierDB.php" method="post">
            <div>
              <label for="SupplierName"><b>Enter Supplier Name:</b></label>
              <input type="text" id="SupplierName" placeholder="Enter Supplier Name" name="SupplierName" required>
            </div>
            <div>
              <label for="SupplierAdd"><b>Enter Supplier Address: </b></label>
              <input type="text" id="SupplierAdd" placeholder="Enter Supplier Address" name="SupplierAdd" >
            </div>
            <div>
              <label for="City"><b>Enter City: </b></label>
              <input type="text" id="City" placeholder="Enter City" name="City" >
            </div>
            <div>
              <label for="State"><b>Enter State: </b></label>
              <input type="text" id="State" placeholder="Enter State" name="State" >
            </div>
            <div>
              <label for="Zip"><b>Enter Zip: </b></label>
              <input type="text" id="Zip" placeholder="Enter Zip" name="Zip" >
            </div>
            <div>
              <label for="phone"><b>Enter Phone: </b></label>
              <input type="text" id="phone" placeholder="Enter phone" name="phone" >
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

