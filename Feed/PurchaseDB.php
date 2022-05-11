<?php ob_start() ?>
<?php

require_once("../dbconnect.php");

$Date = mysqli_real_escape_string($con, $_REQUEST['Date']);
$SupplierID = mysqli_real_escape_string($con, $_REQUEST['SupplierID']);
$DCost = mysqli_real_escape_string($con, $_REQUEST['DCost']);

$ItemID = $_REQUEST['ItemID'];
$Quantity = $_REQUEST['Quantity'];

$size = count($ItemID);
$sum = 0;
echo "<br>";

for($i = 0 ; $i < $size ; $i++)
{
    $sql = "SELECT * FROM FeedItems ";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0)
    {
        while($array=mysqli_fetch_row($result))
        {
            if ($ItemID[$i] === $array[0])
            { 
                echo $array[3];
                $sum = $sum + $array[3]*$Quantity[$i];
            }
        }
    } 
}
$sum = $sum + $DCost;
echo "<br>";
echo $sum;

$my_query = "";

$my_query = "INSERT INTO FeedPurchase (Date,SupplierID,DeliveryCost,TotalCost) VALUES ('$Date','$SupplierID','$DCost','$sum')";

$entry = 0;

if(mysqli_query($con, $my_query)){
    $lastid = mysqli_insert_id($con);
    $entry = $entry + 1;
} else{
    echo "ERROR: Could not able to execute $my_query. " . mysqli_error($con);
}


$Amount = array();
$count = 0;

for($i = 0 ; $i < $size ; $i++)
{
    $sql = "SELECT * FROM FeedItems ";
    $result = mysqli_query($con,$sql);

    if ($result->num_rows > 0)
    {
        while($array=mysqli_fetch_row($result))
        {
            if ($ItemID[$i] === $array[0])
            {
                $Amount[$i] = $array[3]*$Quantity[$i];
                $my_query = "";
                //echo $ItemID[$i];
                $my_query = "INSERT INTO ItemPurchase (PurchaseID,ItemID,Quantity,Amount) VALUES ('$lastid','$ItemID[$i]','$Quantity[$i]','$Amount[$i]')";
                        
                if(mysqli_query($con, $my_query))
                {
                    $count = $count+1;
                    $entry = $entry + 1;
                } 
                else
                {
                    $message = "ERROR: Could not able to execute $my_query. " . mysqli_error($con);
                }
            }
        }
    }
    
}

if (($count == $size))
{
    $message = "Records Added Successfully";
} 
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location: PurchaseView.php");

mysqli_close();

?>