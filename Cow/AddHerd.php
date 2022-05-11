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
      align-items: center;
      }

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

  </style>
    </head>
  <body>
    <div class="logo">
           <h1>Herd</h1>
      </div> <br><br>
          <form class="form-horizontal" action="HerdDB.php" method="post"> 
            <p>
              <label for="Location"><b>Enter Herd Location: </b></label>
              <input type="text" id="Location" placeholder="Enter Location" name="Location" >
            </p>
            <p>
              <button class="btn btn-primary" type="submit">Submit</button>
            </p>
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
