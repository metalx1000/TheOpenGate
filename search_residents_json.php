<?php
include('connect.php');
include('tables.php');
$_GET = array_map('strip_tags', $_GET);
$_GET = array_map('htmlspecialchars', $_GET);
if(isset($_GET['strict'])) {
    $strict = $_GET['strict'];
}else{
    $strict = false;
}
$count = count($_GET);
if($count > 0){
    if($strict == true){
        print "STRICT <BR>";
        foreach ($_GET as $key => $value) {
            if($key != "strict"){
                $where[] = " `$key` = '$value'";
                $where_clause = implode(' AND ', $where);
            }
        }
    }else{
        foreach ($_GET as $key => $value) { 
            if($key != "strict"){
                $where[] = " `$key` = '$value'";
                $where_clause = implode(' OR ', $where);
            }
        }
    }
    $result = mysqli_query($con,"SELECT * FROM $table1 WHERE $where_clause ORDER BY lname DESC");
}else{
    $result = mysqli_query($con,"SELECT * FROM $table1 ORDER BY lname DESC");
}
$rows = array();
while($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}
print json_encode($rows);
mysqli_close($con);
?>
