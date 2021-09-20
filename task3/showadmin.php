<?php
   session_start();
   if(!isset($_SESSION['email'])){
       header('location: front.php');
   }
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Info</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
    <!-- Latest compiled and minified JavaScript -->

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- for font awesome -->

    <script src="https://use.fontawesome.com/d7b7203a44.js"></script>
</head>
<body>
       <div class="nav">
           <img src="https://cdn.shopify.com/s/files/1/0280/2745/3509/files/IVY_LOGO_1_a7a1cf80-68ab-4a50-953b-1d6c3b61d134.png?v=1591729833" alt=""
           id="logo">
           <a href="admin.php" id="home">HOME</a>
           <a href="showadmin.php" id="profile">PROFILE</a>
           <a href="insertadmin.php" id="newadmin">NEW ADMIN +</a>
           <a href="showstud.php" id="students">STUDENTS</a>
           <a href="showresult.php" id="result">RESULT</a>
           <p id="logout"><a href="logout.php">LOGOUT</a></p>
        </div>

    <?php 
      include 'connection.php';
      $info = $_SESSION['email'];

     $showquery = "SELECT * FROM `admin` WHERE `email`='$info'";
     $showdata = mysqli_query($con, $showquery);

     if($showdata-> num_rows > 0){
       while($rows = $showdata-> fetch_assoc()){
           $adminname = $rows['name'];
           $adminemail = $rows['email'];
           $adminmob = $rows['mobile'];
       }
    }
    ?>   
    <div class="personalinfo">
      <div class="ic" style="font-size: 50px;">  
       <i class="fa fa-user fas-12x"></i>
      </div> 
       <h2 class="ic" style="text-decoration-line:underline">PERSONAL INFO</h2>
       <br><br>
       <h3>Name:<?php echo"   ". $adminname ?></h3><br>
       <h3>Email:<?php echo"   ".$adminemail ?></h3><br>
       <h3>Mobile:<?php echo"   ". $adminmob ?></h3><br>
       <button class = "addingb" onclick="document.location='admin.php'" style="background-color: green; color:white">OK</button>
       <button class="addingb" onclick="document.location='updateadmin.php'">UPDATE</button>
       

    </div> 
</body>
</html>