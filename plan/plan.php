<?php
session_start();?>
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
    <link rel="stylesheet" href="plan.css">
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
                    <a href="#" class="navbar-brand">Plan</a>
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
            <form method="post" action="../plan/add_plan_script.php">
                <div class="panel-group">
                    <div class="panel panel-primary">
                       
                        <div class="panel-body">
                            <label for="title" class="form-label">Title:</label>
                            
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title (Ex: Trip to Goa)"
                                required>
                        </div>
                        <div class="panel-body col-sm-6">
                            <label for="from" class="form-label">From:</label>
                            <input type="date" class="form-control" id="from" name="from"
                        
                                required>
                        </div>
                        <div class="panel-body col-sm-6">
                            <label for="to" class="form-label">To:</label>
                            <input type="date" class="form-control col-md-6" id="to" name="to"
                        
                                required>
                        </div>
                        <div class="panel-body col-sm-8">
                            <label for="budget" class="form-label">Initial Budget:</label>
                            <input type="number" class="form-control" id="budget" name="budget" readonly
                             value = "<?php echo $_GET['budget']; ?>"   >
                        </div>
                        <div class="panel-body col-sm-4">
                            <label for="people" class="form-label">No of people:</label>
                            <input type="number" class="form-control col-md-6" id="people" name="people" readonly
                            value = "<?php echo $_GET['people']; ?>" 
                        
                                required>
                        </div>

                        <?php for ($i=1;$i<=$_GET['people'];$i++) {?>
                        <div class="panel-body">
                            <label for="name" class="form-label">Person <?php echo $i;?> :</label>
                            <input type="name" class="form-control" id="name" name=<?php echo "name".$i;?>
                                placeholder="Enter your Name"  required>
                                
                            
                        </div>
                        
                        
                        <?php } ?>
                        <button type="submit" class="btn my-2" name="submit">Submit</button>
                    </div>

                    <!--<input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com"> <label for="floatingInputInvalid">Invalid input</label>-->
            </form>
        </div>
    </div>
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
