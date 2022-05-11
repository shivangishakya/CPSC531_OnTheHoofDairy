<?php include '../dbconnect.php'; ?>
<?php if(isset($_POST["submit"]))
{
 $query = "SELECT * FROM Births";
 $res = mysqli_query($con, $query);
 if(mysqli_num_rows($res) > 0)
 {
 $export .= '
 <table> 
 <tr> 
 <th>Birth ID</th>
 <th>COW ID</th> 
 <th>Date</th> 
 <th>Gender</th> 
 <th>Comments</th> 
 
 </tr>
 ';
 while($row = mysqli_fetch_array($res))
 {
 $export .= '
 <tr>
 <td>'.$row["BID"].'</td> 
 <td>'.$row["CowID"].'</td> 
 <td>'.$row["Date"].'</td> 
 <td>'.$row["Gender"].'</td> 
 <td>'.$row["Comments"].'</td> 
 
 </tr>
 ';
 }
 $export .= '</table>';
 $fileName = "Birth_DATA-".date('d-m-Y').".xls";
 header('Content-Type: application/vnd.ms-excel');
 header('Content-Disposition: attachment; filename='.$fileName);
 echo $export;
 }
}
?>