<?php 
include('includes/config.php');
if(isset($_POST['add'])){
    $counter = $_POST['hiddencounter'];
    $emp = $_POST['emp'];
    $pid = $_POST['hiddencounter2'];
    
    for($x=0;$x<=$counter;$x++){
        if(empty($emp[$x])){
        
    }
    else
    {
        $count = 0;
       $sql = "SELECT eid,FullName,Number,email from tblemployee where eid='$emp[$x]' and status=1";
       $conn->query($sql);
       $results_e=$conn-> query($sql);
       $results_e->fetch_all(MYSQLI_ASSOC);
       foreach($results_e as $result_e){
        $n_eid = $result_e['eid'];
        $n_FullName = $result_e['FullName'];
        $n_Number = $result_e['Number'];
        $n_email = $result_e['email'];
        }
        $stm = "INSERT INTO tblproject VALUES('$n_eid','$n_FullName','$n_Number','$n_email','$pid')";
        $results = $conn->query($stm);
        $count = 1;
        echo "Members added successfully";
        
    }
    }
}
if($count > 0){
    header('location:select-employee-projects.php');
}
else{
    header('location:select-employee-projects.php');
}

?>