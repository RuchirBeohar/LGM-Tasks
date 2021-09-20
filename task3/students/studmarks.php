<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student portal</title>
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
            include '../connection.php';

            $studrollno = $_SESSION['id'];
            $studclass = $_SESSION['class'];

            $email_search = "select * from `$studclass` where `id`='$studrollno'";
            $query = mysqli_query($con, $email_search);

            if($res = mysqli_fetch_array($query)){
                ?>
                  <div class="marksheet">
                    <div id="extras">
                       <h3 id="year">YEAR: 2020-2021</h3>  
                       <img src="https://cdn.shopify.com/s/files/1/0280/2745/3509/files/IVY_LOGO_1_a7a1cf80-68ab-4a50-953b-1d6c3b61d134.png?v=1591729833" id="log">   
                       <h4 id="IFSC">IFSC Code: 28031</h4>
                    </div>
                    <h1 id="head">IVY Groups of Institution</h1>  
                
                    <h3 id="cl">Class: <?php echo $res['class'] ?></h3>
                    <h3 id="name">Name: <?php echo $res['name'] ?></h3>
                    <h3 id="roll">Roll No: <?php echo $res['id'] ?></h3>
                    <div id="extra2">
                       <h3>Email: <?php echo $res['email'] ?></h3>
                       <h3>Fathername:<?php echo $res['fathername'] ?></h3>
                       <h3>Mobile: <?php echo $res['mobile'] ?></h3>
                       <h3>English: <?php echo $res['engmarks'] ?></h3>
                       <h3>Hindi: <?php echo $res['hinmarks'] ?></h3>
                       <h3>Maths: <?php echo $res['matmarks'] ?></h3>
                       <h3>Physics: <?php echo $res['phymarks'] ?></h3>
                       <h3>Chemistry: <?php echo $res['chemmarks'] ?></h3>
                   </div>
                   <h3 id="tt">Total: <?php 
                        echo $res['engmarks'] +$res['hinmarks'] +$res['matmarks'] +$res['phymarks'] +$res['chemmarks'];
                    ?>/500</h3>
                    <h3 id="st">STATUS: <?php echo $res['status'] ?></h3>
                    <input type="button" value="Print" id="btn" onclick="window.print()">
                  </div>
                  <?php
            }

        ?>

</body>
</html>