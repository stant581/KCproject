<?php
session_start();
error_reporting(0);
include('includes/config.php');
/*
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

// code for block employee    
if(isset($_GET['EID']))
{
$id = $_GET['EID'];
$cid = $_GET['ID'];
print_r($cid);

$sql = "SELECT eid,FullName,Number,email from tblemployee where eid='$id' and status=1";
$conn->query($sql);
$results_e=$conn-> query($sql);
$results_e->fetch_all(MYSQLI_ASSOC);
foreach($results_e as $result_e){
    $n_eid = $result_e['eid'];
    $n_FullName = $result_e['FullName'];
    $n_Number = $result_e['Number'];
    $n_email = $result_e['email'];
}

$stm = "INSERT INTO tblproject VALUES('$n_eid','$n_FullName','$n_Number','$n_email','$cid')";

if($conn->query($stm)=="TRUE")
{
    
$_SESSION['msg']="Employee added to Project";
header('location:select-employee.php');
}
else 
{
//$_SESSION['error']="Something went wrong. Please try again";
echo "Error: " . $sql . "<br>" . $conn->error;
header('location:select-employee.php');
}
/*
$_SESSION['delmsg']="Client deleted scuccessfully ";
header('location:select-employee.php');

}
//code for active employees
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "UPDATE tblemployee SET status='$status'  WHERE eid='$id'";
$conn->query($sql);
header('location:select-employee.php');
}*/

    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Select employees</title>
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
        <form action='here.php' method='POST'>   
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Assign Employee to Project</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Reg employees
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Email id </th>
                                            <th>Mobile Number</th>
                                            <th>Reg Date</th>
                                            <th>Status</th>
                                            <th>Assign</th>
                                    <tbody>
<?php $sql = "SELECT * from tblemployee where status=1 and Type=2";
$results=$conn-> query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
$num = 0;

if($results->num_rows>0)
{
foreach($results as $result)
{               ?>                    
                                                  
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['eid']);?></td>
                                            <td class="center"><?php echo htmlentities($result['FullName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['email']);?></td>
                                            <td class="center"><?php echo htmlentities($result['Number']);?></td>
                                             <td class="center"><?php echo htmlentities($result['RegDate']);?></td>
                                            <td class="center"><?php if($result['status']==1)
                                            {
                                                echo htmlentities("Active");
                                            } else {

                                            echo htmlentities("Blocked");
											}
                                            ?></td>
                                            <td><input type='checkbox' name='emp[<?php echo $num;?>]' value='<?php echo htmlentities ($result['eid']);?>'></td>
                                            
                                            
                                            <!--
                                            
                                            <td class="center">
                                            <a href="select-employee.php?EID=<?php echo htmlentities($result['eid']);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Add</button>    -->
                                        </tr>
                    
 <?php $cnt=$cnt+1; $num = $num+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            <input type='hidden' name='hiddencounter2' value='<?php echo htmlentities($_GET['ID']);?>'>
                           <input type='hidden' name='hiddencounter' value='<?php echo htmlentities($num);?>'>
                        <input type="submit" name="add" value='Add Member' class="btn btn-info">
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

        </form>     
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
?>
