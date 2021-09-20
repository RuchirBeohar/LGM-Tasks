<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD STUDENT</title>
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
 <!-- Latest compiled and minified JavaScript -->

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!-- for font awesome -->

 <script src="https://use.fontawesome.com/d7b7203a44.js"></script>
</head>
<body>
    <?php

       include 'connection.php';

       if(isset($_POST['btn'])){
           $studname = $_POST['studname'];
           $studfn = $_POST['studfn'];
           $studmob = $_POST['studmob'];
           $studemail = $_POST['studemail'];
           $studclass =  $_POST['studclass'];  

           
           $emailquery = "select name, fathername, mobile, email, class from `$studclass` where email='$studemail' ";
           $query = mysqli_query($con, $emailquery);
   
           $emailcount = mysqli_num_rows($query);
   
           if($emailcount > 0){
             ?>
                <script>
                    alert("Student already exists");
                </script>
             <?php
           }
           else{
                  
                  $insertquery = "insert into `$studclass` (name, fathername, mobile, email, class) values('$studname', '$studfn', '$studmob', '$studemail', '$studclass')";
                  $iquery = mysqli_query($con, $insertquery);
  
                  if($iquery){
                      ?>
                      <script>
                          alert("Student Added Successfull");
                      </script>
                      <?php
                       header('location: showstud.php');
                  } 
                  else{
                      ?>
                      <script>
                          alert("Student Not Added");
                      </script>
                      <?php
                  }
                }
        } 

    ?>
    
    <form action="" method="POST" class="formstyle">
        <h2 class="formstyle3">ADD STUDENT</h2><br><br>
        <input type="text" placeholder="Enter name" name="studname"><br><br>
        <input type="text" placeholder="Enter father name" name="studfn"><br><br>
        <input type="text" placeholder="Enter mobile no" name="studmob"><br><br>
        <input type="text" placeholder="Enter Email" name="studemail"><br><br>
        <input type="text" placeholder="class" name="studclass"><br><br>
        <input type="submit" value="ADD" name="btn" class="btn">
    </form>

</body>
</html>