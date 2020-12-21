<?php

//===Db Connection===//
$conn = new mysqli("localhost","root","","test");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
} 
if($conn){
    $queryCondition = '';
    if(isset($_POST['search'])){      
        $date = $_POST['date'];
        $status = $_POST['status'];
        $where_condition= '';
        if($date !=''){
            $where_condition = '';
        }
        if($status !=''){
            $where_condition = '';
        } 
        //$post_at_todate = date('Y-m-d',$date);
        
             
        
        if($status !='' && $status !='All') {
         $queryCondition .= "WHERE status = '$status'";
        }
        if(!empty($date)){            
            $queryCondition.="WHERE recharge_date = '$date'";
        }

    }
//     $sql = "select recharge_date as DATE,company, sum(case when status = 'Pending' "
//             . "then 'amount' else amount end) as 'Pending', sum(case when status = 'Success' "
//             . "then 'amount' else amount end) as 'Success', sum( case when status='Failure' "
//             . "then 'amount' else amount end) as 'Failure', sum(amount) as 'total_amount' "
//             . "from tblrecharge ".$queryCondition." group by company";
     
     $sql ="SELECT recharge_date as DATE,company, SUM(IF(status = 'Pending',amount,0)) 'Pending', SUM(IF(status = 'Success', amount, 0))"
             . " 'Success', SUM(IF(status = 'Failure', amount, 0)) "
             . "'Failure', sum(amount) as 'total_amount' FROM tblrecharge ".$queryCondition." GROUP by company";
     //echo $sql;
     
     $result = mysqli_query($conn, $sql);
   
   if(! $result ) {
      die('Could not get data: ' . mysqli_error());
   } 
}

?>

<!DOCTYPE html>
<html>
 <head>
 <title> List data</title>
 </head>
<body>
    <form method="post" action="test_p.php">
        <label>Date </label>
        <input type="date" name="date" value="" id="date">
        <select name="status" id="status">Status          
            <option value="All">All</option>
            <option value="Pending">Pending</option>
            <option value="Success">Success</option>
            <option value="Failure">Failure</option>
        </select>
        <input type="submit" value="Search" name="search">
    </form>
<?php
if (mysqli_num_rows($result) > 0) {
?>
    <h4 style="text-align: center">List of Data</h4>
  <table border="1" width="100%">
  
  <tr>
    <th>Date</th>
    <th>Company</th>
    <th>Pending</th>
    <th>Success</th>
    <th>Failure</th>
    <th>Total Amount</th>
  </tr>
<?php
$i=0;
$pending_total =0;
$success_total =0;
$failure_total =0;
$total =0;
while($row = mysqli_fetch_array($result)) {
    $pending_total += $row["Pending"];
    $success_total += $row["Success"];
    $failure_total += $row["Failure"];
    $total += $row["total_amount"];
?>
<tr>
    <td><?php echo $row["DATE"]; ?></td>
    <td><?php echo $row["company"]; ?></td>
    <td><?php echo $row["Pending"]; ?></td>
    <td><?php echo $row["Success"]; ?></td>
    <td><?php echo $row["Failure"]; ?></td>
    <td><?php echo $row["total_amount"]; ?>
    </td>
</tr>

<?php
$i++;
}
?>
<tr>
    <td colspan="2" style="text-align: right"><b>Total </b></td>
    <td> <?php echo $pending_total;?></td>
    <td> <?php echo $success_total;?></td>
    <td> <?php echo $failure_total;?></td>
    <td> <?php echo $total;?></td>
</tr>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>
