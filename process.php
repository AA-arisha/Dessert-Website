<?php
require_once("header.php");
    if( isset($_GET['update_cart']  ) ){
        $quantity = $_GET['quantity'];
        $product_id =$_GET['product_id'];
        $select_query = "SELECT * FROM `quantities` WHERE `product_id` = '$product_id'";
        $result = mysqli_query($connection,$select_query);
        if ( $result -> num_rows >= 1 ) {
            $update_query = "UPDATE `quantities` SET `quantity`='$quantity' WHERE `product_id` = '$product_id'";
            $result= mysqli_query($connection,$update_query);
            echo '
				<script>
					location.assign("cart.php")
				</script>
				';

        }else {
            $insert_query = "INSERT INTO `quantities`(`product_id`, `quantity`) VALUES ('$product_id','$quantity')";
            $result= mysqli_query($connection,$insert_query);
            echo '
            <script>
                location.assign("menu.php")
            </script>
            ';
        }

       
        
        
    }
?>