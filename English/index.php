
<?php
include "layouts/header.php"
?>
<html>
    <head>
        <title>Himalaya Print</title>
    </head>
</html>

	<!-- Headline -->
	<div class="container" >
		
		<nav aria-label="breadcrumb" >
			  <ol class="breadcrumb" style="margin-left:-120px;width:115%;height: 45px">
			    <strong><li class="breadcrumb-item active" aria-current="page"><span style="font-size:15px;color:black;padding-right:20px;padding-left:100px;margin-top:5px ">TRENDING NOW : </span></li></strong>
			    <?php 					$trendings=GetTrendingTopicsEnglish($conn);
			                            //dump($adminUsers);
			                            foreach ($trendings as $key => $trending){ ?>
			    <a href="searchResult.php?ref=<?php echo $trending['trending_topic'];?>"><li class="breadcrumb-item active" aria-current="page"><span style="font-size:15px;color:black;padding-right:24px;margin-top:5px">#<?php echo $trending['trending_topic']; ?> </span></li></a>
				<?php }  ?>
				<form method="POST" action="searchResult.php">
			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6" style="width:120px!important;height:30px!important;margin-top:-3px">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" name="searchBtn">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
			</form>
			  </ol> 
		</nav>
	</div>
		 

	<div  style="width:95%">
		<?php
								$area = 'front_page';
								$specificArea = 'first_top';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
					<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<center><a href="#"><img loading="lazy" width="95%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt="" ></a></center>
				<?php } 
					$specificArea = 'second_top';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					foreach($advertisement1 as $key){
				?>
				<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<center><a href="#"><img loading="lazy" width="95%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt="" ></a></center>
				<?php } ?>
	</div>

	<?php
	$bannerNews=GetLatestThreeBannerNewsEnglish($conn);
	// print_r($bannerNews);
	?>

<?php 
 $specificAreaBannerArray = ["first_banner","second_banner","third_banner"];
 $specificAreaBannerArrayCount = 0;
 // echo '<br>'.$specificAreaBannerArray[0];
