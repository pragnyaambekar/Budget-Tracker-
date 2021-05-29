<?php 
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
session_start();
$plan_id = $_GET['plan_id'];
$plan = "select * from plan where id='$plan_id'";
$plan_result = mysqli_query($con,$plan) or die(mysqli_error($con));
$viewplan = mysqli_fetch_array($plan_result);
$people = "select * from usernames where plan_id='$plan_id'";
$people_result = mysqli_query($con,$people);
$individual = "select * from usernames where plan_id='$plan_id'";
$individual_result = mysqli_query($con,$individual);
$amount = "select * from expenses where plan_id='$plan_id'";
$amount_result = mysqli_query($con,$amount);

$sum = 0;
while($spent = mysqli_fetch_array($amount_result)){
    $sum+= $spent['spent'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../viewplan/viewplan.css">
</head>
<body>
    <nav class="navbar navbar-inverse expand-lg">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../home/home.php" class="navbar-brand">Budget Tracker</a>
            </div>
            <div id="myNavbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../about/aboutus.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                    <li><a href="../change_password/change_password.php"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
                    <li><a href="../logout/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class=" container" style="margin:50px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Plan<span class="glyphicon glyphicon-user" style="float:right;"><?php echo $viewplan['no_of_people'];?></h3>
            </div>  
                        
        <div class="panel-body">
            <p>Initial Budget :<span class="right"> <?php echo $viewplan['budget'];?></span></p>
            <?php while($user = mysqli_fetch_array($people_result)){
                $individual_spent_name = $user['id'];
                $individual_spent_query = "select * from usernames where id='$individual_spent_name' ";
                $individual_spent_result = mysqli_query($con,$individual_spent_query); 
                $individual_spent_fetch = mysqli_fetch_array($individual_spent_result);
                $individual_id = $individual_spent_fetch['id'];
                $alone_spent_name = "select * from expenses where person_id='$individual_id' ";
                $alone_spent_result = mysqli_query($con,$alone_spent_name);
                $alone = 0;
                while ($name_money = mysqli_fetch_array($alone_spent_result)){
                    $alone+= $name_money['spent'];
                }

                ?>
                <p><?php echo $user['names']; echo ":";?><span class="right"><?php echo $alone;?></span></p> 
                <?php
                } ?>
            
            <p>Total amount spent : <span class="right"><?php echo $sum;?></span></p>
            <p>Remaining amount : <span class="right"><?php $remaining_amount =  $viewplan['budget']-$sum;
            if ($remaining_amount>0){?>
                <span style="color:green;font-weight:bold"> <?php echo $remaining_amount;?></span>
            <?php }
            ?></span></p>
            <p>Individual shares :<span class="right"><?php 
            $individual_share= $sum/$viewplan['no_of_people'];
            echo $individual_share;?></span></p>
            <?php while($name = mysqli_fetch_array($individual_result)){
                $remaining_name = $name['id'];
                $query = "select * from usernames where id = '$remaining_name'";
                $result = mysqli_query($con,$query);
                $fetch = mysqli_fetch_array($result);
                $id2 = $fetch['id'];
                $query2 = "select * from expenses where person_id='$id2'";
                $result = mysqli_query($con,$query2);
                $alone_spent = 0;
                while($a = mysqli_fetch_array($result)){
                    $alone_spent+= $a['spent'];
                }
                ?>
                <p><?php echo $name['names']; echo ":"?><span class="right"><?php echo $alone_spent - $individual_share; ?></span></p> 
            <?php } ?>
           
        </div>
        <a href="../viewplan/viewplan.php?plan_id=<?php echo $plan_id;?>"> <button class="btn btn-success btn-block">Go back</button> </a>
        
    <?php include '../include/footer.php'; ?>
</body>
</html>