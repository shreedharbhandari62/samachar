<!DOCTYPE html>
<html lang="en">
<head>
	<!--<title>Himalaya Print</title>-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--===============================================================================================-->	   
	<link rel="icon" type="image/png" href="images/icons/himalaya.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/custom.css">
<!--===============================================================================================-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!-- TOGGLE BUTTON  -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<style type="text/css">
@media screen and (min-width: 768px){
  .dropdown:hover .dropdown-menu, .btn-group:hover .dropdown-menu{
        display: block;
        
    }
    .dropdown-menu{
        margin-top: 0;
    }
    .dropdown-toggle{
        margin-bottom: 2px;
    }
    .navbar .dropdown-toggle, .nav-tabs .dropdown-toggle{
        margin-bottom: 0;
    }
}
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $(".dropdown, .btn-group").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
        }
    });
});     
</script>
<!--===============================================================================================-->
<!-- FONT AWSOME ICON CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="animsition">

	<?php
	include '../backend/app/call.php';
	$categoryList=selectAllCategoryEnglish($conn);

	$advertisementImageBelowFirstParaName='';
	$advertisement_banner=selectAllAdvertisement($conn);
	 //dump($advertisement_banner);


	foreach($advertisement_banner as $key => $value){		
 		$date_expiry = $value['advertisement_expiry_date'];
 		$date_today = date("Y-m-d");
 		if ($date_expiry==$date_today || $date_expiry < $date_today) {
 			$advertisement_id =  $value['advertisement_id'];
 			deleteAdvertisement($conn, $advertisement_id);
 		}
	}
	?>

	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="topbar">
				<div class="content-topbar container h-100">
					<div class="left-topbar" style="margin-left:-100px!important">
						<span class="left-topbar-item flex-wr-s-c">
							<span style="padding-top: 5px;">
<iframe src="https://free.timeanddate.com/clock/i7ak3wia/n117/fn6/fcfff/tct/pct/ftb/tt0/tw1/th2/tb1" frameborder="0" width="263" height="19" allowTransparency="true"></iframe>
										&ensp;

							</span>
						</span>
						<!--<a href="contact.php" class="left-topbar-item" style="color:white;font-size:15px">-->
						<!--Contact &ensp;-->
						<!--</a>-->
						<a href="converter.php" class="left-topbar-item" style="color:white;font-size:15px">
						Preeti - Unicode
						</a>
						

						
					</div>

					<div class="right-topbar" style="margin-right: -100px!important">
						<a href="https://www.facebook.com/tpole020/" target="_blank">
							
							<img loading="lazy" src="images/icons/facebook.png" id="grow" style="width:10%"/>
						</a>

						<a href="https://twitter.com/HimalayaPrint" target="_blank">
							
							<img loading="lazy" src="images/icons/twitter.png" id="grow" style="width:10%"/>
						</a>

						<a href="#">
							
							<img loading="lazy" src="images/icons/google+.png" id="grow" style="width:10%"/>
						</a>

						<a href="#">
							
							<img loading="lazy" src="images/icons/instaresizeimage.png" id="grow" style="width:10%"/>
						</a>

						<a href="#">
							
							<img loading="lazy" src="images/icons/utube.png" id="grow" style="width:10%"/>
						</a>
					</div>
				</div>
			</div>
 
			












<!-- MENU FOR MOBILE DEVICE -->










			<div class="wrap-header-mobile">
				<!-- Logo moblie -->		
				<div class="logo-mobile">
				<a href="/English"><img loading="lazy"  src="images/icons/imageedit_1_4387854561.png" alt="LOGO"></a>
				</div>

				<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>

			<!-- Menu Mobile -->
			<div class="menu-mobile">
				<ul class="topbar-mobile">
					<li class="left-topbar">
					<span class="left-topbar-item flex-wr-s-c">
							<span>
									<span style="padding-top: 5px;">
