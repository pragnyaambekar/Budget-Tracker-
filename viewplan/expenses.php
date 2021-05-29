<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
    $title = $_POST['title'];
    $date = $_POST['date'];
    $spent = $_POST['spent'];
    $plan_id = $_GET['plan_id'];
    $person = $_POST['person'];
    $uploaded = 0;
    function GetImageExtension($imagetype){
        if (empty($imagetype)) return false;
        switch ($imagetype) {
            case 'image/bmp':
                return '.bmp';
            case 'image/gif':
                return '.gif';
            case 'image/jpeg':
                return '.jpg';
            case 'image/png':
                return '.png'; 
            default:
                return false;
        }
    }

    if (!empty($_FILES["uploadedimage"]["name"])) {
        $file_name = $_FILES["uploadedimage"]["name"];
        $temp_name = $_FILES["uploadedimage"]["tmp_name"];
        $imgtype = $_FILES["uploadedimage"]["type"];
        $ext = GetImageExtension($imgtype);
        $imagename = date("d-m-Y") . "-" . time() . $ext;
        $target_path = "../bills/" . $imagename;
        if (move_uploaded_file($temp_name, $target_path)) {
            $insert_query = "insert into expenses (plan_id,title,date,spent,person_id,img) values ('$plan_id','$title','$date','$spent','$person','$imagename')";
            $insert_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
            $uploaded = 1;
            }
    } 
    else {
        $insert_query = "insert into expenses (plan_id,title,date,spent,person_id) values ('$plan_id','$title','$date','$spent','$person')";
        $insert_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
        $uploaded = 1;
    }   
    if($uploaded == 1){
        $amount_spent_query = "SELECT spent FROM plan WHERE id = $plan_id";
        $amount_spent_submit = mysqli_query($con,$amount_spent_query) or die(mysqli_error($con));
    
        $row = mysqli_fetch_array($amount_spent_submit);
        $amount_spent_total = $row['spent'] + $spent;
        $update_amount_spent_query = "UPDATE plan SET spent = $amount_spent_total WHERE id = '$plan_id'";
        $update_amount_spent_submit = mysqli_query($con,$update_amount_spent_query) or die(mysqli_error($con));
        header("location:viewplan.php?plan_id=$plan_id");
    }


    
    

?>