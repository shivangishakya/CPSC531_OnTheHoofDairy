
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
            <a href="#cow" >ON THE HOOF DAIRY!!!</a>
      </div>
          <form action="DiseaseDB.php" method="post">
            <div>
              <label for="DiseaseName"><b>Disease Name:</b></label>
              <input type="text" id="DiseaseName" placeholder="Enter Disease Name" name="DiseaseName" required>
            </div>
              <div id="Symptomcontainer">
            <div class="template">
              <label for="Symptom"><b>  <?php echo "  " ?> Enter Symptom : </b></label>
              <input type="Symptom" id="Symptom" placeholder="Enter Symptom" name="Symptom[]" >

              <label for="Severity"><b>Choose Severity: </b></label>
              <select id="Severity" name="Severity[]">                      
                <option value="0">--Select Level--</option>
                <option value="Low">L</option>
                <option value="Medium">M</option>
                <option value="High">H</option>
            </select>
            </div>
              </div>
            <div>
              <input type="button" value="Add" onclick="addsym()" name="Add">
            </div>
            <div>
              <label for="Treatment"><b>Enter Treatment: </b></label>
              <input type="text" id="Source" placeholder="Enter Treatment" name="Treatment" >
            </div>
            <div>
              <label for="Medication"><b>Enter Medication: </b></label>
              <input type="text" id="Medication" placeholder="Enter Medication" name="Medication" >
            </div>
            <div>
              <label for="Quantity"><b>Enter Quantity: </b></label>
              <input type="text" id="Quantity" placeholder="Enter Quantity" name="Quantity" >
            </div>
            <div>
              <label for="Cost"><b>Enter Cost: </b></label>
              <input type="number" id="Cost" placeholder="Enter Cost" name="Cost" >
            </div>
            <div>
              <button type="submit">Submit</button>
            </div>
          </form>
        <script>
        function addsym()
            {
                var item=document.getElementsByClassName("template")[0];
                console.log(item);
                var clone=item.cloneNode(true);
                document.getElementById("Symptomcontainer").appendChild(clone);
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

