<?php
    require_once("header.php");
    
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
		td:nth-of-type(2):before { content: "Order id"; }
		td:nth-of-type(3):before { content: "Order Status"; }

	}
    .plus_minus{
            background-color:#e0518f;
            color:white;
            border-radius:50px; 
            font-size:12px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, .2); 
            display:flex;
            justify-content: center;
            align-items: center; 
        }
        .plus_minus:hover{
            background-color:#e37faa;
        }
   
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="m-5 text-dark">Track your Order</h1>

            <form action="track.php">
                <div class="d-flex justify-content-center m-5">
                    <input type="text" placeholder="Enter your Order Id" name="order_id" class="border border-dark  rounded-start-2 p-2 w-50" >
                    <input type="submit" name="track" value="track" class="bg-black text-white p-3  rounded-end-2">
                </div>
            </form>
            <div class="col-lg-8 mx-auto">
                <?php 
                    if ( isset( $_GET['track'] ) ) {
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT * FROM `orders` WHERE `order_id` = '$order_id'";
                        $result = mysqli_query($connection, $select_query);
                        if ($result-> num_rows == 1) {
                            $row = mysqli_fetch_assoc($result);
                                ?>
                                    <table class="table-hover border rounded-5 w-100" role="table">
                                        <thead class="border-none" role="rowgroup">
                                            <tr role="row">
                                                <th class="text-center" role="columnheader"></th>
                                                <th class="text-center" role="columnheader">Order Id</th>
                                                <th class="text-center" role="columnheader">Order Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            <?php
                                                    ?>
                                                        <!-- this work could also have been done using product_id from $array[product_id] -->
                                                        <tr role="row" class="border" style="color:gray;font-weight:bolder;">
                                                            <td  role="cell" class="text-center">
                                                                <a href="admin\ordered_products.php?order_status=cancelled&order_id=<?php echo $row['order_id']?>" class="text-center">
                                                                    <button style="background-color:#e0518f;color:white;" class="plus_minus p-2 mx-auto m-2">Cancel Order</button>
                                                                </a>
                                                            </td>
                                                            <td  role="cell" class="text-center"><?php echo $row['order_id']?></td>
                                                            <td  role="cell" class="text-center"><?php echo $row['order_status']?></td>
                                                        </tr>
                                                
                                                    <?php
                                            ?>                    
                                        </tbody>
                                    </table>

                                <?php
                        }else {
                            ?>
                                <h1>No order placed with this ID</h1>
                            <?php
                        }
                    }
                ?>
            
            </div>
            
            
        </div>
    </div>
</div>
<?php require_once("footer.php") ?>