<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['edit']))
{
    $eid=$_POST['eid'];
    $fullname=$_POST['name'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    $type = $_POST['type_e'];
    $pass = $_POST['password'];
    if($type == 0){
    $sql="update  tblemployee set FullName='$fullname', Number='$number', email='$email',status='$status', Type='$type' where eid='$eid'";
    $conn->query($sql);
    $_SESSION['updatemsg']="Employee details updated successfully";
    header('location:reg-employee.php');
    }
    else if($type == 1)
    {
        $sql_admin ="INSERT INTO admin VALUES('$eid','$fullname','$number','$email','$pass','$type')";
        $sql_emp = "UPDATE tblemployee set FullName='$fullname', Number='$number', email='$email',status='$status', Type='$type' where eid='$eid'";
        $conn->query($sql_admin);
        $conn->query($sql_emp);
        header('location:reg-employee.php');
    }
    

}
?>
<?php
//getting id from url
$id = $_GET['EID'];
$sql1="SELECT * from tblemployee where eid='$id'";
//selecting data associated with this particular id
$result = $conn->query($sql1);
while($res = $result->fetch_array(MYSQLI_ASSOC))
{
    $eid_e = $res['eid'];
    $Fullname_e = $res['FullName'];
    $Number_e = $res['Number'];
    $email_e = $res['email'];
    $status_e = $res['status'];
    $type_e = $res['Type'];
    $password=$res['password'];
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Employee</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
        function UserInp()
        {
            alert("Enter the booking reporting value",0);
        }
    </script>

</head>
<body>
    
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper" method="POST">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit company</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Edit Employee Details
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>EID</label>
<input class="form-control" type="text" name="eid" value="<?php echo $eid_e;?>" autocomplete="on" />
</div>
<div class="form-group">
<label>FullName</label>
<input class="form-control" type="text" name="name" value="<?php echo $Fullname_e;?>" autocomplete="on"   />
</div>

<div class="form-group">
<label>Number</label>
<input class="form-control" type="text" name="number" value="<?php echo $Number_e;?>" autocomplete="on"  />
</div>

<div class="form-group">
<label>Email</label>
<input class="form-control" type="text" name="email"  value="<?php echo $email_e;?>" autocomplete="on"   />
</div>

<div class="form-group">
<label>Status</label>
<input class="form-control" type="text" name="status" value="<?php echo $status_e;?>" autocomplete="on"   />
</div>

<div class="form-group">
<label>Type</label>
<input class="form-control" type="text" name="type_e" value="<?php echo $type_e;?>" autocomplete="on"   />
</div>

<input type="hidden" name="password" value='<?php echo $password;?>'>

<button type="submit" name="edit" class="btn btn-info">Edit </button>

                                    </form>
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