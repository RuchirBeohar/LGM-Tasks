<?Php

    include 'connection.php';
    $ids = $_GET['id'];
    $classes = $_GET['cl'];

    $deltequery = "DELETE FROM  `$classes` WHERE `id`='$ids'";
    $result = mysqli_query($con, $deltequery);
    if($result){
        ?>
           <script>
             alert("Data Deleted Properly");
            </script>
        <?php 
      }
      else{
        ?>
            <script>
              alert("Data Cannot be Deleted");
            </script>
       <?php
      }
      header('location: showstud.php');

?>