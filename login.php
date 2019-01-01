<?php

if(isset($_POST['login'])){ //to check and extract info sent through POST method from form
	require 'connect.php';  // for database connection
	$username =$_POST['username']; //assign the data sent as username to the variable $username
	$password =$_POST['password']; //assign the data sent as password to the  variable $password
	$result = mysqli_query($con, 'SELECT * FROM users WHERE username="'.$username.'" AND password ="'.$password.'"');
	if(mysqli_num_rows($result) ==1){
		session_start(); // start a session to remember the login process
		$_SESSION['username'] = $username;
		header('Location:index.php'); // redirect to index.php
	}else{
		echo 'Account invalid';
	}
}
?>
<html>
  <head>
    <title>login</title>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
     <style>
        body{
            width: 100%;
            height: 100%;
        }
        .container{
            display: flex;
            height: 100vh;
            align-content: center;
            align-items: center;
        }
        .glyphicon{
            font-size: 80px;
            color: #2aabd2;
        }
      </style>
  </head>
<body>
  <!--
    <form method="POST">
    <h1>Enter your details<h1>
      Username:<br>
      <input type="text" name="username"><br><br>
      Password:<br>
      <input type="password" name="password"><br><br>
      <input type="submit" name="login" value="Login">
    </form>-->
      <div class="container">
        <div class="col-sm-4 col-sm-offset-4">
            <form role="form" method="post">
                <div class="form-group">
                    <p class="text-center">
                        <span class="glyphicon glyphicon-user"></span>
                    </p>
                    <label for="username">Username:</label>
                    <input type="text"  name="username" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" required class="form-control">
                </div>

                <input type="submit" class="btn btn-danger" value="login" >Sign in here</input>
            </form>

        </div>
    </div>
</body>
</html>