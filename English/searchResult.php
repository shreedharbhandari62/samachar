<?php
include "layouts/header.php";
if(isset($_POST['searchBtn'])){
    $searchMsg=$_POST['search'];
    // print_r($_POST);
    $searchResult=RetriveAllNewsEnglish($conn);
    // print_r($searchResult);
}else{
	$ref=$_GET['ref'];
	$searchMsg=$ref;
	$searchResult=RetriveAllNewsEnglish($conn);

}
?>
<html>
    <head>
        <title>Himalaya Print</title>
    </head>
</html>

		
	<!-- Headline -->
	<center><div style="width:95%">
		<?php
								$area = 'search_resultpage';
								$specificArea = 'below_searchResultNavbarFirst';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img width="95%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_searchResultNavbarSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					foreach($advertisement1 as $key){
				?>
											<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img width="95%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } ?> 
	</div></center>	

	
		
	<!-- Feature post -->
	<section style="width:95%;margin-left:35px">
	<div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							<span>Search Result</span>
						</h3>
					</div>
		<div class="card-group">
 										 <?php foreach($searchResult as $key){ 
                    					if(preg_match("/{$searchMsg}/i", $key['news_title'])) {
                        // echo $key['news_id'];
                        					$selectNewsById=searchNewsByIDEnglish($conn,$key['news_id']);
                    						foreach($selectNewsById as $key){
											$encryptedURL=encryptionFunction($key['news_id']);
                    ?>
									<div class="col-sm-3">
												  <div class="card" id="grow" style="margin:3px;border-radius:20px">
												  	<a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												    <img id="cardImage" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="...">
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
												  <?php } } } ?>
										</div>
	
		
	</section>
	<!-- Advertisement -->

	<center><div style="width:95%">
		<hr>
		<?php
								
								$specificArea = 'below_searchResultNewsList';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img width="95%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_categoryTitleSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					
				?>
					
				
	</div></center>
	<!-- Post -->
	<section class="bg0 p-t-70" style="width:95%;margin-left:35px">
		<div >
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
						$specificArea = $key['category_name'];
						if (strcasecmp($specificArea, 'कूटनीति')=='-192') {
							$specificArea = 'कूटनीति';
						}
						
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$areaPurposeOfCategory,$specificArea) ;
								
								foreach($advertisement1 as $key1){?>
<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div  style="border:1px black solid;width:95%">
							<a href="#">
								<img width="100%" src="../backend/advertisementImage/<?php echo $key1['advertisement_image']; ?>" alt="IMG">
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
												  <div class="card" id="grow" style="margin:3px;border-radius:20px">
												  	<a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												    <img id="cardImage" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="...">
												</a>
												    <div class="card-body">
												      <h5><a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $key['news_title']; ?></a></h5>
												      <p class="card-text"><small class="text-muted"><?php echo 'Written By:'. $key['news_writtenby']; ?><br/>
															<?php $datetime = $key['created_at']; 
															$time_elapsed = timeAgo($datetime);
															echo $time_elapsed;?></small></p>
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

										<img src="../backend/newsFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
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
												<?php echo $latestNewsDetail['created_at']; ?>
											</span>
										</span>
									</div>
								</li>
								<?php
							}?>
							</ul>
						</div>
							<!-- Advertisement  -->
						<div class="container">
		<?php
								
								$specificArea = 'below_searchResultFirstSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_categoryTitleSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					
				?>
					
				
				</div>
						
						
						<!--  -->
						<div class="p-t-50">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									<span>Stay Connected</span>
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
										<span class="fab fa-facebook-f"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											6879 Fans
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Like
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
										<span class="fab fa-twitter"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											568 Followers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Follow
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
										<span class="fab fa-youtube"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5039 Subscribers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Subscribe
										</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="container">
						<?php
								
								$specificArea = 'below_searchResultSecondSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
							<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?>
						</div>
						<br>
						<div class="container">
						<?php
								
								$specificArea = 'below_searchResultThirdSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
							<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?>
						</div>
						<br>
						<div class="container">
						<?php
								
								$specificArea = 'below_searchResultFourthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
							<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?>
						</div>
						<br>
						<div class="container">
						<?php
								
								$specificArea = 'below_searchResultFifthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
							<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?>
						</div>
						<br>
						<div class="container">
						<?php
								
								$specificArea = 'below_searchResultSixthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
							<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Advertisement -->
	<center><div style="width:95%">
		<hr>
		<?php
								
								$specificArea = 'above_searchResultFooter';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  width="95%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_categoryTitleSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					
				?>
					
				
	</div></center>


	<!-- Latest -->


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

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

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