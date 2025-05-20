

<?php
require_once("sidebar.php");



if( isset( $_GET['delete_product'] ) ){
      
  $product_id =  $_GET['product_id'] ;

  $delete = "DELETE FROM `products` WHERE `product_id` = '$product_id'";

  $result = mysqli_query($connection,$delete);
  
  if( $result ){
    echo '
    <script>
        location.assign("show_all_products.php?alerts&alert=success&message=Product deleted Successfully")
    </script>
    ';
  }
}
?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script>let table = new DataTable('#myTable');</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center table-responsive">
        <h1>Show all Products</h1>
            <table class="table table-hover border border-3 border-info" id="myTable">
              <thead class="bg-info border-none">
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Action</th>
                
                </tr>
              </thead>
              <tbody>
                  <?php
                    // $select_query="SELECT * FROM `products`";
                    // $result=mysqli_query($connection,$select_query);
                    $select_query="SELECT `product_id`,`product_name`, `product_description`,`product_image`,`category_name` FROM `products` INNER JOIN `categories` ON 'products.category_id'= 'categories.category_id'";
                    $result = mysqli_query($connection,$select_query);
                    var_dump($result);
                    while($row=mysqli_fetch_assoc($result)){
                      ?>
                        <tr>
                          <th> <?php echo $row['product_id']?></th>
                          <td> <?php echo $row['product_name']?></td>
                          <td> <?php echo $row['product_price']?></td>  
                          <td> <?php echo $row['product_description']?></td>

                          <td>
                            <?php
                                  // $select_query_2 = "SELECT * FROM `categories` WHERE `category_id`= '". $row['category_id'] ."' ";
                                  // $result_2 = mysqli_query($connection, $select_query_2);
                                  // $row_2=mysqli_fetch_assoc($result_2);
                                  echo $row_2['category_name'];
                                  
                            ?>
                          </td>


                          <td> <img src="../images/product_images/<?php echo $row['product_image']?>" class="img-fluid w-50" alt=""></td>
                          <td class="fs-5"> <a href="update_product.php?update_product&product_id=<?php echo$row['product_id']?>"><i class="fa-solid fa-pen-to-square" style="color: #FFD43B;"></i></a>
                                            <a href="show_all_products.php?delete_product&product_id=<?php echo $row['product_id']?>" ><i class="fa-solid fa-trash" style="color: #ff6181;"></i> </a>
                          </td>
                        
                        </tr>
                      <?php
                    }
                      ?>
              </tbody>
            </table>





        </div>
    </div>
</div>




















<?php
require_once("footer.php");
?>
