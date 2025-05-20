<?php
      // update status
      if ( isset( $_GET['order_status'] ) ) {
        $order_status = $_GET['order_status'];
        $order_id = $_GET['order_id'];
        $update_query = "UPDATE `orders` SET `order_status`='$order_status' WHERE `order_id` = '$order_id' ";
        $result_2 = mysqli_query($connection, $update_query);
        
     }
?>