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
     $engmarks = $rows['engmarks'];
     $hinmarks = $rows['hinmarks'];
     $matmarks = $rows['matmarks'];
     $phymarks = $rows['phymarks'];
     $chemmarks = $rows['chemmarks'];
    }
  }
  
  // $extra = mysqli_fetch_array($showdata);
 

    if(isset($_POST['btn'])){
        $engmarks = $_POST['engmarks'];
        $hinmarks = $_POST['hinmarks'];
        $matmarks = $_POST['matmarks'];
        $phymarks = $_POST['phymarks'];
        $chemmarks = $_POST['chemmarks'];
        $status = 'fail';
        // adding status (pass or fail)
        if($engmarks>=33 && $hinmarks>=33 && $matmarks>=33 && $phymarks>=33 && $chemmarks>=33){
             $status = 'pass';
        }
     
       $update_query = "UPDATE `$classes` SET  `engmarks`='$engmarks', `hinmarks`='$hinmarks', `matmarks`='$matmarks', `phymarks`='$phymarks', `chemmarks`='$chemmarks',
                            `status`='$status' WHERE `id`='$ids'";

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
       header('location: showresult.php');
    }       
   
?>  
      
      <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST" class="formstyle"> 
        <h2 class="formstyle3">Update RESULT</h2><br><br>
        <input type="text" value="<?php echo $engmarks; ?>" name="engmarks"><br><br>
        <input type="text" value="<?php echo $hinmarks; ?>" name="hinmarks"><br><br>
        <input type="text" value="<?php echo $matmarks; ?>"name="matmarks"><br><br>
        <input type="text" value="<?php echo $phymarks; ?>" name="phymarks"><br><br>
        <input type="text" value="<?php echo $chemmarks; ?>" name="chemmarks"><br><br>
        <input type="submit" value="Update" name="btn" class="btn">
    </form>

</body>
</html>