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
    <title>Add Admin</title>
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
    <!-- Latest compiled and minified JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

       if(isset($_POST['btn'])){
           $adminpass = $_POST['adminpass'];
           $adminrepass = $_POST['adminrepass'];
           $adminname = $_POST['adminname'];
           $adminemail = $_POST['adminemail'];
           $adminmob = $_POST['adminmob'];

           $emailquery = "select * from  admin where email='$adminemail' ";
           $query = mysqli_query($con, $emailquery);
   
           $emailcount = mysqli_num_rows($query);
   
           if($emailcount > 0){
             ?>
                <script>
                    alert("Account already exists");
                </script>
             <?php
           }
           else{
               if($adminpass === $adminrepass){
                   $str_pass = password_hash($adminpass, PASSWORD_BCRYPT);
                   $insertquery = "insert into admin (name, email, mobile, password) values('$adminname', '$adminemail', '$adminmob', '$str_pass')";
                   $iquery = mysqli_query($con, $insertquery);
  
                  if($iquery){
                      ?>
                      <script>
                          alert("Registered Successfull");
                      </script>
                      <?php
                  } 
                  else{
                      ?>
                      <script>
                          alert("Not Registered");
                      </script>
                      <?php
                  }
                }
              
               
                else{
                   ?>
                    <script>
                        alert("passwords are not same");
                    </script>
               
                   <?php
                }
            }
        } 

    ?>
    
    <form action="" method="POST" class="formstyle">
        <h2 class="formstyle3">CREATE ADMIN</h2><br><br>
        <input type="text" placeholder="Enter name" name="adminname"><br><br>
        <input type="email" placeholder="Enter email" name="adminemail"><br><br>
        <input type="text" placeholder="Enter mobile no" name="adminmob"><br><br>
        <input type="password" placeholder="Enter password" name="adminpass"><br><br>
        <input type="password" placeholder="Reenter password" name="adminrepass"><br><br>
        <input type="submit" value="create" name="btn" class="btn">
    </form>

</body>
</html>