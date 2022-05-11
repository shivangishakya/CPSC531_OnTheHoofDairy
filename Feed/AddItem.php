
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
    <h1>Add Item</h1>
    </div>
    <form action="ItemDB.php" method="post">
            <div>
              <label for="ItemName"><b>Enter Item Name:</b></label>
              <input type="text" id="ItemName" placeholder="Enter Item Name" name="ItemName" required>
            </div>
            <div>
              <label for="Protein"><b>Enter Protein Content: </b></label>
              <input type="text" id="Protein" placeholder="Enter Protein Content" name="Protein" >
            </div>
            <div>
              <label for="Cost"><b>Enter Cost of Item: </b></label>
              <input type="text" id="Cost" placeholder="Cost of Item" name="Cost" >
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

