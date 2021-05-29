<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
session_start();
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
    <title>Change password</title>
    <link rel="stylesheet" href="change.css">
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
                        <li><a href="../home/home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="../logout/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class=" container form">
        <div class="row1">
            <form method="post" action="change_password.php">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>Change Password</h3>
                        </div>  
                        
                        <div class="panel-body">
                            <label for="password" class="form-label">Old password:</label>
                            <input type="password" class="form-control" id="password" name="oldp"
                                placeholder="Enter your old password" pattern=".{6,}"
                                required>
                        </div>
                        <div class="panel-body">
                            <label for="password" class="form-label">New password:</label>
                            <input type="password" class="form-control" id="password" name="newp"
                                placeholder="Enter your new password" pattern=".{6,}" required>
                        </div>
                        <div class="panel-body">
                            <label for="password" class="form-label">Confirm password:</label>
                            <input type="password" class="form-control" id="password" name="confirmp"
                                placeholder="Confirm your password" pattern=".{6,}" required>
                        </div>
                        <button type="submit" class="btn" name="submit">Change</button>
                       
                        
                    <!--<input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com"> <label for="floatingInputInvalid">Invalid input</label>-->
            </form>
        </div>
    </div>
    </div>
    <?php include '../include/footer.php'; ?>
</body>
</html>
<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
if (isset($_POST['oldp'])) {
    $oldp = md5(mysqli_escape_string($con,$_POST['oldp']));
   
}

if (isset($_POST['newp'])) {
    $newp = md5(mysqli_escape_string($con,$_POST['newp']));
 
}

if (isset($_POST['confirmp'])) {
    $confirmp = md5(mysqli_escape_string($con,$_POST['confirmp']));

}    

    
    if(isset($_POST['submit'])){
        $oldpwd =  $_SESSION['password'];
        if($oldpwd==$oldp){
            if($newp==$confirmp){
                $name = $_SESSION['name'];
                $change = "update signup set password='$newp' where name = '$name'";
                $change_result = mysqli_query($con,$change) or die(mysqli_error($con));
                echo"<center><h4>Password successfully changed</h4></center>";
                $oldpwd = $oldp;
                echo"<center><h4><button><a href='../home/home.php'>Back</a></button><h4><center>";
                
                
            }
            else{
                echo"<center><h4>The confirmation password doesnt match</h4></center>";
            }
        }
        else{
            echo"<center><h4>Entered wrong old password</h4></center>";
            
        }
    }
?>