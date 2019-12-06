<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{
    $cid = $_GET['CID'];
    $eid = $_GET['EID'];
    $date = $_GET['date'];
    $hr = $_GET['hr'];
    $sql ="DELETE FROM tbltimesheet WHERE CID='$cid' and EID='$eid' and date='$date'";
    $conn->query($sql);
   header('location:dashboard.php');
}
    ?>
