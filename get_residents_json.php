<?php
include('connect.php');
include('tables.php');
$result = mysqli_query($con,"SELECT * FROM $table1 ORDER BY lname");
$rows = array();
while($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}
print json_encode($rows);
mysqli_close($con);
?>
