 <!-- sidebar -->
 <style>
        .update_cart:hover{
            background-color:#e37faa;
        }
      </style>
<?php 
  if ( isset( $_SESSION['cart'] ) ) {
      ?>
     
        <section>
        <div class="cart_sidebar position-fixed top-50 end-0 m-3 p-2 position-relative"  data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="background-color:#e0518f;color:white;font-weight:bolder;font-size:16px;border-radius:5px;box-shadow: 3px 3px 5px rgba(0, 0, 0, .3);">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"style="background-color:white;color:black;border:1px solid #e0518f;">
          <?php echo count($_SESSION['cart']); ?>
          </span>
            <i class="fa-brands fa-opencart"></i>
        </div>
        
        <div class="offcanvas offcanvas-end rounded-start-5 " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" id="offcanvasExampleLabel">Cart</h5>
            <button type="button" class="btn-close rounded-circle fw-5" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color:#e0518f; box-shadow: 4px 4px 5px rgba(0, 0, 0, .4);"></button>
          </div>
          <div class="offcanvas-body">
          <form action="cart.php" method="get">
            <table class="table-hover border rounded-5 w-100" role="table">
              <thead class="border-none" role="rowgroup">
                  <tr role="row">
                      <th class="text-center" role="columnheader"></th>
                      <th class="text-center" role="columnheader"></th>
                      <th class="text-center" role="columnheader">Product</th>
                      <th class="text-center" role="columnheader">Quantity</th>
                      <th class="text-center" role="columnheader">Price</th>
                      
                  </tr>
              </thead>
              <tbody role="rowgroup">
               
                  <?php
                      
                      // usually array ki jaga hum value iss leyey likhtay hain kyunk uss mai index 
                      foreach ($_SESSION['cart'] as $index => $array) {
                          // echo '<pre>';
                      //    print_r($array['product_id']);
                        
                          ?>
                          <!-- this work could also have been done using product_id from $array[product_id] -->
                              <tr role="row" class="border" style="color:gray;font-weight:bolder;">
                                  <td  role="cell" class="text-center"><a href="cart.php?delete&product_id=<?php echo $array['product_id']; ?>">
                                      <span class="close" style="border:2px solid #e0518f;border-radius:40px;padding:2px;">&#10005;</span></a></td>
                                  <td  role="cell" class="text-center"><img src="images/product_images/<?php echo $array['product_image']?>" alt="">  </td>
                                  <td  role="cell" class="text-center"><?php echo $array['product_name'] ?></td>
                                  <td  role="cell" class="text-center">
                                    <div class="div d-flex border justify-content-around" style="border-radius:30rem;">
                                      <div class="plus_minus rounded-5"  onclick="subtract(<?php echo $array['product_id'] ?>)">-</div>
                                            <input type="text" class="d-none" name="product_id" value="<?php echo $array['product_id'] ?>">
                                            <input type="text" value="<?php echo  $array['quantity']?>" name="quantity" class="text-center w-25" id="quantity<?php echo  $array['product_id']?>" style="color:gray;font-weight:bolder;">
                                      <div class="plus_minus rounded-5"  onclick="add(<?php echo  $array['product_id'] ?>)">+</div>
                                    </div>
                                  </td>
                                  <td  role="cell" class="text-center" style="color:gray; font-size:12px;" id="price<?php echo $array['product_id'] ?>">Rs <?php echo $array['product_price'] ?></td>
                              </tr>
                      
                          <?php
                          
                      }
                  ?> 
 
                              
              </tbody> 
            </table>
            <input type="submit" name="product" value="Update Cart" class="update_cart text-center fs-6 p-2 mx-auto mt-1" style="background-color:#e0518f;color:white;font-weight:bold;border-radius:30px; box-shadow: 2px 2px 2px rgba(0, 0, 0, .2);">
          </form>    
          
          </div>
        </div>
                
      </section>
     
      <?php
  }
?>

<script>
  function subtract(product_id){
    if ( document.getElementById("add_subtract"+product_id).value >1 ){
      document.getElementById("add_subtract"+product_id).value-- 
    }
    
  }
  function add(product_id){
    document.getElementById("add_subtract"+product_id).value++
    // document.getElementById("subtotal"+product_id).innerHTML = parseInt( document.getElementById("price"+product_id).innerHTML) * document.getElementById("add_subtract"+product_id).value

  }
  
</script>

 