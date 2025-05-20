<?php 
    require_once("header.php");
    // adding product to cart
    if ( isset( $_GET['product'] ) ) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` WHERE `product_id` = '$product_id'";
        $result = mysqli_query($connection , $select_query);
        
        
        $row = mysqli_fetch_assoc($result);
        // add product to cart
        if ( isset( $_SESSION['cart'] )) {

            // refresh karney pey same cheez waapis na aai
            foreach ($_SESSION['cart'] as $index => $array) {
                if ( $array['product_id'] == $product_id ){
                    echo 
                    '<script>
                        location.assign("cart.php?alerts&alert=danger&message=product already added to cart")
                    </script>';
                    die;
                };
            }
            // assigning the row to the next empty index
            $_SESSION['cart'][] = $row;
        }else{
            $_SESSION['cart'] = array($row);
        }       
    
    }
    // deleting product from cart
    if ( isset( $_GET['delete'] ) ){
        $product_id = $_GET['product_id'];
        foreach ($_SESSION['cart'] as $index => $array) {
            if ($array['product_id'] == $product_id) {
                unset( $_SESSION['cart'][$index] );
            };
        };
    };
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
		td:nth-of-type(2):before { content: ""; }
		td:nth-of-type(3):before { content: ""; }
		td:nth-of-type(4):before { content: "Product"; }
        td:nth-of-type(5):before { content: "Quantity"; }
        td:nth-of-type(6):before { content: "Price"; }
        td:nth-of-type(7):before { content: "Subtotal"; }
        
		
	}
    .plus_minus{
            background-color:#e0518f;
            color:white;
            border-radius:30px; 
            width:30px;
            height:30px;
            font-size:16px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, .2);  
        }
        .plus_minus:hover{
            background-color:#e37faa;
        }
</style>


<section>
    <div class="cart_background">
        <div class="row p-5">
            <div class="col-md-12 cart">
                
                    <div class="row border-bottom">
                        <div class="col"><h4><b>Shopping Cart</b></h4></div>
                        <div class="col align-self-center text-right text-muted"><?php echo count($_SESSION['cart']); ?> Items</div>
                    </div>
                  

                  <!-- eg cart jo uthai hai -->
                
                <table class="table-hover border rounded-5 w-100" role="table">
                    <thead class="border-none" role="rowgroup">
                        <tr role="row">
                            <th class="text-center" role="columnheader"></th>
                            <th class="text-center" role="columnheader"></th>
                            <th class="text-center" role="columnheader"></th>
                            <th class="text-center" role="columnheader">Product</th>
                            <th class="text-center" role="columnheader">Quantity</th>
                            <th class="text-center" role="columnheader">Price</th>
                            <th class="text-center" role="columnheader">Subtotal</th>
                            
                        </tr>
                    </thead>
                    <tbody role="rowgroup">
                        <?php
                            $count = 0;
                            // usually array ki jaga hum value iss leyey likhtay hain kyunk uss mai index 
                            foreach ($_SESSION['cart'] as $index => $array) {
                                // echo '<pre>';
                            //    print_r($array['product_id']);
                                $count+=1;
                                ?>
                                <!-- this work could also have been done using product_id from $array[product_id] -->
                                    <tr role="row" class="border" style="color:gray;font-weight:bolder;">
                                        <td  role="cell" class="text-center"><a href="cart.php?delete&product_id=<?php echo $array['product_id']; ?>">
                                            <span class="close" style="border:2px solid #e0518f;border-radius:40px;padding:2px;">&#10005;</span></a></td>
                                        <td  role="cell" class="text-center"><?php echo $count;?>.</td>
                                        <td  role="cell" class="text-center"><img src="images/product_images/<?php echo $array['product_image'] ?>" alt="">  </td>
                                        <td  role="cell" class="text-center"><?php echo $array['product_name'] ?></td>
                                        <td  role="cell" class="text-center">
                                                        <div class="div d-flex border justify-content-between" style="border-radius:30rem;">
                                                            <button class="plus_minus rounded-5" onclick="minus(<?php echo $count ?>)" >-</button>
                                                             <input type="text" value="1" class="text-center w-25" id="add_subtract<?php echo $count?>" style="color:gray;font-weight:bolder;">
                                                            <button class="plus_minus" onclick="add(<?php echo $count ?>)" >+</button>
                                                        </div>
                                        </td>
                                        <td  role="cell" class="text-center" style="color:gray;font-weight:bolder;" id="price<?php echo $count ?>"><?php echo $array['product_price'] ?></td>
                                        <td  role="cell" class="text-center" style="color:gray;font-weight:bolder;" id="subtotal<?php echo $count ?>"><?php echo $array['product_price'] ?></td>
                                    </tr>
                            
                                <?php
                                
                            }
                        ?>                    
                    </tbody>
                </table>
                

            
                <!-- eg cart khatam hogai -->
                
          
                
            </div>
            
        </div>
        
    </div>
</section>

<script>
  function minus(count){
    if ( document.getElementById("add_subtract"+count).value >1 ){
      document.getElementById("add_subtract"+count).value--
      document.getElementById("subtotal"+count).innerHTML = parseInt( document.getElementById("price"+count).innerHTML) * document.getElementById("add_subtract"+count).value
    }
    
  }
  function add(count){
    document.getElementById("add_subtract"+count).value++
    document.getElementById("subtotal"+count).innerHTML = parseInt( document.getElementById("price"+count).innerHTML) * document.getElementById("add_subtract"+count).value

  }
</script>
  
<?php require_once("footer.php"); ?>