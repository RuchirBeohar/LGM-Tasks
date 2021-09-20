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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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

   <div class="search">
       <form action="" method="POST">
           <label>Select Class</label>
             <select name="inc">
                 <option value="9">class 9</option>
                 <option value="11">class 11</option>
             </select>
           <br><br>
           <input type="submit" name="sub" value="search">
       </form>
    </div><br><br><br>

   <?php

      include 'connection.php';

      if(isset($_POST['sub'])){
          $class = $_POST['inc'];

          $select_query = "select * from `$class`";
          $query = mysqli_query($con, $select_query);
         ?>
            <div class="linkto">
              <p><a href="insertstud.php" id="on">NEW +</a></p>
            </div>

            <table class="table">
               <thead class="thead-dark">
                <tr>
                 <th>Roll No</th>
                 <th>Name</th>
                 <th>Father Name</th>
                 <th>mobile</th>
                 <th>Email</th>
                 <th colspan="2">Operations</th>
              </tr>
              </thead>
             <tbody> 
           
           <?php
          while($res = mysqli_fetch_array($query)){
            ?>
                <tr>
                <td><?php echo $res['id'];?></td>
                <td><?php echo $res['name'];?></td>
                <td><?php echo $res['fathername'];?></td>
                <td><?php echo $res['mobile'];?></td>
                <td><?php echo $res['email'];?></td>
                <td><a href="updatestud.php?id=<?php  echo $res['id'];?>&cl=<?php echo $class;?>" data-toggle="tooltip" data-placement="bottom" title="UPDATE">
                <i class="fa fa-edit" aria-hidden="true"></i></a></td>
               <td><a href="deletestud.php?id=<?php  echo $res['id'];?>&cl=<?php echo $class;?>" data-toggle="tooltip" data-placement="bottom" title="DELETE">
               <i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
           </tbody>  
         <?php  
        }
        ?>
        </table>
        <?php
      }       

   ?>

  
</body>
</html>