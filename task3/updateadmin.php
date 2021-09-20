<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

  $info = $_SESSION['email'];

  $showquery = "SELECT * FROM `admin` WHERE `email`='$info'";
  $showdata = mysqli_query($con, $showquery);
  
  if($showdata-> num_rows > 0){
    while($rows = $showdata-> fetch_assoc()){
     $adminname = $rows['name'];
     $adminemail = $rows['email'];
     $adminmob = $rows['mobile'];
     $dboldpass = $rows['password'];
    }
  }
  
  // $extra = mysqli_fetch_array($showdata);
 

    if(isset($_POST['btn'])){
        $adminname = $_POST['adminname'];
        $adminemail = $_POST['adminemail'];
        $adminmob = $_POST['adminmob'];
        $oldpass = $_POST['oldpass'];
        $adminpass = $_POST['adminpass'];
        $adminrepass =$_POST['adminrepass'];

        // securing the password
        $spass = password_hash($adminpass, PASSWORD_BCRYPT);

        $pass_decode = password_verify($oldpass, $dboldpass);

        if($pass_decode){
              if($adminpass == $adminrepass){
               
               $update_query = "UPDATE `admin` SET  `name`='$adminname', `email`='$adminemail', `mobile`='$adminmob', `password`='$spass'
                WHERE `email`='$adminemail'";

                $result = mysqli_query($con, $update_query);

                if($result){
                ?>
                  <script>
                     alert("Data Updated Properly");
                 </script>
                 <?php 
                }
               
                else{
                  ?>
                  <script>
                    alert("Data Cannot be Updated");
                  </script>
                  <?php
                }
               header('location: admin.php'); 
              }
             else{
              ?>
               <script>
                 alert("Both Password must be same");
               </script>   
             <?php
              }
            } 
        else{
          ?>
          <script>
             alert("Password Incorrect");
          </script> 
          <?php
        }
      }    
   
?>  
      
      <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST" class="formstyle">
        <h2 class="formstyle3">Update ADMIN Information</h2><br><br>
        <div class="formstyle2">
        <label>Name:</label><br>
        <input type="text" value="<?php echo $adminname; ?>" name="adminname"><br><br>
        <label>Email:</label><br>
        <input type="email" value="<?php echo $adminemail; ?>" name="adminemail"><br><br>
        <label>Mobile:</label><br>
        <input type="text" value="<?php echo $adminmob; ?>"name="adminmob"><br><br>
        <label>Current Password:</label><br>
        <input type="password" placeholder="current password" name="oldpass"><br><br>
        <label>New Password:</label><br>
        <input type="password" placeholder="new password" name="adminpass"><br><br>
        <label>Retype New password:</label><br>
        <input type="password" placeholder="new password again" name="adminrepass"><br><br>
        <center><input class="btn"type="submit" value="Update" name="btn"></center>
        </div>
      </form>
</body>
</html>  