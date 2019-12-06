<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else
{
    $cid = $_GET['CID'];
    $hr = $_GET['hr'];
    $eid = $_GET['EID'];
    $approve = 0;
    $y=$hr;
    if (isset($_POST['submit']))
    {
        $hours = $_POST['hours'];
        $date = $_POST['date'];
        $hr1 = $_POST['hr1'];
        $x = $hours+$hr1;
        
        $sql = "INSERT INTO tbltimesheet (CID, EID, hr, date, approve) VALUES ('$cid' , '$eid', '$hr1', '$date', '$approve')";
        $result=$conn->query($sql);
        if($result=="TRUE"){
            echo '<script>alert("You have successfully entered into the timesheet")</script>';
        }
        else{
             echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Timesheet</title>
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
      <!------MENU SECTION START--6
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->

    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Time Sheet</h4>

                            </div>
        <div class="col-md-12">
           <h5> Totals Hours in the Project =
        <?php
        $sql11 = "SELECT * FROM tbltimesheet where CID='$cid'";
        $res = $conn->query($sql11);
        $res->fetch_array(MYSQLI_ASSOC);
        if ($res->num_rows>0) {
          $su = 0;
          foreach($res as $re)
              {
                  $su = $su + $re['hr'];
              }
        }
        echo htmlentities($su);
         ?>
         </h5>
         </div>
        <center>
            <form method="POST">
                <table>
                    <tr>
                        <td>
                            Date
                        </td>
                        <td>
                           <input class="form-control" type="date" name="date" autocomplete="on"  required />  
                          <!--  <input type='text' autocomplete="on" name="date" placeholder="yyyy-mm-dd" id="date">-->
                        </td>
                        </tr>
                        <tr>
                        <td>
                            Hour
                        </td>
                        <td>
                            <input type='number' name='hr1' id='hr1' placeholder='Hours'>
                        </td>
                        <td>
                            <h11 name='hours' value='<?php echo htmlentities($su); ?>'</h11>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12">
                            
                                    <button type="submit" name="submit" class="btn btn-info">Submit </button>
                                    
                                  
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>

                                            <th>Date</th>
					   					    <th>Name of Holiday</th>


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

                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

</body>
</html>
<?php
}
?>
