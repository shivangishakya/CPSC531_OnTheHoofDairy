<?php include '../dbconnect.php'; ?>
<?php if(isset($_POST["submit"]))
{
 $query = "SELECT * FROM Milk";
 $res = mysqli_query($con, $query);
 if(mysqli_num_rows($res) > 0)
 {
 $export .= '
 <table> 
 <tr> 
 <th>Milk ID</th>
 <th>Cow ID</th> 
 <th>Date</th> 
 <th>Quantity</th> 
 <th>Comments</th> 
 
 </tr>
 ';
 while($row = mysqli_fetch_array($res))
 {
 $export .= '
 <tr>
 <td>'.$row["MID"].'</td> 
 <td>'.$row["CowID"].'</td> 
 <td>'.$row["Date"].'</td> 
 <td>'.$row["Quantity"].'</td> 
 <td>'.$row["Comments"].'</td> 
 
 </tr>
 ';
 }
 $export .= '</table>';
 $fileName = "Milk_DATA-".date('d-m-Y').".xls";
 header('Content-Type: application/vnd.ms-excel');
 header('Content-Disposition: attachment; filename='.$fileName);
 echo $export;
 }
}
?>