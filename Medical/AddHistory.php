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
    <h1>Add Medical History</h1>
      </div> <br><br>
          <form action="HistoryDB.php" method="post">
            <label for="CowID"><b>Select Cow by Name: </b></label>
            <div class = test> 
                <select class="form-control" name="CowID" value="<?php    if(isset($row['CowID'])){echo $row['CowID'];}?>">
                    <option value="">Select Cow</option>
                <?php 
                    $res=mysqli_query($con,"Select * from Cow");
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <option value=<?php echo $row['CowID'];?> <?php if($_GET["CowID"]==$row['CowID']){ ?> selected<?php } ?>><?php echo $row['CowID']; echo '-'; echo $row['CowName'];?></option>
                <?php
                      }
                ?>
                </select>
              </div>
            <div>
              <label for="Date of Treatment"><b>Enter Date of Treatment: </b></label>
              <input type="date" id="TreatmentDate" placeholder="Enter Treatment Date" name="TreatmentDate" >
            </div>
            <div>
              <label for="BirthWeight"><b>Birth Weight: </b></label>
              <input type="number" id="BirthWeight" placeholder="Enter Birth Weight" name="BirthWeight" >
            </div>
            <div>
              <label for="CurrentWeight"><b>Current Weight: </b></label>
              <input type="number" id="CurrentWeight" placeholder="Enter Current Weight" name="CurrentWeight" >
            </div>
            <div>
                <label for="VetID"><b>Select Vet : </b></label>
                <div class=test>
                    <select class="form-control" name="VetID" value="<?php if(isset($row['VetID'])){echo $row['VetID'];}?>">
                    <option value="">Select Vet</option>
                <?php 
                    $res=mysqli_query($con,"Select * from VetInfo");
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <option value=<?php echo $row['VetID'];?> <?php if(isset($_GET["VetID"])==$row['VetID']){ ?> selected<?php } ?>><?php echo $row['VetID']; echo ' - '; echo $row['VetName'];?></option>
                <?php
                      }
                ?>
                </select> </div>
            </div>
            <div>
                <label for="DiseaseID"><b>Select Disease : </b></label>
                <div class=test> <select class="form-control" name="DiseaseID" value="<?php if(isset($row['DiseaseID'])){echo $row['DiseaseID'];}?>">
                    <option value="">Select Disease</option>
                <?php 
                    $res=mysqli_query($con,"Select * from Disease_Treatment");
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <option value=<?php echo isset($row['DiseaseID']);?> <?php if(isset($_GET["DiseaseID"])==$row['DiseaseID']){ ?> selected<?php } ?>><?php echo $row['DiseaseID']; echo ' - '; echo $row['DiseaseName'];?></option>
                <?php
                      }
                ?>
                </select>  </div>
            </div>
            <div>
              <label for="Comments"><b>Comments: </b></label>
              <input type="text" id="Breed" placeholder="Enter Comments" name="Comments" >
            </div>
            
            <div><button type="submit">Submit</button></div>

          </form>
<form method='post' action=''>
<input type='submit' value='Back to main Menu' name='Main'>
<?php 
    if(isset($_POST['Main'])){
      header("Location: ../index.php");   
  }
?>
</form></body>
</html>

