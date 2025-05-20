<?php
    require_once("sidebar.php");
    if( isset( $_GET['delete_user'] ) ){
      
        $user_id =  $_GET['users_id'] ;
      
        $delete = "DELETE FROM `clients` WHERE `client_no.` = '$user_id'";
      
        $result = mysqli_query($connection,$delete);
        
        if( $result ){
            echo '<script>
            location.assign("user.php?user_deleted")
          </script>';
        }
      }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-6 text-center">
            <h1>Show all Users</h1>
            <div class="table-responsive-sm">
            <table class="table table-hover border border-3 border-info">
                <thead class="bg-info border-none">
                    <tr>
                        <th scope="col">Client ID</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $select_query="SELECT * FROM `clients`";
                            $result=mysqli_query($connection,$select_query);

                            

                            while($row=mysqli_fetch_assoc($result)){
                                if ($row['client_role'] != "admin" ) {
                                    ?>
                                        <tr>
                                        <th> <?php echo $row['client_no.']?></th>
                                        <td> <?php echo $row['fullname']?></td>
                                        <td> <?php echo $row['email']?></td>
                                        <td> <?php echo $row['password']?></td>
                                        <td> <?php echo $row['client_role']?></td>
                                        
                                        <td class="fs-5">
                                            <a href="update_register.php?update_user&users_id=<?php echo$row['client_no.']?>" ><i class="fa-solid fa-pen-to-square" style="color: #FFD43B;"></i> </a>
                                            <a href="user.php?delete_user&users_id=<?php echo$row['client_no.']?>"><i class="fa-solid fa-trash" style="color: #ff6181;"></i></a>

                                        </td>
                                        
                                        </tr>
                                    <?php
                                    
                                }
                            
                            }


                        ?>
                    
                </tbody>
            </table>
            

            </div>
                
        </div>
    </div>
</div>
 
     
<?php
    require_once("footer.php");
?>