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
          $st = 'pass';

          $select_query = "select * from `$class`";
          $query = mysqli_query($con, $select_query);
          $total = mysqli_num_rows($query);

          $showquery = "SELECT * FROM `$class` WHERE `status`='$st'";
          $showdata = mysqli_query($con, $showquery);
          $nums = mysqli_num_rows($showdata);
         ?>
         <div class="setting">
           <h4 id="txt">SUCCESS RATE:</h4>
           <div class="progress" id="prg">
               <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $nums/$total * 100 ?>%" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $nums/$total *100 +4?>%">
               <?php
                  $y = (int)$nums/$total * 100;
                  echo (int)$y . "%";
               ?>
               </div>
            </div>
         </div>  

            <table class="table">
               <thead class="thead-dark">
                <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>English</th>
                 <th>Hindi</th>
                 <th>Maths</th>
                 <th>Physics</th>
                 <th>chemistry</th>
                 <th>Status</th>
                 <th>Operations</th>
              </tr>
              </thead>
             <tbody> 
           
           <?php
          while($res = mysqli_fetch_array($query)){
            ?>
                <tr>
                <td class="color"><?php echo $res['name'];?></td>
                <td class="color"><?php echo $res['email'];?></td>
                <td class="color"><?php 
                         if($res['engmarks'] < 33){
                             ?>
                             <p class="fail"><?php echo $res['engmarks']; ?></p>
                             <?php
                         }
                         else{
                             echo $res['engmarks'];
                         }
                ?></td>
               <td class="color"><?php 
                         if($res['hinmarks'] < 33){
                             ?>
                             <p class="fail"><?php echo $res['hinmarks']; ?></p>
                             <?php
                         }
                         else{
                             echo $res['hinmarks'];
                         }
                ?></td>
                <td class="color"><?php 
                         if($res['matmarks'] < 33){
                             ?>
                             <p class="fail"><?php echo $res['matmarks']; ?></p>
                             <?php
                         }
                         else{
                             echo $res['matmarks'];
                         }
                ?></td>
                <td class="color"><?php 
                         if($res['phymarks'] < 33){
                             ?>
                             <p class="fail"><?php echo $res['phymarks']; ?></p>
                             <?php
                         }
                         else{
                             echo $res['phymarks'];
                         }
                ?></td>
                <td class="color"><?php 
                         if($res['chemmarks'] < 33){
                             ?>
                             <p class="fail"><?php echo $res['chemmarks']; ?></p>
                             <?php
                         }
                         else{
                             echo $res['chemmarks'];
                         }
                ?></td>

                <td>
                    <?php
                       if($res['engmarks']>=33 && $res['hinmarks']>=33 && $res['matmarks']>=33 && $res['phymarks']>=33 && $res['chemmarks']>=33){
                           ?>
                              <p id="pass" style="background-color: green;  padding-left: 10px; color:white;">PASS</p>
                           <?php
                       }
                       else{
                           ?>
                           <p id="fail" style="background-color: red; padding-left: 10px; color:white;">FAIL</p>
                           <?php
                       }
                    ?>
                </td>
                <td style="padding-left: 30px;"><a href="updateresult.php?id=<?php  echo $res['id'];?>&cl=<?php echo $class;?>" data-toggle="tooltip" data-placement="bottom" title="UPDATE">
                <i class="fa fa-edit" aria-hidden="true"></i></a></td>
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