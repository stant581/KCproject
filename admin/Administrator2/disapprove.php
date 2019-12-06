<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{
if(isset($_GET['CID']) && isset($_GET['EID']) && isset($_GET['date']))
{
$status=1;$cid = $_GET['CID'];
  $eid = $_GET['EID'];
  $date1 = $_GET['date'];
        $sql = "UPDATE tbltimesheet SET approve='0' WHERE CID='$cid' and EID='$eid' and date='$date1'";

$conn->query($sql);

header('location:manage-projects.php');
}
}
?>
