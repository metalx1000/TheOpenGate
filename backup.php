<?php
include('connect.php');
include('tables.php');

echo "Creating Backup JSON file...";

$result = mysqli_query($con,"SELECT * FROM $table ORDER BY title");
$rows = array();
while($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}
$json = json_encode($rows);

$myfile = fopen("backups/db-backup-".time().".json", "w") or die("Unable to open file!");
fwrite($myfile, $json);
fclose($myfile);

mysqli_close($con);
?>
