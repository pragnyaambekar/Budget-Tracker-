<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
session_start();
if(!isset($_SESSION['name'])){
    header("Location:../login/login.php");

}
$plan_id = $_GET['plan_id'];

$plan = "select * from plan where id='$plan_id'";
$plan_result = mysqli_query($con,$plan) or die(mysqli_error($con));
$viewplan = mysqli_fetch_array($plan_result);
$expense = "select * from expenses where plan_id='$plan_id'";
$expense_result = mysqli_query($con,$expense) or die(mysqli_error($con));
$expense_rows = mysqli_num_rows($expense_result);
$people = "select * from usernames where plan_id='$plan_id'";
$people_result = mysqli_query($con,$people);

/*while($user = mysqli_fetch_array($people_result)){
    echo $user['id'];
    echo $user['names'];
}*/

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
    <link rel="stylesheet" href="viewplan.css">
</head>
<body>
    <nav class="navbar  ">
        <div class="container-fluid">
            <div class="navbar-header ">
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
    <div class="one  container">
    <div class="panel-group">
        <div class="panel panelbg">
            <div class="panel-heading">
                <h3><?php echo $viewplan['title']; ?><span class="glyphicon glyphicon-user" style="float:right;"><?php echo $viewplan['no_of_people'];?></span></h3>
            </div>  
                        
        <div class="panel-body">
            <p>Budget : <span class="right"><?php echo $viewplan['budget'];?></span> </p>
            <p>Remaining Amount :<span class="right"> <?php echo $viewplan['budget']-$viewplan['spent'];?></span></p>
            <p>Date : <span class="right"> <?php echo $viewplan['from_date'];echo " To ";echo $viewplan['to_date'];?><span></p>
           
        </div>
        
    </div>
    <div>
        <a href="../expense_distribution/expense_distribution.php?plan_id=<?php echo $plan_id;?>"><button class="btn btnclr ">Expense Distribution</button></a>
    </div><br>
    <div class="container"></div>
    <?php 
    if($expense_rows>0){?>
        <h2>Your expenses</h2>
    <?php while($fetch = mysqli_fetch_array($expense_result)){?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="panel panelbg ">
            <div class="panel-heading">
                <h3><?php echo $fetch['title']?></h3>
            </div>  
                        
        <div class="panel-body">
            <p>Amount :<span class="right"> <?php echo $fetch['spent'];?></span></p>
            <p>Paid by : <span class="right">
            <?php $person_id= $fetch['person_id'];
                $name = "select * from usernames where id = '$person_id'";
                $name_result = mysqli_query($con,$name);
                $name_fetched = mysqli_fetch_array($name_result);
                echo $name_fetched['names'];
            ?></span></p>
            <p>Paid on :<span class="right"> <?php echo $fetch['date'];?></span></p>
            <?php if ($fetch['img'] != NULL) {?>
                    <div class="panel-footer">
                    <a href="../bills/<?php echo $fetch['img']?>">View Bill</a>
                    </div>
            <?php } else { ?>
                    <div class="panel-footer">
                    <a href="#">You don't have a bill</a>
                    </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <?php } 
    }?>
    
    </div>
    </div>
    <div class="one col-xs-12 container">
    <div class="panel-group">
            
    <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="panel-heading">
                    <h1>Add expense </h1>
                    </div>
                    <form method="post" action="expenses.php?plan_id=<?php echo $plan_id;?>" enctype="multipart/form-data">
                    <div class="formclr">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text"  class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date"  class="form-control" id="date" name="date" required> 
                        </div>
                        <div class="form-group">
                            <label for="spent">Amount Spent</label>
                            <input type="number"  class="form-control" id="spent" name="spent" required>
                        </div>
                        <div class="form-group">
                            <label for="choose">Choose:</label>
                            <select name="person" id="person">
                                <?php while ($person = mysqli_fetch_array($people_result)){?>
                                    <option value="<?php echo $person['id'];?>"> <?php echo $person['names'];?></option>
                                    <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="img">Upload bill:</label>
                            <input type="file" class="simple_class" name="uploadedimage">
                        </div>
                        <div class="form-group">
                           <input type="submit" value="submit" class="btn btn-success btn-block" name="submit">
                        </div>
                                </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    
        </div>
    <footer>
    <div class="foot">
        <center>
            
            <p >Copyright &copy; BudgetTracker. All Rights Reserved | Contact Us: +91 90000 00000</p>
        </center>
        
    </div>
    </footer>
</body>
</html>
