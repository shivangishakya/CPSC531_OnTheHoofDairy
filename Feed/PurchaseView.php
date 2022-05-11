<?php ob_start() ?>
<?php include '../dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>table {
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
input[type= submit]{ background-color: orange;
            border: none;
            text-decoration: none;
            color: white;
            padding: 20px 20px;
            margin: 20px 20px;
            cursor: pointer;
}</style>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Purchase Information</h2>
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Purchase ID</th>
                    <th>Date</th>
                    <th>Supplier Name</th>
                    <th>Item Name</th>
                    <th>Cost per item</th>
                    <th>Quantity per item</th>
                    <th>Amount = Cost per item * Quantity per item</th>
                    <th>Delivery Charge</th>
                    <th>Total Amount to pay</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT FeedPurchase.PurchaseID, FeedPurchase.Date, Supplier.SupplierName, FeedItems.ItemName, FeedItems.Cost, ItemPurchase.Quantity, ItemPurchase.Amount, FeedPurchase.DeliveryCost, FeedPurchase.TotalCost  FROM FeedPurchase INNER JOIN Supplier ON FeedPurchase.SupplierID = Supplier.SupplierID INNER JOIN ItemPurchase ON ItemPurchase.PurchaseID = FeedPurchase.PurchaseID INNER JOIN FeedItems ON FeedItems.ItemID = ItemPurchase.ItemID ORDER BY FeedPurchase.PurchaseID ASC";
                    $result = mysqli_query($con,$sql);?>
                    <?php if ($result->num_rows > 0): ?>
                    <?php while($array=mysqli_fetch_row($result)): ?>
                    <tr>
                        <?php if ($lastval == $array[0]):?>
                        <th scope="row"><?php echo " ";?></th>
                        <td><?php echo " ";?></td>
                        <td><?php echo " ";?></td>
                        <td><?php echo $array[3];?></td>
                        <td><?php echo $array[4];?></td>
                        <td><?php echo $array[5];?></td>
                        <td><?php echo $array[6];?></td>
                        <td><?php echo " ";?></td>
                        <td><?php echo " ";?></td>
                        <?php else:?>
                        <th scope="row"><?php echo $array[0];?></th>
                        <td><?php echo $array[1];?></td>
                        <td><?php echo $array[2];?></td>
                        <td><?php echo $array[3];?></td>
                        <td><?php echo $array[4];?></td>
                        <td><?php echo $array[5];?></td>
                        <td><?php echo $array[6];?></td>
                        <td><?php echo $array[7];?></td>
                        <td><?php echo $array[8];?></td>
                        <?php endif; ?>
                        <?php $lastval = $array[0]; ?>
                    <?php endwhile; ?>
                    <?php else: ?>    
                    </tr>
                    <tr>
                    <td colspan="3" rowspan="1" headers="">No Data Found</td>
                    </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
            </tbody>       
      </table>
      </div>
    </div>        
</div>
<form method='post' action=''>
<input type='submit' value='Back to main Menu' name='Main' 
<?php 
    if(isset($_POST['Main'])){
      header("Location: ../index.php");   
  }
?>>
</form>
</body>
</html>

