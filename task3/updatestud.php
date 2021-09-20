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

  $ids = $_GET['id'];
  $classes = $_GET['cl'];

  $showquery = "SELECT * FROM `$classes` WHERE `id`='$ids'";
  $showdata = mysqli_query($con, $showquery);
  
  if($showdata-> num_rows > 0){
    while($rows = $showdata-> fetch_assoc()){
     $studname = $rows['name'];
     $studfn = $rows['fathername'];
     $studmob = $rows['mobile'];
     $studemail = $rows['email'];

    }
  }
  
  // $extra = mysqli_fetch_array($showdata);
 

    if(isset($_POST['btn'])){
        $studname = $_POST['studname'];
        $studfn = $_POST['studfn'];
        $studmob = $_POST['studmob'];
        $studemail = $_POST['studemail'];
     
       $update_query = "UPDATE `$classes` SET  `name`='$studname', `fathername`='$studfn', `mobile`='$studmob', `email`='$studemail', `class`='$classes'
                        WHERE `id`='$ids'";

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
       header('location: showstud.php');
    }       
   
?>  
      
      <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST" class=formstyle>
        <h2 formstyle3 style="text-decoration-line: underline;">Update STUDENT Information</h2><br><br>
        <div class="formstyle2">
        <input type="text" value="<?php echo $studname; ?>" name="studname"><br><br>
        <input type="text" value="<?php echo $studfn; ?>" name="studfn"><br><br>
        <input type="text" value="<?php echo $studmob; ?>"name="studmob"><br><br>
        <input type="email" value="<?php echo $studemail; ?>" name="studemail"><br><br>
        <input type="submit" value="Update" name="btn" class="btn">
        </div>
    </form>
</body>
</html>