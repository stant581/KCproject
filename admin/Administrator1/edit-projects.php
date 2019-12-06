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
$id_e=$_GET['ID'];
$opp_no_old=$_POST['opp_no_old'];
$ref=$_POST['ref'];
$opp_name=$conn->real_escape_string($_POST['opp_name']);
$opp_desc=$conn->real_escape_string($_POST['opp_desc']);
$plant=$_POST['plant'];
$business=$_POST['business'];
$entity = $_POST['entity'];

$cont_type = $_POST['cont_type'];
$cont_scope = $_POST['cont_scope'];
$leb = $_POST['leb'];
$forecast_val = $_POST['forecast_val'];
$net = $_POST['net'];
if(!isset($_POST['booking']))
    $booking = 0;
else{$booking=$_POST['booking'];}
$proposal_man = $_POST['proposal_man'];
$sales_man = $_POST['sales_man'];
$creator = $_POST['creator'];
$status = $_POST['status'];
$bid_request_val = date('Y-m-d',strtotime($_POST['bid_request_actual']));
$proposal_expected = date('Y-m-d',strtotime($_POST['proposal_expected']));
$proposal_last = date('Y-m-d');
$ord_date_expected = date('Y-m-d',strtotime($_POST['ord_date_expected']));
$ord_date_actual = date('Y-m-d',strtotime($_POST['ord_date_actual']));
$estimated = $_POST['estimated'];
$manager = $_POST['man_id'];
if($status=="Won")
{
    $contract=$id_e;
    $contract=str_replace('P', 'C', $contract); 
    $conv = 1;
    $type=2;
    $sql_u="INSERT INTO tblopportunity VALUES('$contract','$opp_no_old','$ref','$opp_name','$opp_desc','$plant','$business','$entity','$cont_type','$cont_scope','$leb','$forecast_val','$net','$booking','$proposal_man','$sales_man','$creator','$status','$bid_request_val','$proposal_expected','$proposal_last','$ord_date_expected','$ord_date_actual','$estimated','$type','$manager','$conv')";
    $sql_up ="UPDATE tblopportunity SET Conv='$conv'";
    $conn->query($sql_up);
    if($conn->query($sql_u)=="TRUE")
    {
        $_SESSION['updatemsg']="Contract Approved";
        header('location:manage-contracts.php');
    }
    else
    {
        echo "Error: " . $sql_u . "<br>" . $conn->error;
        header('location:manage-projects.php');
    }
}
else
{
    $sql_e="UPDATE tblopportunity set OldOpportunity='$opp_no_old',Reference='$ref',Opportunity_Name='$opp_name',Opportunity_Des='$opp_desc',Plant='$plant',Business_unit='$business',Entity='$entity',Contract_type='$cont_type',Contract_scope='$cont_scope',LEB='$leb',Forecast_val='$forecast_val',Net_contribution='$net',Booking_reporting_val='$booking',Proposal_man='$proposal_man',Sales_man='$sales_man',Creator='$creator',Status='$status',Bid_request_actual='$bid_request_val',Proposal_expected='$proposal_expected',Proposal_last='$proposal_last',Ord_date_expected='$ord_date_expected',Ord_date_actual='$ord_date_actual',Estimated='$estimated' where Opportunity_No='$id_e'";
   
    if($conn->query($sql_e)=="TRUE")
    {
        $_SESSION['updatemsg']="Project Approved";
        header('location:manage-projects.php');
    }
    else
    {
        echo "Error: " . $sql_e . "<br>" . $conn->error;
        header('location:edit-projects.php');
    }
}
}
?>

