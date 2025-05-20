<?php
    require_once("header.php");
?>
<style>
.details {
            border: 1.5px solid grey;
            color: #212121;
            width: 100%;
            height: auto;
            box-shadow: 0px 0px 10px #212121;
        }

        .cart {
            background-color: #212121;
            color: white;
            margin-top: 10px;
            font-size: 12px;
            font-weight: 900;
            width: 100%;
            height: 39px;
            padding-top: 9px;
            box-shadow: 0px 5px 10px  #212121;
        }

        .card {
            width: fit-content;
        }

        .card-body {
            width: fit-content;
        }

        .btn {
            border-radius: 0;
        }

        .img-thumbnail {
            border: none;
        }

        .card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
            border-radius: 5px;
            padding-bottom: 10px;
        }
        .plus_minus{
            background-color:#e0518f;
            color:white;
            border-radius:50px; 
            width:40px;
            height:40px;
            font-size:16px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, .2);  
        }
        .plus_minus:hover{
            background-color:#e37faa;
        }
        a:hover{
            color:white;
        }
</style>
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center">
            <?php
                $select_query="SELECT * FROM `categories`";
                $result=mysqli_query($connection,$select_query);
                while($row=mysqli_fetch_assoc($result)){
                    
                    ?>
                        <div class="btn m-3 p-3" style="color:white; background-color:#e0518f; border-radius:30px; font-weight:bold; width:15rem;"> <?php  echo $row['category_name'] ?> </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>

</section>

<section id="featured-services" class="featured-services section">
    <div class="container">

        <div class="row">
        <?php
                $select_query_2="SELECT * FROM `products`";
                $result_2=mysqli_query($connection,$select_query_2);
                while($row_2=mysqli_fetch_assoc($result_2)){
                    
                    ?>
                        <form action="cart.php" class="col-xl-3 col-md-5 col-sm-12 mt-3" method="get">
                            <div class="service-item">
                                <img src="images/product_images/<?php echo $row_2['product_image']?>" class="img-fluid" alt="">
                                <h4><a href="" class=""><?php echo $row_2['product_name'] ?></a> <p>Rs<?php echo $row_2['product_price']?></p></h4>
                                <p>
                                    <?php
                                        $desc = $row_2['product_description'];
                                        echo(substr($desc,0, 80)) ;
                                    ?> <a href="" data-bs-toggle="modal" data-bs-target="#<?php echo $row_2['product_id'] ?>">view more....</a>
                                    
                                </p>
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade w-100"  id="<?php echo $row_2['product_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" >
                                <div class="modal-content" style="border-radius:50px;">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close p-3" style="background-color:#e05184; border-radius:50px;color:white;" data-bs-dismiss="modal" aria-label="Close"></button>

                                        <div class="container-fluid border rounded-5">
                                            <div class="row">
                                                <div class="col-lg-12 d-flex">
                                                    <div class="col-lg-6 my-auto">
                                                        <img src="images/product_images/<?php echo $row_2['product_image']?>" class="img-fluid w-100" alt="">
                                                    </div>
                                                    <div class="col-lg-6 my-auto">
                                                        <h1 style="color:grey; font-weight:bold;"><?php echo $row_2['product_name'] ?></h1>
                                                        <hr>
                                                        <h4 class="fs-5" style="color:#e0518f;font-weight:bold;" >Rs<?php echo $row_2['product_price'] ?></h4>
                                                        <hr>
                                                        <div class="div d-flex border justify-content-around" style="border-radius:30px;">
                                                            <button class="plus_minus" onclick="minus(<?php echo $row_2['product_id'] ?>)" >-</button> <input type="text" value="1" class="text-center w-25" id="quantity<?php echo $row_2['product_id'] ?>"> <button class="plus_minus" onclick="plus(<?php echo $row_2['product_id'] ?>)" >+</button>
                                                        </div>
                                                        <hr>
                                                        <p class="fs-10" style="color:black;"><?php echo $row_2['product_description'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button class="btn animated fadeIn w-100 m-2" style="background-color:#e0518f;color:white;font-weight:bold;border-radius:30px; box-shadow: 2px 2px 2px rgba(0, 0, 0, .2);"><a href="cart.php?product&product_id=<?php echo $row_2['product_id'] ?>"> Add To Cart</a></button>
                                            </div>
                                        </div>
                                    </div>             
                                </div>
                            </div>
                        </div>
                       <!-- End Service Item -->
                    <?php
                }
            ?>

                
                
        </div>
    </div>  
</section>
<script>
    function minus(product_id){
        if ( document.getElementById("quantity"+product_id).value >1 ){
            document.getElementById("quantity"+product_id).value--
        }
    }
    function plus(product_id){
        document.getElementById("quantity"+product_id).value++
        
    }
</script>

<?php
    require_once("footer.php");
?>