<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('include/header.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
    $date = $_POST['date_holiday'];
    $cause = $conn->real_escape_string($_POST['holiday']);
    $sql = "INSERT INTO tblholiday VALUES('$date','$cause')";
    $results = $conn->query($sql);
    
//$lastInsertId = $dbh->lastInsertId();
if($results)
{
$_SESSION['msg']="Project Listed successfully";
header('location:map-holidays.php');
}
else 
{
//$_SESSION['error']="Something went wrong. Please try again";
echo "Error: " . $sql . "<br>" . $conn->error;
header('location:map-holidays.php');
}
$sql->close();

}
else
if(isset($_GET['del']))
{
$id=$_GET['del'];

$sql = "delete from tblholiday WHERE Date='$id'";
$conn->query($sql);
$_SESSION['delmsg']="Client deleted scuccessfully ";
header('location:map-holidays.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Project</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
                <h4 class="header-line">ADD HOLIDAYS</h4>
                
                            </div>
                            </div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Add Date Here
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Select Date</label>
<input class="form-control" type="date" name="date_holiday" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Name of the Holiday</label>
<input class="form-control" type="text" name="holiday" autocomplete="on"  required />
</div>
<center>
<button type="submit" name="add" class="btn btn-info">Add</button>
</center>
                                    </form>
            </br>            
     <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Dates Inserted as Holidays
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Date</th>
					   					    <th>Name of Holiday</th>
					   					    <th>Remove</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * FROM tblholiday";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
											 <td class="center"><?php echo htmlentities($result['Date']);?></td>
											  <td class="center"><?php echo htmlentities($result['Cause']);?></td>
                                            <td class="centre">
                                          <a href="map-holidays.php?del=<?php echo htmlentities($result['Date']);?>" onclick="return confirm('Are you sure you want to delete?');">  <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</button>
                                          </td>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>
    </div>
        </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