<iframe src="https://free.timeanddate.com/clock/i7ak3wia/n117/fn6/fcfff/tct/pct/ftb/tt0/tw1/th2/tb1" frameborder="0" width="263" height="19" allowTransparency="true"></iframe>
											&ensp;
							</span>
							</span>
						</span>

						<!--<a href="about.php" class="left-topbar-item" style="color:white;font-size:15px;font-weight: bold;margin-left:-20px!important">-->
						<!--About Us-->
						<!--</a>-->

						<!--<a href="contact.php" class="left-topbar-item" style="color:white;font-size:15px;font-weight: bold;">-->
						<!--Contact-->
						<!--</a>-->
						<a href="converter.php" class="left-topbar-item" style="color:white;font-size:15px;font-weight: bold;">
						Preeti - Unicode
						</a>
					</li>

					

					<li class="right-topbar">
					<a href="https://www.facebook.com/tpole020/" target="_blank">
							
							<img loading="lazy" src="images/icons/facebook.png" id="grow" style="width:10%"/>
						</a>

						<a href="https://twitter.com/HimalayaPrint" target="_blank">
							
							<img loading="lazy" src="images/icons/twitter.png" id="grow" style="width:10%"/>
						</a>

						<a href="#">
							
							<img loading="lazy" src="images/icons/google+.png" id="grow" style="width:10%"/>
						</a>

						<a href="#">
							
							<img loading="lazy" src="images/icons/instaresizeimage.png" id="grow" style="width:10%"/>
						</a>

						<a href="#">
							
							<img loading="lazy" src="images/icons/utube.png" id="grow" style="width:10%"/>
						</a>
					</li>
				</ul>








				<ul class="main-menu-m" style="background-color:#222222!important;">
				<?php foreach($categoryList as $key){
								 ?>
								<?php
$encryptedURL=encryptionFunction($key['category_id']); 
?>
					
					<li style="background-color:#222222!important;">
						<a href="category-02.php?ref=<?php echo $encryptedURL;  ?>" style="font-size:17px; font-weight: bold; color:white;font-family:Ek Mukta,Arial,Helvetica,san-serif;"><?php echo $key['category_name'];?></a>
						
						<ul class="sub-menu-m">
						<?php 
									$subcategoryList=selectSubcategoryFromCategoryIdEnglish($conn,$key['category_id']);
									foreach($subcategoryList as $key){
										
											$encryptedURL=encryptionFunction($key['subcategory_id']); 
									?>
							<li><a href="subCategoryViewAll.php?ref=<?php echo $encryptedURL ?>" style="font-size:17px; color:black;font-weight: bold;font-family:Ek Mukta,Arial,Helvetica,san-serif"><?php echo $key['subcategory_name']; ?></a></li>
							<?php }  ?>
						</ul>

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>
											
					<?php }?>
					<li style="background-color:#222222!important;">
					<a href="../" target="_blank" ><span style="color:white!important;font-weight:bold">Nepali</span></a></strong>
					</li>
					<li style="background-color:#222222!important;">
					<button class="blackThem" style="color:white!important;font-weight:bold;margin-left:15px"><input type="checkbox" checked data-toggle="toggle" data-on="Dark" data-off="Dark" data-onstyle="secondary" data-offstyle="secondary"></button>
					</li>
					<li style="background-color:#222222!important;">
					<button class="whiteThem" style="color:white!important;font-weight:bold;margin-left:15px;display:none"> <input type="checkbox" checked data-toggle="toggle" data-on="Light" data-off="Dark" data-onstyle="secondary" data-offstyle="secondary"></button>
					</li>
				</ul>






			</div>