<?php
//getting id from url
$id = $_GET['ID'];
$sql1="SELECT * from tblopportunity where Opportunity_No='$id'";
//selecting data associated with this particular id
$result = $conn->query($sql1);
while($res = $result->fetch_array(MYSQLI_ASSOC))
{
    $old_e = $res['OldOpportunity'];
    $ref_e = $res['Reference'];
    $opp_name_e = $res['Opportunity_Name'];
    $opp_des_e = $res['Opportunity_Des'];
    $plant_e = $res['Plant'];
    $business_e = $res['Business_unit'];
    $entity_e = $res['Entity'];
    $cont_type_e = $res['Contract_type'];
    $cont_scope_e = $res['Contract_scope'];
    $leb_e = $res['LEB'];
    $forecast_val_e = $res['Forecast_val'];
    $net_e = $res['Net_contribution'];
    $booking_e = $res['Booking_reporting_val'];
    $proposal_man_e = $res['Proposal_man'];
    $sales_man_e = $res['Sales_man'];
    $creator_e = $res['Creator'];
    $status_e = $res['Status'];
    $bid_request_actual_e = $res['Bid_request_actual'];
    $proposal_expected_e =$res['Proposal_expected'];
    $proposal_last_e = $res['Proposal_last'];
    $ord_date_expected_e = $res['Ord_date_expected'];
    $ord_date_actual_e = $res['Ord_date_actual'];
    $estimated_e = $res['Estimated'];
    $manager_e = $res['Manager_Id'];
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Project</title>
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
    <div class="content-wra
    <div class="content-wrapper">
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
Edit Project
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Old/Other Opportunity No</label>
<input class="form-control" type="text" name="opp_no_old" value="<?php echo $old_e;?>" autocomplete="on" />
</div>
<div class="form-group">
<label>Customer Reference</label>
<input class="form-control" type="text" name="ref" value="<?php echo $ref_e;?>" autocomplete="on"   />
</div>

<div class="form-group">
<label>Opportunity Name</label>
<input class="form-control" type="text" name="opp_name" value="<?php echo $opp_name_e;?>" autocomplete="on"  />
</div>

<div class="form-group">
<label>Opportunity Description / Comments</label>
<input class="form-control" type="text" name="opp_desc"  value="<?php echo $opp_des_e;?>" autocomplete="on"   />
</div>

<div class="form-group">
<label>Plant Name & Unit No</label>
<input class="form-control" type="text" name="plant" value="<?php echo $plant_e;?>" autocomplete="on"   />
</div>

<div class="form-group">
<label>Business Unit</label>
<select class="form-control" name="business"  >
<option value""><?php echo $business_e;?></option>
<option value"B1">Electrostatic precipitator</option>
<option value"B2">Flue gas Desulphurization</option>
<option value"B3">DeSOX </option>
<option value"B4">Fabric Filters</option>
</select>
</div>

<div class="form-group">
<label>KC Entity</label>
<select class="form-control" name="entity">
<option value""><?php echo $entity_e;?></option>
<option value"K1">KCKR</option>
<option value"K2">KCIN</option>
<option value"K3">KCVT </option>
<option value"K4">KCUS</option>
</select>
</div>

<div class="form-group">
<label>Contract Typle<span style="color:red;">*</span></label>
<select class="form-control" name="cont_type" >
<option value""><?php echo $cont_type_e;?></option>
<option value"C1">New Build</option>
<option value"C2">Renovation</option>
<option value"C3">Customer Service</option>
<option value"C4">Spare Parts</option>
<option value"C5">Service Only</option>
</select>
</div>

<div class="form-group">
<label>Contract Scope<span style="color:red;">*</span></label>
<select class="form-control" name="cont_scope"  >
<option value""><?php echo $cont_scope_e;?></option>
<option value"S1">Engg. Only</option>
<option value"S2">Engg + Materail Only</option>
<option value"S3">Service Only </option>
<option value"S4">Engg+Supp+Erection(excl.civil)</option>
<option value"S4">Engg+Supp+Erection (Incl.Civil)</option>
</select>
</div>
<div class="form-group">
<label>LEB Method<span style="color:red;">*</span></label>
<select class="form-control" name="leb" value="<?php echo $leb_e;?>" >
<option value"L1">A</option>
<option value"L2">B</option>
<option value"L3">C </option>
</select>
</div>


<div class="form-group">
<label>Forecast Value<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="forecast_val" value="<?php echo $forecast_val_e;?>" autocomplete="on"  required />
</div>


<div class="form-group">
<label>Net Contribution %<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="net" value="<?php echo $net_e;?>" autocomplete="on"  required />
</div>


<div class="form-group">
<label> Proposal Manager<span style="color:red;">*</span></label>
<select class="form-control" name="proposal_man" >
<option value""><?php echo $proposal_man_e;?></option>

<?php $sql = "SELECT * FROM tblemployee where status=1";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>    
<option value="<?php echo htmlentities($result['FullName']);?>"><?php echo htmlentities($result['FullName']);?></option>
 <?php }} ?> 
</select>
</div>

<div class="form-group">
<label> Sales Man<span style="color:red;">*</span></label>
<select class="form-control" name="sales_man" >
<option value""><?php echo $sales_man_e;?></option>

<?php $sql = "SELECT * FROM tblemployee where status=1";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>    
<option value="<?php echo htmlentities($result['FullName']);?>"><?php echo htmlentities($result['FullName']);?></option>
 <?php }} ?> 
</select>
</div>



<div class="form-group">
<label> Creator<span style="color:red;">*</span></label>
<select class="form-control" name="creator" >
<option value""><?php echo $creator_e;?></option>

<?php $sql = "SELECT * FROM tblemployee where status=1";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>    
<option value="<?php echo htmlentities($result['FullName']);?>"><?php echo htmlentities($result['FullName']);?></option>
 <?php }} ?> 
</select>
</div>



<div class="form-group">
<label>Status<span style="color:red;">*</span></label>
<select class="form-control" name="status" onChange=checkValue(this.value)>
<option value"D"><?php echo $status_e;?></option>
<option value"1">Budget</option>
<option value"2">Buyer Defined</option>
<option value"3">Lost</option>
<option value"4">Won</option>
<option value"5">Hold</option>
<option value"6">Cancelled</option>
<option value"7">No Bid</option>
</select>
 <script>
    function checkValue(val) {
        console.log(val)
        if(val == "Won")
        {
            document.getElementById("hiddenBook").disabled=false;
            document.getElementById("hiddenDate").disabled=false;
        }
            
        else
        {
            document.getElementById('hiddenBook').disabled=true;
            document.getElementById("hiddenDate").disabled=true;
        }
    }
</script>

</div>
<div class="form-group">
    <label>Booking Reporting Value</label>
    <input id="hiddenBook" disabled="disabled" class="form-control" type="number" name="booking"  autocomplete="on"  required placeholder="Enter the value here"/>
</div>
<div class="form-group">
<label>Bid Request Recieved(Actual)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="bid_request_actual" value="<?php echo $bid_request_actual_e;?>" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Proposal Expected(Expected)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="proposal_expected" value="<?php echo $proposal_expected_e;?>" autocomplete="on"  required />
</div>

<div class="form-group">
<label>Order Date(Expected)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="ord_date_expected" value="<?php echo $ord_date_expected_e;?>" autocomplete="on"  required />
</div>

<div class="form-group">
    <label>Order Date(Actual) or Closed Date(Actual)</label>
    <input id="hiddenDate" disabled="disabled" class="form-control" type="date" name="ord_date_actual"  autocomplete="on"  required placeholder="Enter the value here"/>
</div>

<div class="form-group">
<label>Estimated Hours of Work<span style="color:red;">*</span></label>
<input class="form-control" type="number" name="estimated" value="<?php echo $estimated_e;?>" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Manager ID<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="man_id" value="<?php echo $manager_e;?>" autocomplete="on"  required />
</div>


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
