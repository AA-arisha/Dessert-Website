<?php 
    require_once("sidebar.php");
    require_once("process.php");

    $select_query = "SELECT * FROM `order_products` INNER JOIN `orders` ON orders.`order_id` = order_products.`order_id` INNER JOIN `products` on products.`product_id` = order_products.`product_id`";
    $result = mysqli_query($connection, $select_query);
   
   
 ?>
<style>
    /*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
	@media
	  only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
      margin: 15px;
    
    }
      
    
    
		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
           
        
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
           
		}

		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
        td:nth-of-type(1):before { content: "";}
		td:nth-of-type(2):before { content: "User ID"; }
		td:nth-of-type(3):before { content: "Order ID"; }
		td:nth-of-type(4):before { content: "Product ID"; }
        td:nth-of-type(5):before { content: "Product Name"; }
        td:nth-of-type(6):before { content: "Quantity"; }
        td:nth-of-type(7):before { content: "Price"; }
        td:nth-of-type(8):before { content: "Order Status"; }
        td:nth-of-type(9):before { content: "Change Status"; }
        
		
	}
    .plus_minus{
            background-color:#e0518f;
            color:white;
            border-radius:30px; 
            width:30px;
            height:30px;
            font-size:16px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, .2);  
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .plus_minus:hover{
            background-color:#e37faa;
        }
        .checkout:hover{
            background-color: rgba(39, 39, 39, 0.902);
        }
</style>


<section>
    <div class="cart_background">
        <div class="row p-5">
            <div class="col-md-12 cart">
                
                    <div class="row border-bottom">
                        <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    </div>
                  

                  <!-- eg cart jo uthai hai -->
           
                <table class="table-hover border rounded-5 w-100 table-striped" role="table">
                    <thead class="border-none" role="rowgroup">
                        <tr role="row" style="border:2px solid gray;">
                            <th class="text-center" role="columnheader"></th>
                            <th class="text-center" role="columnheader">User ID</th>
                            <th class="text-center" role="columnheader">Order ID</th>
                            <th class="text-center" role="columnheader">Product ID</th>
                            <th class="text-center" role="columnheader">Product Name</th>
                            <th class="text-center" role="columnheader">Quantity</th>
                            <th class="text-center" role="columnheader">Price</th>
                            <th class="text-center" role="columnheader">Order Status</th>
                            <th class="text-center" role="columnheader">Change Status</th>
                            
                        </tr>
                    </thead>
                    <tbody role="rowgroup">
                        <?php
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $count+=1;
                               
                                ?>
                                 <form action="ordered_products.php" method="get">
                                <!-- this work could also have been done using product_id from $array[product_id] -->
                                    <tr role="row" style="color:gray;font-weight:bolder; border:2px solid gray;">
                                        <td  role="cell" class="text-center border-top border-dark"><?php echo $count;?>.</td>
                                        <td  role="cell" class="text-center border-top border-dark"><?php echo $row['client_id'] ?></td>
                                        <td  role="cell" class="text-center border-top border-dark"><?php echo $row['order_id'] ?></td>
                                        <td  role="cell" class="text-center border-top border-dark"><?php echo $row['product_id'] ?></td>
                                        <td  role="cell" class="text-center border-top border-dark"><?php echo $row['product_name'] ?></td>
                                        <td  role="cell" class="text-center border-top border-dark"><?php echo $row['quantity'] ?></td>
                                        <td  role="cell" class="text-center border-top border-dark" style="color:gray;font-weight:bolder;" id="price<?php $row['product_id'] ?>"><?php echo $row['product_price'] ?></td>
                                        <td  role="cell" 
                                        <?php
                                         if ($row['order_status'] == "Pending") { ?>class=" bg-danger-subtle text-center border-top border-dark" <?php };
                                         if ($row['order_status'] == "On the way") { ?>class=" bg-info-subtle text-center border-top border-dark" <?php };
                                         if ($row['order_status'] == "Delivered") { ?>class="bg-success-subtle text-center border-top border-dark" <?php };
                                         if ($row['order_status'] == "cancelled") { ?>class="bg-danger text-center border-top border-dark text-dark" <?php };


                                        ?>
                                        
                                        ><?php echo $row['order_status'] ?></td>
                                        <td  role="cell" class="text-center border-top border-dark">
                                            <input type="text" class="d-none" name="order_id" value="<?php echo $row['order_id']?>">
                                        <?php
                                         if ($row['order_status'] == "Pending") { ?>
                                            <input class="btn bg-info-subtle w-75 m-1" name="order_status" type="submit" value="On the way">
                                            <input class="btn bg-success-subtle w-75 m-1" name="order_status" type="submit" value="Delivered">
                                            <?php }

                                            elseif ($row['order_status'] == "On the way") { ?>
                                            <input class="btn bg-danger-subtle  border w-75 m-1" name="order_status" type="submit" value="Pending">
                                            <input class="btn bg-success-subtle w-75 m-1" name="order_status" type="submit" value="Delivered">
                                            <?php }

                                            elseif ($row['order_status'] == "Delivered") { ?>
                                            <input class="btn bg-danger-subtle  border w-75 m-1" name="order_status" type="submit" value="Pending">
                                            <input class="btn bg-info-subtle w-75 m-1" type="submit" name="order_status" value="On the way">
                                            <?php };

                                        ?>
                                           
                                        </td>
 
                                    </tr>
                                    </form>   
                                <?php
       
                            }
                           
                
                        ?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<?php require_once("footer.php") ?>