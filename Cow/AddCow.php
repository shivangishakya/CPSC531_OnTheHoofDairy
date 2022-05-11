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
  align-items: center;
   justify-content: center;
   width: 30%;
  /* Large margin-right to force the next element to the new-line
           and margin-left to create a gutter between the label and input */
  margin: 0 10% 0 34%;
  text-align: left;
  align-items: center;
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

select, option {
    width: 250px;
}

  </style>
    </head>
  <body>
    <div class="logo">
           <h1>Cow Details</h1>
      </div> <br><br>
          <form class="form-horizontal" action="CowDB.php" method="post">
            <div>
              <label for="CowName"><b>Cow Name:</b></label>
              <input type="text" id="CowName" placeholder="Enter Cow Name" name="CowName" required>
            </div>
            <div>
              <label for="DOB"><b>DOB: </b></label>
              <input type="date" id="DOB" placeholder="Enter DOB" name="DOB" >
            </div>
            <div>
              <label for="DateAcquired"><b>Date Acquired: </b></label>
              <input type="date" id="DateAcquired" placeholder="Enter Acquired date" name="DateAcquired" >
            </div>
            <div>
              <label for="Source"><b>Source: </b></label>
              <input type="text" id="Source" placeholder="Enter Source" name="Source" >
            </div>
            <div>
              <label for="Breed"><b>Breed: </b></label>
              <input type="text" id="Breed" placeholder="Enter Breed Name" name="Breed" >
            </div>
            <div>
              <label for="Sire"><b>Sire: </b></label>
              <input type="text" id="Sire" placeholder="Enter Sire Name" name="Sire" >
            </div>
            <div>
              <label for="DateOfSold"><b>Date Of Sold: </b></label>
              <input type="date" id="DateOfSold" placeholder="Enter Date Of Sold" name="DateOfSold" >
            </div>
            <div>
              <label for="DateOfDeath"><b>Date of Death: </b></label>
              <input type="date" id="DateOfDeath" placeholder="Enter Date Of Death" name="DateOfDeath" >
            </div>
            <div>
              <label for="Cause"><b>Cause of Death: </b></label>
              <input type="text" id="Cause" placeholder="Enter Cause" name="Cause" >
            </div>
            <div>
              <label for="LineageComments"><b>Comments: </b></label>
              <input type="text" id="LineageComments" placeholder="Enter Comments" name="LineageComments" >
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
              <button class="btn btn-primary" type="submit">Submit</button>
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

