<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
session_start();
if(!isset($_SESSION['name'])){
    header("Location:../login/login.php");

}

   $con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
   $id = $_SESSION['id'];
   $plan = "select * from plan where creator='$id'  " ;
   $plan_result = mysqli_query($con,$plan) or die(mysqli_error($con));
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
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
    <nav class="navbar expand-lg">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Budget Tracker</a>
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
    <h1>Here are your plans</h1>
    <div class="container">
        <div class="row">
    <?php while($row = mysqli_fetch_array($plan_result)){?>
        <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3><?php echo $row['title'];?><span class="glyphicon glyphicon-user" style="float:right; margin-right:20px;"><?php  echo $row['no_of_people'];?></span></h3>
            </div>  
                        
        <div class="panel-body">
            <p>Budget : <span class="right"><?php echo $row['budget'];?></span> </p>
            <p>Date : <span class="right"><?php echo $row['from_date'];echo " To "; echo $row['to_date'];?></span></p>
            <a href="../viewplan/viewplan.php?plan_id=<?php echo $row['id'];?>"><button type="submit" class="btn btn-primary ">View plans</button></a>
        </div>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
    
    <div class="plus container">
        <a href="../create/Add_new_plan.php">

        <section>
            <div class="neumorphic variation1 addpos">
                <span><strong>+</strong></span>
            </div>
        </section>
    </a>
    </div>
    
    <?php include '../include/footer.php'; ?>
</body>
</html>
