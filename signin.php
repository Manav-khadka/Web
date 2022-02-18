<!DOCTYPE html>
<html lang="en">
<head>
    <title>sign in</title>
    <link rel="stylesheet" href="all.css" />
    <style>
    body{
        background-image: url(OIP1.jpg)
    }
    
        .f{
            background-color: rgb(167, 211, 204);
            text-align: center;
            padding: 3vw;
            float: center;
            margin: 2px;
            margin-top: 2px;
            margin-bottom: 2PX;
            margin-left: 13vw;
            margin-right: 13vw;
        }
        #title{
            font-size: 2vw;
        }
    </style>
    <script src="js.js"  type="text/javascript" ></script>
</head>
<body>
<?php
    include 'dbase.php'; 
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $username =mysqli_real_escape_string($con,  $_POST['username']);
        $date =mysqli_real_escape_string($con,  $_POST['date']);
        $email =mysqli_real_escape_string($con,  $_POST['email']);
        $number = mysqli_real_escape_string($con, $_POST['number']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass= password_hash($password , PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword , PASSWORD_BCRYPT);
        
        $query = mysqli_query($con , "select * from sup where email = '$email' ");
        $emailcount = mysqli_num_rows($query);
        
        if($emailcount>1){
          echo"email already exist";
        }
        else{
            if($password == $cpassword){
    
        $insertquery =  "INSERT INTO sup ( name, username, date, email, number, gender, password, cpassword) 
        VALUES ( '$name', '$username', '$date' , '$email', '$number' , '$gender', '$pass', '$cpass')" ;
         $iquery =mysqli_query($con , $insertquery);
         if($iquery){
             ?>
             <script>
                 alert("sucess");
              </script>
              <?php
         }
         else{
             ?> 
             <script>
                 alert("no");
                 </script>
                 <?php
         
         }
        }
        else{
            ?> 
            <script>
                alert("password not match ");
                </script>
                <?php
           
        }
    }
}

?>
   
    <div class="heading">
        <h1 >Mathematics</h1>
    </div>
    <nav>
        <a href="home.html" >Home</a>
      
      <a href="login.php" target="_blank">login/signup</a>
      
        
    </nav>
    <div class="f">
    <form action="" method="POST">
        <fieldset>
            <legend>basic_info</legend>
        <p id="title">Name : <input type="text" name="name" id="name" placeholder="name" required></p>
        <p id="title">Username : <input type="text" name="username" id="username" placeholder="Username" required ></p>
        <p id="title">Date Of Birth :  <input type="date" name="date" required ></p>
        <p id="title">Email : <input type="email" id="email" name="email" placeholder="Email" required></p>
        <p id="title">Mobile Number : <input type="number" name="number" id="number" placeholder="Mobile Number" required></p>
        </fieldset>
        <fieldset>
            <legend>gender</legend>
        <p id="title">
            Male<input type="radio" name="gender"  >
            Female<input type="radio" name="gender" >
            Transgender<input type="radio" name="gender" >
        </p>
        </fieldset>
        <fieldset>
            <legend>password</legend>
        <p id="title">password : <input type="password" name="password" id="password" placeholder="password" required></p>
        <p id="title">confrim password : <input type="password" name="cpassword" id="cpassword" placeholder="Confrim password" required></p>  
        </fieldset>  
        <button type="submit" name="submit" class="btn">sign in</button>
    </form>
    </div> 
</body>
</html>