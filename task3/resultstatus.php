<!-- we not use this -->
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Result status</title>
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

       if(isset($_POST['btn1'])){
           $_SESSION['status'] = 'YES';
           ?>
             <script>
                 alert("status Set to yes")
             </script>    
           <?php
       }

       if(isset($_POST['btn2'])){
        $_SESSION['status'] = 'NO';

          ?>
             <script>
                 alert("status Set to No")
             </script>    
           <?php
    }

    ?>       
    <form action="" method="POST" style="text-align: center; margin-top:100px;">
        <h1> Do You Want To Release The RESULT?</h1>
        <input type="submit" name="btn1" class="btn" value="YES" style="margin-top: 50px; margin-right:20px">
        <input type="submit" name="btn2" class="btn" value="NO" style="margin-top: 50px;">
    </form>
</body>
</html>