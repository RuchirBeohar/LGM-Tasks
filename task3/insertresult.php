<!-- We aren't using this -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD RESULT</title>
</head>
<body>
    <?php

       include 'connection.php';

       if(isset($_POST['btn'])){
           $studroll = $_POST['studroll'];
           $studclass =  $_POST['studclass'];  
           $engmarks = $_POST['engmarks'];
           $hinmarks = $_POST['hinmarks'];
           $matmarks = $_POST['matmarks'];
           $phymarks = $_POST['phymarks'];
           $chemmarks = $_POST['chemmarks'];

           
           $emailquery = "select * from `$studclass` where id='$studroll' ";
           $query = mysqli_query($con, $emailquery);
   
           $emailcount = mysqli_num_rows($query);
   
           if($emailcount != 0){

            $insertquery = "UPDATE `$studclass` SET `engmarks`='$engmarks', `hinmarks`='$hinmarks', `matmarks`='$matmarks', `phymarks`='$phymarks', `chemmarks`='$chemmarks'  WHERE `id`='$studroll' "; 
            $iquery = mysqli_query($con, $insertquery);

             if($iquery){
                ?>
                <script>
                    alert("Student marks added Successfull");
                </script>
                <?php
            } 
             else{
                ?>
                <script>
                    alert("Student marks Not Added due to technical reasons");
                </script>
                <?php
               }
            } 
           else{
                  
               ?>
               <script>
                  alert("student not exists");
               </script>
               <?php
                }
        } 

    ?>
    
    <form action="" method="POST">
        <h2>ADD RESULT</h2><br><br>
        <input type="text" placeholder="Enter class" name="studclass"><br><br>
        <input type="text" placeholder="Enter roll" name="studroll"><br><br>
        <input type="text" placeholder="Enter English marks" name="engmarks"><br><br>
        <input type="text" placeholder="Enter Hindi marks" name="hinmarks"><br><br>
        <input type="text" placeholder="Enter Maths marks" name="matmarks"><br><br>
        <input type="text" placeholder="Enter physics marks" name="phymarks"><br><br>
        <input type="text" placeholder="Enter Chemistry marks" name="chemmarks"><br><br>
        <input type="submit" value="ADD" name="btn">
    </form>

</body>
</html>