foreach($bannerNews as $key){ ?>
<?php
$encryptedURL=encryptionFunction($key['news_id']); 
?>
	<a href="newsDetail.php?ref=<?php echo $encryptedURL;?>">
	<center>	<div  style="background-color: rgba(0,0,0,.06);width:95%;border-bottom:2px #027ab5 solid;border-top:2px #027ab5 solid;border-radius:20px;padding-top:15px">
				<div>
				<h2 style="color:#027ab5;font-size:40px;"><strong><center>
					<?php echo $key['news_title']; ?></center></strong></h2>
				</div>
				<div>
				<span style="color:black;font-size:20px;"><strong><center><?php echo $key['news_writtenby']; ?></center></strong></span>
				</div>
				<figure> <img loading="lazy" id="bannerImage" width="90%" height="500px" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-bottom:5px #027ab5 solid;"> </figure> 
				<p>
				<strong style="color:black">
				<?php
				$FullNews=$key['news_deails'];
				$removingTags=strip_tags($FullNews);
                $subStrNews= substr($removingTags,0,400);
				echo '<span style="color:grey">'.$subStrNews.'</span>';
				echo '<span style="color:grey">.....<br> Read more</span><br><br>';
                ?>
              
            
				 </strong></p>

				
	</div></center>
	</a>
	<br>
	<center><div style="width:95%">
					
					<?php 

					$specificArea = $specificAreaBannerArray[$specificAreaBannerArrayCount];
					$specificAreaBannerArrayCount++;
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					foreach($advertisement1 as $key){
				?>
											<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img loading="lazy" width="95%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } ?>
				
	</div></center>
	
	<br>
<?php }?>
	

<br><br>

	<!-- Feature post -->
	<center><div style="background-color:#027ab5;color: white;border-radius: 15px;width:200px;height:50px;font-size:20px;text-align:center;padding-top:11px"><strong>Latest News</strong></div><br></center>
	<?php
	$latestNewsDetails=GetLatestNewsEnglish($conn);
	// print_r($latestNewsDetails);
	?>
<center>	<section class="bg0" style="width:95%">
		<div >
		<?php foreach($latestNewsDetails as $key){
			$encryptedURL=encryptionFunction($key['news_id']); 
			?>
			<div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
						<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									<?php echo $key['news_title']; ?>
								</a>
							</h3>

							
						</div>
					</div>
				</div>
<?php } ?>



<?php 
$secondLastNews=GetSecondLastNewsEnglish($conn); 
// print_r($secondLastNews);
foreach($secondLastNews as $key){
	$encryptedURL=encryptionFunction($key['news_id']); 
?>
				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
								<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
									

									<h3 class="how1-child2 m-t-14">
										<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
											<?php echo $key['news_title']; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
						<?php } ?>



<?php $thirdLastNews=GetThirdLastNewsEnglish($conn);
foreach($thirdLastNews as $key){
// print_r($thirdLastNews);
$encryptedURL=encryptionFunction($key['news_id']); 
?>
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
								<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									

									<h3 class="how1-child2 m-t-14">
										<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											<?php echo $key['news_title']; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
						<?php } ?>
						
<?php 
$forthLastNews=GetForthLastNewsEnglish($conn);
// print_r($forthLastNews);
foreach($forthLastNews as $key){
	$encryptedURL=encryptionFunction($key['news_id']); 
?>
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
								<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									

									<h3 class="how1-child2 m-t-14">
										<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo $key['news_title']; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section></center>

	<!-- Post -->
	<section class="bg0 p-t-70" style="width:95%;margin-left:35px">
		<div>
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<?php 
 						
						$getallcategory=selectAllCategoryEnglish($conn);
						foreach($getallcategory as $key){
						?>
						

<!-- ADVERTESMENT ABOVE ALL CATEGORY NAME -->
<?php 
						$areaPurposeOfCategory ='front_page';
						
						if ($key['category_name']=='National') {
							$specificArea = 'देश';
						}if ($key['category_name']=='Politics') {
							$specificArea = 'राजनिती';
						}if ($key['category_name']=='Economy') {
							$specificArea = 'अर्थतन्त्र';
						}if ($key['category_name']=='Opinion') {
							$specificArea = 'बिचार';
						}if ($key['category_name']=='Diplomacy') {
							$specificArea = 'कूटनीति';
						}if ($key['category_name']=='Security') {
							$specificArea = 'सुरक्षा';
						}if ($key['category_name']=='Climate and environment') {
							$specificArea = 'जलवायु तथा वातावरण';
						}if ($key['category_name']=='Science and technology') {
							$specificArea = 'विज्ञान तथा प्रविधि';
						}if ($key['category_name']=='International') {
							$specificArea = 'अन्तर्राष्ट्रिय';
						}if ($key['category_name']=='Law and judiciary') {
							$specificArea = 'कानून तथा न्यायपालिका';
						}if ($key['category_name']=='Others') {
							$specificArea = 'अन्य';
						}
						// if (strcasecmp($specificArea, 'कूटनीति')=='-192') {
						// 	$specificArea = 'कूटनीति';
						// }
						
											
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$areaPurposeOfCategory,$specificArea) ;

								
								foreach($advertisement1 as $key1){
									
									?>
<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div  style="border:1px black solid;width:95% ">
							<a href="#">
								<img loading="lazy" width="100%" src="../backend/advertisementImage/<?php echo $key1['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php  }	?>
						<br>
<!-- ADVERTESMENT ABOVE ALL CATEGORY NAME END -->



						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl0 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h1 class="f1-m-2 cl19 tab01-title" style="font-size:30px; color:#027ab5!important;">
									<?php echo $key['category_name']; ?>
								</h1>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									
									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>
								<?php 
								$encryptedURL=encryptionFunction($key['category_id']); 
									?>

								<!--  -->
								<a href="category-02.php?ref=<?php echo $encryptedURL; ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								<br>
							<!-- Tab panes -->
							<div class="card-group"> 
										<?php
							
									$getNews=getNewsByCategoryIDEnglish($conn,$key['category_id']);
									// print_r($getNews);
									foreach($getNews as $key){
										$encryptedURL=encryptionFunction($key['news_id']);
									?>
									<div class="col-sm-4">
												  <div class="card" id="grow" style="margin:3px;border-radius:20px">
												  	<a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												    <img loading="lazy" id="cardImage" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="...">
												</a>
												    <div class="card-body">
												      <h5><a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $key['news_title']; ?></a></h5>
												      <p class="card-text"><small class="text-muted"><?php echo 'Written By:'. $key['news_writtenby']; ?><br/>
															<?php $datetime = $key['created_at']; 
															$time_elapsed = timeAgo($datetime);
															echo $time_elapsed;?></small></p>
												    </div>
													</div>
												  </div>
												  <?php } ?>
										</div>
										
						</div>
						<?php } ?>
						
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!--  -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									<span>Popular News</span>
								</h3>
							</div>
							<?php 
							$latestNewsDetails=GetLatestThreeNewsEnglish($conn);
							?>
							<ul class="p-t-35">
								<?php foreach ($latestNewsDetails as $latestNewsDetail ) {
									$imageName = $latestNewsDetail['news_featuredimage'];
									$encryptedURL=encryptionFunction($latestNewsDetail['news_id']);

								?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">

										<img loading="lazy" src="../backend/newsFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $latestNewsDetail['news_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php $categoryNames=getCategoryNameByCategoryIdEnglish($conn,$latestNewsDetail['category_id']); 
                                $categoryName = implode("", $categoryNames);  ?>
												<?php echo $categoryName; ?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												<?php $datetime = $latestNewsDetail['created_at']; 

										
												$time_elapsed = timeAgo($datetime);
												echo $time_elapsed;
												

												?>
												
											</span>
										</span>
									</div>
								</li>
								<?php
							}?>
							</ul>
						</div> 
				
						
				<div>
						<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0"></script>

<div class="fb-page" data-href="https://www.facebook.com/tpole020/" data-tabs="timeline" data-width="400" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/tpole020/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tpole020/">Himalaya Print</a></blockquote></div>
		</div>			
<br/>



<div class="tabForE" style="width:100%!important">
<button class="tablinks" id="defaultOpen" onclick="openRate(event, 'Rashifal')">Horoscope</button>
  <button class="tablinks" onclick="openRate(event, 'exchange')">Exchange Rate</button>
  <button class="tablinks" onclick="openRate(event, 'GSRate')">Gold/Silver Rate</button>
  <button class="tablinks" onclick="openRate(event, 'calender')">Calender</button>
</div>


<div id="Rashifal" class="tabcontent">
<iframe loading="lazy" src="https://www.ashesh.com.np/rashifal/widget.php?header_title=Nepali Rashifal&header_color=f0b03f&api=371150j499" frameborder="0" scrolling="yes" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:400px; border-radius:5px;" allowtransparency="true">
</iframe><br><span style="color:gray; font-size:8px; text-align:left">© <a href="https://www.ashesh.com.np/rashifal/" title="Nepali horoscope" target="_top" style="text-decoration:none; color:gray;">Nepali horoscope</a></span>
</div>

<div id="exchange" class="tabcontent">
<iframe loading="lazy" src="https://www.ashesh.com.np/forex/widget2.php?api=381152j011" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:400px; border-radius:5px;" allowtransparency="true">
</iframe><br><span style="text-align:left">© <a href="https://www.ashesh.com.np/forex/" title="Foreign Exchange Rates for Nepalese Rupee" target="_top" style="text-decoration:none;">Foreign Exchange Rates</a></span>
</div>

<div id="GSRate" class="tabcontent">
<iframe loading="lazy" src="https://www.ashesh.com.np/gold/widget.php?api=371150j463&header_color=0077e5" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:400px; border-radius:5px;" allowtransparency="true">
</iframe><br><span style="text-align:left">© <a href="https://www.ashesh.com.np/gold/" title="Gold & Silver Rates Nepal" target="_top" style="text-decoration:none;">Gold & Silver Rates Nepal</a></span>
</div>

<div id="calender" class="tabcontent">
<!-- Start of nepali calendar widget -->
<script type="text/javascript"> <!--
var nc_width = 'responsive';
var nc_height = 400;
var nc_api_id = 31620200513392; //-->
</script>
<script type="text/javascript" src="https://www.ashesh.com.np/calendarlink/nc.js"></script><div id="ncwidgetlink">Powered by © <a href="https://www.ashesh.com.np/nepali-calendar/" id="nclink" title="Nepali calendar" target="_blank">nepali calendar</a></div>
<!-- End of nepali calendar widget -->
</div>








           			

						<!-- Fisrt Side Advertisement -->
						<?php 
						$specificArea = 'first_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
								<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>

						<div style="height:400px;overflow-y:auto;border:3px #027ab5 solid;border-radius:20px">
						<!--<a class="twitter-timeline" href="https://twitter.com/sajhapost?ref_src=twsrc%5Etfw">Tweets by sajhapost</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>-->
						<a class="twitter-timeline" href="https://twitter.com/HimalayaPrint?ref_src=twsrc%5Etfw">Tweets by HimalayaPrint</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div>			

						<?php 
						$specificArea = 'second_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						
						<?php 
						$specificArea = 'third_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'fourth_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'fifth_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'sixth_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>

						<?php 
						$specificArea = 'seventh_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'eighth_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'nineth_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'tenth_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'eleventh_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						$specificArea = 'twelveth_side';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img loading="lazy" class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
					
						</div> 


					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Banner -->
	<?php $specificArea = 'first_bottom';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){ ?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
	<center><div  style="border:1px black solid;width:95%">
		<div style="width:100%">
			<a href="#" >
				
				<img loading="lazy" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" width="95%" alt="IMG"> 
			</a>
		</div>
	</div></center>
	<?php } ?>

	<!-- Latest videos And HP Special-->
<section class="bg0 p-t-60 p-b-35" style="width:95%;margin-left:35px">
		<div>
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					









				<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl0 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h1 class="f1-m-2 cl19 tab01-title" style="font-size:30px; color:#027ab5!important;">
									<?php
									$data=getHPSpecialNewsEnglish($conn);
									// print_r($data);
									echo '<span>HP- विशेष</span>'; ?>
								</h1>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									
									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>
								<?php 
								foreach($data as $key){
								$encryptedURL=encryptionFunction($key['subcategory_id']); 
								// print_r ($key['subcategory_id']);
							}
									?>

								<!--  -->
								<a href="subCategoryViewAll.php?ref=<?php echo 'Isw='; ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								<br>
							<!-- Tab panes -->
							<div class="card-group"> 
										<?php
							foreach($data as $key){
									$encryptedNewsUrl=encryptionFunction($key['news_id']);
									?>
									<div class="col-sm-4">
												  <div class="card" id="grow" style="margin:3px;border-radius:20px">
												  	<a href="newsDetail.php?ref=<?php echo $encryptedNewsUrl;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												    <img loading="lazy" id="cardImage" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="...">
												</a>
												    <div class="card-body">
												      <h5><a href="newsDetail.php?ref=<?php echo $encryptedNewsUrl;?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $key['news_title']; ?></a></h5>
												      <p class="card-text"><small class="text-muted"><?php echo 'Written By:'. $key['news_writtenby']; ?><br/>
															<?php $datetime = $key['created_at']; 
															$time_elapsed = timeAgo($datetime);
															echo $time_elapsed;?></small></p>
												    </div>
													</div>
												  </div>
							<!-- php close here --><?php } ?>
										</div>
										
						</div>
						




























				<section style="width:95%">
	<div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							<span>Video News</span>
						</h3>
						<?php
						$videoInfo=getVideoNewsSubCategoryIdEnglish($conn);
						
						$encryptedSubcategoryURL=encryptionFunction($videoInfo['subcategory_id']);
						?>
						<a href="subCategoryViewAll.php?ref=<?php echo $encryptedSubcategoryURL ?>"  class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
						<span >
									View all
								</span>	
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
								  
					</div>
		<div class="card-group">
		
		<?php
								$newsVideo = getAVideoNewsEnglish($conn);
								// dump($newsVideo);
								foreach ($newsVideo as $key => $value) {
									$videoName=$value['news_video'];
									$encryptedURL=encryptionFunction($value['news_id']);
									//  echo $value['news_featuredimage'];
								$encryptedSubcategoryURL=encryptionFunction($value['subcategory_id']);
								?>
 										 
									<div class="col-sm-6">
												  <div class="card" style="margin:3px;border-radius:20px">
												  	<a href="videoNewsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												    <!-- <img id="cardImage" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="..."> -->
													<video width="100%" height="100%" poster="../backend/videoImage/<?php echo $value['news_featuredimage'] ?>" controls>
                                      <source src="../backend/newsVideos/<?php echo $videoName; ?>" type="video/mp4">
                                      <!-- <source src="movie.ogg" type="video/ogg"> -->
                                    Your browser does not support the video tag.
                                    </video>
												</a>
												    <div class="card-body">
												      <h5><a href="videoNewsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $value['news_title']; ?></a></h5>
												       <p class="card-text"><small class="text-muted"><?php echo 'Written By:'. $value['news_writtenby']; ?><br/>
													   <?php $datetime = $value['created_at']; 
															$time_elapsed = timeAgo($datetime);
															echo $time_elapsed;?></small></p>
												    </div>
													</div>
												  </div>
								<!-- php close here --><?php } ?>
										</div>
	
		
	</section>



















					<!-- previously latest article -->
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!-- Video -->
						
							
						<!-- Subscribe -->
						
						
						<!-- Tag -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									<span>Tags</span>
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
							<?php $result=getSubCategoriesDetailsEnglish($conn);
// print_r($result);
foreach($result as $key){
	$encryptedURL=encryptionFunction($key['subcategory_id']);
?>
								<a href="subCategoryViewAll.php?ref=<?php echo $encryptedURL; ?>" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									<?php echo $key['subcategory_name']; ?>
								</a>
								<?php } ?>
							</div>	
							
						</div>

						
					</div>
				</div>
			</div>
		</div> 
	</section>

	<!-- Footer -->
	<?php
	include "layouts/footer.php";
	?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- TAB SCRIPT -->
	<script>
function openRate(evt, Name) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(Name).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>




<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
