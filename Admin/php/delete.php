<?php    
$cnect = mysqli_connect("localhost","root","","online_fashion_store");
 if (isset($_GET['item_ID'])) {  
      $id = $_GET['item_ID'];  
      $query2 = "DELETE FROM `item` WHERE item_ID = '$id'";  
      $run = mysqli_query($cnect,$query2);  
      if ($run) {  
           header('location:viewitems.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?> 