<?php
    require_once("sidebar.php");
    if(isset($_POST['category_form'])){
        $category_name=$_POST['category_name'];
        $select_query = "SELECT * FROM `categories` where `category_name` = '$category_name'";
        $result = mysqli_query($connection,$select_query);
        // var_dump($result -> num_rows);
        if ($result -> num_rows == 1) {
            echo '<script>
            location.assign("category.php?alerts&alert=danger&message=Category already entered")
          </script>'; 
        }
        else{
            $insert_query="INSERT INTO `categories`(`category_name`) VALUES ('$category_name')";
        $result =mysqli_query($connection,$insert_query);
        
        if( $result ){
            echo '<script>
            location.assign("category.php?alerts&alert=success&message=Category added Successfully")
          </script>';}
            
        }      
    }

    if( isset( $_GET['delete_category'] ) ){
      
        $category_id =  $_GET['category_id'] ;
      
        $delete = "DELETE FROM `categories` WHERE `category_id` = '$category_id'";
      
        $result = mysqli_query($connection,$delete);
        
        if( $result ){
            echo '<script>
            location.assign("category.php?alerts&alert=success&message=Category deleted Successfully")
          </script>';
        }
      }
?>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-2 text-center my-5"> Enter your categories </h1>

                <form method="POST" enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for="category_name"> Category name </label>
                        <input type="text" name="category_name" id="" class="form-control" style="border-radius:20px;" required>
                    </div>
                    <button type="submit" name="category_form"class="btn btn-info form-control">Submit</button>
                </form>
            </div>
        </div>
    </div>



    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>Show all categories</h1>
            <table class="table table-hover border border-3 border-info">
  
  <tbody>
        <?php
            $select_query="SELECT * FROM `categories`";
            $result=mysqli_query($connection,$select_query);

            

            while($row=mysqli_fetch_assoc($result)){
                
                    ?>
                        <tr>
                        
                        <td> <?php echo $row['category_name']?></td>
                        
                        
                        <td class="fs-5">
                            <a href="update_register.php?update_user&category_id=<?php echo$row['category_id']?>" ><i class="fa-solid fa-pen-to-square" style="color: #FFD43B;"></i> </a>
                            <a href="category.php?delete_category&category_id=<?php echo$row['category_id']?>"><i class="fa-solid fa-trash" style="color: #ff6181;"></i></a>

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

<?php
    require_once("footer.php");
?>