<!-- MENU FOR MOBILE DEVICE END -->

















			
			
			









			<div class="wrap-logo" style="margin-left:50px">
				<!-- Logo desktop -->		
				<div class="logo">
				<a href="/English"><img loading="lazy" style="width:100%;height:100%" src="images/icons/imageedit_1_4387854561.png"  alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				<div class="banner-header" style="margin-right:50px">
				<?php
								$area = 'header';
								$specificArea = 'header';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
										

								
								<a href="#"><img loading="lazy" width="100%" height="100%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>

							  <?php } ?>				
				 </div>
				 
			</div>	



					<!-- Menu desktop -->
					
						<a class="logo-stick" href="index.html">
							<img loading="lazy" src="images/icons/imageedit_1_4387854561.png" alt="LOGO">
						</a>
					 

						
						<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#222222!important;height: 45px;">
							
  								<a class="navbar-brand" href="/English"><i style="padding-left:20px !important;color:white"; class="fas fa-home"></i></a>
  						
  						<div class="collapse navbar-collapse" id="navbarNavDropdown">
    						<ul class="navbar-nav" style="padding-left:10px";>
							<?php foreach($categoryList as $key){
								 ?>
								<?php
$encryptedURL=encryptionFunction($key['category_id']);  
?>
								 <li class="nav-item dropdown" onclick="location.href='category-02.php?ref=<?php echo $encryptedURL;  ?>';">
        						<a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="category-02.php?ref=<?php echo $encryptedURL;  ?>" style="font-size:12px; color:white;font-family:Ek Mukta,Arial,Helvetica,san-serif">
								<?php echo $key['category_name'];?>
        							</a>
							
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<?php 
									$subcategoryList=selectSubcategoryFromCategoryIdEnglish($conn,$key['category_id']);
									foreach($subcategoryList as $key){
									
											$encryptedURL=encryptionFunction($key['subcategory_id']); 
									?>
									<a class="dropdown-item" href="subCategoryViewAll.php?ref=<?php echo $encryptedURL ?>" style="font-size:14px; color:black;font-family:Ek Mukta,Arial,Helvetica,san-serif"><?php echo $key['subcategory_name']; ?></a>
										<?php }  ?>
										</div>

							</li>
										<?php }?>

							
						</ul>
						<strong><a href="../" target="_blank" class="moen ml-3"><span style="color:white!important;font-weight:bold">Nepali</span></a></strong>
						<button class="blackThem" style="color:white!important;font-weight:bold;margin-left:15px"><input type="checkbox" checked data-toggle="toggle" data-on="Dark Mode" data-off="Dark Mode" data-onstyle="secondary" data-offstyle="secondary"></button>
						<button class="whiteThem" style="color:white!important;font-weight:bold;margin-left:15px;display:none"> <input type="checkbox" checked data-toggle="toggle" data-on="Light" data-off="Dark Mode" data-onstyle="secondary" data-offstyle="secondary"></button>

					</nav>
				</div>
			</div>	
		</div>

		<script> 
            // $('#GFG_UP').text("Click on button to change the background color"); 
            $('.blackThem').on('click', function() { 
                $('html').css('background', '#2d2e2d');
				$('body').css('background', '#2d2e2d'); 
				$('section').css('background', '#2d2e2d'); 
				$('breadcrumb').css('background', '#2d2e2d');
				$('.breadcrumb').css('background', '#2d2e2d');
				// News Details bredcrum class
				$('.headline').css('background', '#2d2e2d');
				$('blockquote').css('background','grey');
				
				
				$('input').css('background', '#2d2e2d');
				$('.card-body').css('background', '#2d2e2d');
				// $('nav').css('background', 'black');
				$('.dropdown-menu').css('background', '#2d2e2d');

				$('.sub-menu-m').css('background', 'black');
				
				
				$('echo').css('color', 'white');
				$('span').css('color', 'white'); 
				$('a').css('color', '#d1d1cf');
				$('.f1-s-11 cl6 p-b-25').css('color', 'white');
				$('p').css('color', 'white');
				$('.cl2').css('color', 'white');
			    
				$('.blackThem').hide(); 
				$('.whiteThem').show(); 
            }); 

			$('.whiteThem').on('click', function() { 
				
				location.reload();				
				$('.whiteThem').hide();
				$('.blackThem').show();  
            });  
        </script>  



	</header>
