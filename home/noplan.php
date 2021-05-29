<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
session_start();
if(!isset($_SESSION['name'])){
    header("Location:../login/login.php");

}
$plan_no = 0;
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
<nav class="navbar navbar-inverse expand-lg">
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
        
            
        <center><h3>  Hello <?php echo $_SESSION['name'] ;?> looks like you dont have any plans</h3></center>
        <div class="container new">
            <a href="../create/Add_new_plan.php"><span class="glyphicon glyphicon-plus-sign"></span> Create New Plan</a>

        </div>
          

        <footer>
    <div class="container-fluid footerstyle">
        <div>
            <center>
               <p class="filler">Copyright &copy; BudgetTracker. All Rights Reserved | Contact Us: +91 90000 00000</p>
            </center>
        </div>
    </div>
</footer>
</body>
</html>