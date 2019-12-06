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
  $hr = $_GET['hr'];
  $eid = $_GET['EID'];
  $date1 = $_GET['date'];
    if (isset($_POST['update']))
    {
        $approve=0;
        $hr1 = $_POST['hr1'];
        if ($hr1<=8)
        {
            echo $su;
        $sql = "UPDATE tbltimesheet SET hr='$hr1', approve='$approve' WHERE CID='$cid' and EID='$eid' and date='$date1'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Record updated successfully")</script>';
        }
        else {
          echo "Error updating record: " . $conn->error;
        }
      }
    }
      header('dashboard.php');


                   ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Time Sheet</h4>
    </div>
     <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong>
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>


   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>


        </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Task Id <?php echo $cid  ?>
                        </div>
                        
                        
<?php
$sql1 = "SELECT * FROM tbltimesheet where CID='$cid' and EID='$eid' and date='$date1'";
$res=$conn->query($sql1);
$res->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($res->num_rows> 0)
{
foreach($res as $re)
{               ?>
<form method="post">
    <center>
    <table>
        <tr>
            <td>
                Date 
            </td>
            <td>
                <?php echo htmlentities($date1); ?>
            </td>
        </tr>
        <tr>
            <td>
                Hours
            </td>
            <td>
                <input type="number" name="hr1" value='<?php echo htmlentities($re['hr'])?>'>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <?php
                $su=0;
                $su1=0;
        $sql11 = "SELECT * FROM tbltimesheet where CID='$cid'";
        $res = $conn->query($sql11);
        $res->fetch_array(MYSQLI_ASSOC);
        if ($res->num_rows>0) {
          foreach($res as $re)
              {
                  $su = $su + $re['hr'];
              }
        }
        $sql11 = "SELECT * FROM tbltimesheet where EID='$eid' and date='$date'";
        $res = $conn->query($sql11);
        $res->fetch_array(MYSQLI_ASSOC);
        if ($res->num_rows>0) {
          foreach($res as $re)
              {
                  $su1 = $su1 + $re['hr'];
              }
        }
        if($su>$hr && $su1<8)
        {
         ?>
                <button type="submit" name="update" class="btn">Update </button>
                <?php
                    }
                else
                {
                ?>
                <h4> You cannot update anymore</h4>
                <?php
                }
                ?>
                
            </td>
        </tr>
        
        
    </table>
    
    </center>
                    
 <?php }} ?>
</form>
                                        
            </div>



    </div>
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
