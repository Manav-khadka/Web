<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
 crossorigin="anonymous"></script>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>log in</title>
    <link rel="stylesheet" href="all.css" />
</head>
<?php
    include 'dbase.php'; 
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($con ,"select * from sup where username = '$username' " );

        $username_count = mysqli_num_rows($query);
        if($username_count)
        {
            $username_pass = mysqli_fetch_assoc($query);
            
            $db_pass = $username_pass['password'];
            
            $pass_decode = password_verify($password , $db_pass);
            
            if($pass_decode)
            {
                echo"login";
                ?>
                <script>
                 location.replace("onlog.html");
                </script>
                <?php
            }   
            else
                {
            
                echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password Innconnect!</strong> Please retry
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button></div>');
                }

        }
        else
        {
            echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username Innconnect!</strong> Please retry
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button></div>');
        }
    }
    
?>
<body>
    <div class="heading">
        <h1 >Mathematics</h1>
    </div>
    <nav>
     
        <a href="home.html" >Home</a>
        <a href="login.php" target="_blank">login/signup</a>
    
    </nav>
    <div class="form">
        <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?> " method="POST">
        <p id="title">Username : <input type="text" name="username" id="username" placeholder="Username" required ></p>
        <p id="title">password : <input type="password" name="password" id="password" placeholder="password" required></p>
    <button  type="submit" name="submit">log in</button>
    </form>
    <form onsubmit="return validate()" action="signin.php" >
    <button onclick="validate()" type="submit">signup</button>
   

</form>
</div>
</body>
</body>
</html>