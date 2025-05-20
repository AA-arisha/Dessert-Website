<?php
    require_once("header.php");
    if(isset( $_GET ["register"] )){
        $user_name=$_GET['fullname'];
        $user_email=$_GET['email'];
        $user_password=$_GET['password'];
        $user_confirm_password = $_GET['confirm_password'];

        if(  $user_password !=  $user_confirm_password ){
			echo '
				<script>
					location.assign("login.php?alerts&alert=danger&message=password doesnot match")
				</script>
				';
        }
    
        $select_query = "SELECT * FROM `clients` WHERE `email` = '$user_email'";
        $result = mysqli_query($connection , $select_query);
        if( $result -> num_rows >= 1 ){
			echo '<script>
					location.assign("login.php?alerts&alert=danger&message= username already exists")
				</script>
				';
        };
    
        $insert_query="INSERT INTO `clients`( `email`, `fullname`, `password`) VALUES ('$user_email','$user_name','$user_password')";
        $result=mysqli_query($connection,$insert_query);
        if( $result ){
			echo '
				<script>
					location.assign("login.php?alerts&alert=success&message=Registered Successfully")
				</script>
				';
        };
    }

    if( isset( $_GET['login'] ) ){
        
        $user_email = $_GET['email'];
        $user_password = $_GET['password'];
    
         $select_query = "SELECT * FROM `clients` WHERE `email` = '$user_email' AND `password` = '$user_password' ";
    
         $result = mysqli_query($connection,$select_query);
    
         
          if( $result -> num_rows == 1 ){
    
             $row = mysqli_fetch_assoc($result);
    
             if( $row['client_role'] =='admin' ){
                $_SESSION['admin'] = $row; 
				echo '
				<script>
					location.assign("admin/user.php?alerts&alert=success&message=Admin entered Successfully")
				</script>
				';
             }else{
              $_SESSION['user'] = $row;
			  echo '
				<script>
					location.assign("index.php?alerts&alert=success&message=Login Successfull")
				</script>
				';
    
             }
            
          }else{
			echo '
				<script>
					location.assign("login.php?alerts&alert=danger&message= This username doesnot exist")
				</script>
				';
         }
    
        }
    

?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 form-v8">
            <div class="page-content">
		<div class="form-v8-content">
			<div class="form-left">
				<img src="images\ian-dooley-TLD6iCOlyb0-unsplash-1-683x1024.png" class="img-fluid h-100 w-100" alt="form">
			</div>
			<div class="form-right">
				<div class="tab">
					<div class="tab-inner">
						<button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">Sign Up</button>
					</div>
					<div class="tab-inner">
						<button class="tablinks " onclick="openCity(event, 'sign-in')">Sign In</button>
					</div>
				</div>
				<form class="form-detail" action="login.php" method="get">
					<div class="tabcontent" id="sign-up">
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="fullname" id="full_name" class="input-text" required>
								<span class="label">Username</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="email" id="your_email" class="input-text" required>
								<span class="label">E-Mail</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="password" id="password" class="input-text" required>
								<span class="label">Password</span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="confirm_password" id="confirm_password" class="input-text" required>
								<span class="label">Confirm Password</span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row-last mx-auto">
							<input type="submit" name="register" class="register" value="Register">
						</div>
					</div>
				</form>


				<form class="form-detail" action="login.php" method="get">
					<div class="tabcontent" id="sign-in">
						
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="email" id="email" class="input-text" required>
								<span class="label">E-Mail</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="password" id="password" class="input-text" required>
								<span class="label">Password</span>
								<span class="border"></span>
							</label>
						</div>

						<div class="form-row-last">
							<input type="submit" name="login" class="register" value="Sign In">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

                
            </div>
        </div>
    </div>
</section>


    
<script type="text/javascript">
		function openCity(evt, cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>    

<?php
    require_once("footer.php");
?>