<?php
//include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
     
<head>
  <title>MOBILE MECHANIC</title>
    <link rel="icon" href="images/icon1.png" type="image/gif">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>-->
 <style>
     #place{background-color: #fff0;border:2px solid #ffffff2e;}
     #place::placeholder{color: #ffffff98;}
    body {
  background-image: url('login.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
        color:#ffffff98;
}
    </style>
</head>
<body>
<div>
  <div class="col-md-6 pull-right" style="padding-top:20%;">
   <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">UserName</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="place" placeholder="Enter your username" name="uname" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-6">          
        <input type="password" class="form-control" id="place" placeholder="Enter your password" name="pwd" required>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-6">
        <input type="submit" name="sb" class="btn btn-success" value="Login">&nbsp;&nbsp;&nbsp;
          Click Me For Register: <a href="reg.php">Click Me</a>
      </div>
    </div>
  </form>
  </div>
</div>
</body>
</html>
 
<?php

if(isset($_POST['sb']))
{
    
   
    $name=$_POST['uname'];
    $_SESSION['ses']=$name;
    $pass=$_POST['pwd'];
    
    $query="select * from registration where username='".$name."' && password='".$pass."'";
    $res=mysqli_query($con,$query);
    $fet=mysqli_fetch_array($res);
    
    if($fet['username']==$name && $fet['password']==$pass && $fet['category']=='Admin')
    {
        header('location:admin/');
    }
    elseif($fet['username']==$name && $fet['password']==$pass && $fet['category']=='Mechanic')
    {
        header('location:mechanic/');
    }
    elseif($fet['username']==$name && $fet['password']==$pass && $fet['category']=='User')
    {
        header('location:user/');
    }
    else
    {
        echo '<script>alert("Try Again")</script>';
    }
}
?>