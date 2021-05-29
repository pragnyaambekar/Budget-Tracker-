<?php
$con = mysqli_connect("localhost","root","","expense") or die(mysqli_error($con));
session_start();
if(isset($_SESSION['name'])){
    header("Location:../home/home.php");

}
?>


<?php include '../include/basic.php'; ?>
<head><title>Login</title></head>
<body>

    <?php include '../include/header.php'?>
    <div class=" container form">
        <div class="row1">
            <form method="post" action="../login/login.php">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>Login </h1>
                        </div>  
                        <div class="panel-body">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                required>
                        </div>
                        <div class="panel-body">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password" pattern=".{6,}" required>
                        </div>
                        <button type="submit" class="btn" name="submit">Login</button>
                        <center><h5>Dont have an account? <a href="../signup/signup.php">Signup here</a> </h5></center>
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
    $email =mysqli_real_escape_string($con,$_POST['email']);
    $password =md5(mysqli_real_escape_string($con,$_POST['password']));
    $email_password_check = "select * from signup where email='$email' and password = '$password'";
    $email_password_result = mysqli_query($con,$email_password_check);
    if(mysqli_num_rows($email_password_result)){
        $pass = mysqli_fetch_array($email_password_result);
        if($pass['password']==$password){
            $user = "select id,name,email,password from signup where email='$email'";
            $user_result = mysqli_query($con,$user);
            $user_fetch = mysqli_fetch_array($user_result) or die(mysqli_error($con));
            $_SESSION['name'] = $user_fetch['name'];
            $_SESSION['password'] = $user_fetch['password'];
            $_SESSION['email'] = $user_fetch['email'];
            $_SESSION['id'] = $user_fetch['id'];
            header("location:../home/home.php");
        }
        else{
            echo"<center><h4>Incorrect password</h4></center>";
        }
    }
    else{
        echo"<center><h4>Looks like you have not registred  <button><a href='../signup/signup.php'>Signup here</a></button><h4><center>";
    }
    //fetching name for home page
    


}

?>
