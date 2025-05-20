<?php
    require_once('header.php');
	
?>
<section>
    
                <!-- Slider -->
				<section class="section-slide mt-2 p-0" >
					<div class="wrap-slick1" >
						<div class="slick1">
							<div class="item-slick1" style="background-image: url(images/slide4.avif);border-radius:100px;">
								<div class="container h-full  text-center">
									<div class=" h-full p-t-100 p-b-30 respon5">
										<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
											<span class="ltext-101 respon2 p-t-19" style=" color: #ffc834;font-weight:bold;
																					-webkit-text-stroke-color: #e0518f;
																					-webkit-text-stroke-width: 1px;
																					font-size:4rem;">		
											London's Most Beloved 
											</span>
										</div>
											
										<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
											<h2 class="ltext-201 p-t-19 p-b-43 respon1" style=" color: #ffc834;
																												font-weight:bolder;
																											-webkit-text-stroke-color: #e0518f;
																											-webkit-text-stroke-width: 1px;
																											font-size:5rem;">
											About Us
											</h2>
										</div>
											
										<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
											<a href="menu.php" class="flex-c-m stext-101 cl0 size-101  bor1 hov-btn1 p-lr-15 trans-04" style="background-color:#e0518f">
												Buy Now
											</a>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>


            
                
   <!-- index ki js -->
  <!--===============================================================================================-->	
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/index/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/index/main.js"></script>
          

<?php
    require_once("footer.php");
?>