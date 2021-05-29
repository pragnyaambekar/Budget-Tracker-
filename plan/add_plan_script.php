<?php
    $con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));  
    session_start();
    $title = $_POST['title'];
    
    $from = $_POST['from'];
    
    $to = $_POST['to'];

    $budget = $_POST['budget'];
    $people = $_POST['people'];
    $creator = $_SESSION['id'];
    $_SESSION['people'] = $people;
    $_SESSION['budget'] = $budget;
    
    
    
    $insert = "insert into plan (title,from_date,to_date,budget,no_of_people,creator) values('$title','$from','$to','$budget','$people','$creator')";
    
    $insert_query = mysqli_query($con,$insert) or die(mysqli_error($con));
    $plan_id = mysqli_insert_id($con);
  
    for ($i=1;$i<=$people;$i++) {
        $name = $_POST["name$i"];
        
        $username_query = "insert into usernames (names,plan_id) values('$name','$plan_id')";
        $username_result = mysqli_query($con,$username_query) or die(mysqli_error($con));
    }
    
    if ($insert_query){
        header('location:../home/home.php');
    }

    
?>