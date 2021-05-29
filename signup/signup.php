<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
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
    
    <link rel="stylesheet" href="signup.css">
    <title>Signup</title>
</head>

<body >
    
<?php include '../include/header.php';?>


    <div class=" container form">
        <div class="row1">
            <form method="post" action="../signup/signup.php">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1> Sign up </h1>
                        </div>
                        <div class="panel-body">
                            <label for="name" class="form-label">Name:</label>
                            
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                                required>
                        </div>
                        <div class="panel-body">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                required>
                        </div>

                        <div class="panel-body">
                            <label for="phone" class="form-label">Phone number:</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" required>
                        </div>
                        <div class="panel-body">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password" pattern=".{6,}" required>
                        </div>
                        <button type="submit" class="btn" name="submit">Signup</button>
                        <center><h5>Have an account? <a href="../login/login.php">Log in</a> </h5></center>
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
if(isset($_POST['submit'])){
$name =mysqli_real_escape_string($con,$_POST['name']);
$email =mysqli_real_escape_string($con,$_POST['email']);
$phone =mysqli_real_escape_string($con,$_POST['phone']);
$password =md5(mysqli_real_escape_string($con,$_POST['password']));

$email_check = "select * from signup where email ='$email' ";
$email_result = mysqli_query($con,$email_check);
$email_count = mysqli_num_rows($email_result);
if($email_count>0){
    echo"<center><h4>Email already exists try login <button><a href='../login/login.php'>Log in</a></button><h4></center>";
}
else{
    $insert_query ="insert into signup (name, email, phone, password) values ('$name', '$email', '$phone', '$password')";
    $insert_query_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
    echo"<center><h4>You have successfully registered,try login <button><a href='../login/login.php'>Log in</a></button><h4></center>";
    
    
    
}

}

?>