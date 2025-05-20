<?php
require_once("sidebar.php");
if(isset($_POST['product_form'])){
    $product_name= ucfirst($_POST['product_name']);
    $product_price=$_POST['product_price'];
    $product_description=$_POST['product_description'];
    $category_id=$_POST['category_id'];

    $file_name = rand(0,1000000000000) . $_FILES["product_image"]['name'];
    $file_tmp_path = $_FILES["product_image"]['tmp_name'];

    $insert_query="INSERT INTO `products`(`product_name`, `product_price`, `product_description`, `category_id` , `product_image`) VALUES ('$product_name','$product_price', '$product_description',' $category_id' , '$file_name')";
    $result =mysqli_query($connection,$insert_query);
    
    if( $result ){
        move_uploaded_file($file_tmp_path,'../images/product_images/'. $file_name);
        // echo '<script>
        //     location.assign("show_all_products.php?alerts&alert=success&message=Category deleted Successfully")
        //   </script>';
      }
}
?>
<style>
    form .mb-3 input{
        border-radius:500px;
    }
    h1{
        color:#e0518f
    }
</style>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-2 text-center my-5" style="color:#e0518f"> Product Form </h1>

                <form method="POST" enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for=" product_name"> product name </label>
                        <input type="text" name="product_name" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="product_price">product_price</label>
                        <input type="number" name="product_price" class="form-control" required id="product_price">
                    </div>
                    
                    <div class="mb-3">
                        <label for="product_description" class="form-label">product_description</label>
                        <input type="text" name="product_description" class="form-control" required id="product_description" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">category_id</label>
                        <select name="category_id" id="" class="form-control">
                            <?php
                                $select_query = "SELECT * FROM `categories` ";

                                $result = mysqli_query($connection,$select_query);

                                while( $row = mysqli_fetch_assoc($result) ){
                                    ?>
                                        <option value="<?php echo $row['category_id'] ?>"> <?php echo $row['category_name'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_image" class="form-label">product_image</label>
                        <input type="file" name="product_image"class="form-control" required id="product_image">
                    </div>
                    <button type="submit" name="product_form"class="btn btn-info form-control">Submit</button>
                </form>
            </div>
        </div>
    </div>



<?php
require_once("footer.php");
?>