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
    <link rel="stylesheet" href="create.css">
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
    <div class=" container form">
        <div class="row1">
            <form method="get" action="../plan/plan.php">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>Create New Plan </h1>
                        </div>  
                        <div class="panel-body">
                            <label for="number" class="form-label">Initial Budget:</label>
                            <input type="number" class="form-control" min="1" id="budget" name="budget"
                                placeholder="Initial Budget (Ex 4000)" 
                                required>
                        </div>
                        <div class="panel-body">
                            <label for="number" class="form-label">How many peple do you want to add in your group:</label>
                            <input type="number" class="form-control" id="people" name="people"
                                placeholder="No of people" 
                                required>
                        </div>
                        <button type="submit" class="btn" name="submit">Next</button>
                    </div>
                    <!--<input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com"> <label for="floatingInputInvalid">Invalid input</label>-->
            </form>
        </div>
    </div>
    </div>
    <?php include '../include/footer.php'; ?>
</body>
</html>
<?php
//session_start();
/*if(isset($_POST['submit'])){
    $budget = $_POST['budget'];
    $people = $_POST['people'];
    if($budget<=0){
        echo "<center><h3>Enter vaild budget</h3></center>";
    }
    else{
        header("Location:../plan/plan.php");
    }
    //$_SESSION['budget'] = $budget;
    
}*/
?>