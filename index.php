<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
 //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {

$eid=$_POST['eid'];
$password=md5($_POST['password']);
$sql ="SELECT eid,password FROM tblemployee WHERE username='$eid' and Password='$password'";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
$_SESSION['login']=$_POST['$eid'];
echo "successful<br>";
echo "<script type='text/javascript'> document.location ='public_html/dashboard.php'; </script>";
} 
else{
echo "<script>alert('Invalid Details');</script>";
}
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway");

@import url("https://fonts.googleapis.com/css?family=Oswald");

body,
html {
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
}

.intro {
  height: 100%;
  width: 100%;
  margin: auoto;
  background: url(https://picsum.photos/700); no-repeat 50% 50%;
  display: table;
  top:0;
  background-size: cover;
}

.inner {
  display: table-cell;
  vertical-align: middle;
  width: 100%;
  max-width: none;
}

.content {
  max-width: 500px;
  margin: 0 auto;
  text-align: center;
}

.content h1 {
  font-family: "Raleway", sans-serif;
  color: #036A81;
  text-shadow: 0px 0px 300px #000;
  font-size:500%;
}

.btn{
  border-radius: 5px;
  font-family:'Oswald', sans-serif;
  background: #D3D3D3;
  color: #0000A;
  font-size: 135%;
  padding: 10px 20px;
  border: solid #036A81 3px;
  text-transform: uppercase;
  text-decoration: none;
}

.btn:hover{
  color: #AAAAAA;
  border: solid #AAAAAA 3px;
}

p{
  font-size:160%;
  line-height: 210%;
  text-align: justify;
  margin: 3%;
  font-family: sans-serif;
}

@media only screen and(max-width: 768px){
  .content h1{
    font-size: 250%;
  }
  .btn{
    font-size:110%;
    padding 7px 15px;
  }
  p{
    font-size: 100%;
    line-height: 160%;
  }
}
    </style>

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<!--
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">EMPLOYEE LOGIN FORM</h4>
</div>
</div>
-->
<section class="intro">
  <div class="inner">
    <div class="content">
      
      <a class="btn" href="#bottom"><h1>Welcome</h1></a>
    </div>
  </div>
</section>
          
<!--LOGIN PANEL START-->        
<!--
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Employee Id</label>
<input class="form-control" type="text" name="username" autocomplete="off" required />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required />
</div>
 <div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>  

 <button type="submit" name="login" class="btn btn-info">LOGIN </button>
</form>
 </div>
</div>
</div>
</div>  
-->
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</script>
</body>
</html>
