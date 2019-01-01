<?php
  session_start(); 
   $connect = mysqli_connect("localhost", "root", "", "demo");
   if(isset($_POST["insert"]))  
 {
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name) VALUES ('$file')"; 
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Update Sucessful")</script>';  
      }  
 } 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
      hr{
        border: 2px solid black;
        width: 80%;
        margin-top:4%;
        margin-bottom:4%
      }
      img{
        height:60%;
        width:80%;
        border-radius:50%;
        margin-bottom:10%;
      }
      .footer{
        background-color: #0066ff;
        width:100%;
        padding:0;
        margin:0;
      }
    </style>
  <head>
<body>
   
  <div class="jumbotron text-center">
   
    <h1>Header</h1>
    <p>Description of your brand</p>
   
    <?php
    if(isset($_SESSION['username'])){
      echo "you are logged in as", $_SESSION['username'];
      echo '<a href="logout.php">Logout</a>';
    }else{
      echo '<a href="login.php">Login</a>';
    }
    ?>
    
  </div>
   
      <?php
    if(isset($_SESSION['username'])){
      echo'<hr>
          <form method="post" enctype="multipart/form-data">  
             <input type="file" name="image" id="image" /><br>  
             <br />  
             <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
           </form>';
    }else{
      echo '';
    }
    ?>

   <?php  
   //this code will loop for every image uploaded to the database
                $query = "SELECT * FROM tbl_images ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '<hr>
                     <div class="container">
                             <div class="row">
                               <div class="col-sm-4 text-center">
                                 <h2>title<h2>
                                 <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'"  />
                               </div>
                               <div class="col-sm-8">
                                 <h3>LOCATION:</h3>
                                    <p class="text-center"></p><br><br>
                                <h4>Rating:</h4>
                              </div>
                           </div>
                        </div>
                           
                     ';  
                }  
                ?> 
  <div class="container footer">
    <div class="row">
      <div class="col-sm-9">
      <h5><u>Disclaimer</u></h5>
      <p class="text-center">info about your company </p>
      </div>
      <div class="col-sm-3">
      <p>This website was created and is maintained by you<br> 1234567890<br>youremail@email.com </p>
      </dvi>
    </div>
  </div>

</body>
</html>
