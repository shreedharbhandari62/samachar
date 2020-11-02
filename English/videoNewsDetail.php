<?php
include 'layouts/header.php';
$ref=$_GET['ref'];
$decryptURL=decryptionFunction($ref);

$result=selectNewsFromIdEnglish($conn,$decryptURL);
$categoryID=$result['category_id'];



$news_visit=$result['news_visit'];



$news_visit=(int)$news_visit + 1 ;
UpdateNewsVisitPageEnglish($conn,$news_visit,$decryptURL);

?>
<html>
    <head>
        <title>Himalaya Print</title>
    </head>
</html>


	

	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10" style="width:95%;margin-left:35px">
		<div>
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<?php $categoryNames=getCategoryNameByCategoryIdEnglish($conn,$result['category_id']); 
                                $categoryName = implode("", $categoryNames);  ?>
						<div class="p-b-70">
							<!-- <a href="#" class="f1-l-3 cl2 hov-cl10 trans-03 text-uppercase">
								<?php 

								echo $categoryName; ?>
							</a> -->

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								<?php echo $result['news_title']; ?>
							</h3>
							
							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										by <?php echo $result['news_writtenby']; ?>
									</a>

									<span class="m-rl-3">-</span>

									<span>
										<?php $datetime = $result['created_at']; 

										
										$time_elapsed = timeAgo($datetime);
										echo $time_elapsed;
										

										?>
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									<?php echo $news_visit; ?> Views
								</span>

								
							</div>

						<?php	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						// echo $actual_link;
						?>


													

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eb93c9cdd0ff66d"></script>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_inline_share_toolbox"></div>
						



							<?php
								$area = 'news_detailpage';
								$specificArea = 'below_newsTitle';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
								<div style="width:100%;border:1px black solid">
						
								<a href="#"><img width="100%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
							  <center>
							<div class="wrap-pic-max-w p-b-30">
								<?php 

								$videoName = $result['news_video'];
								?>
								<video width="100%" poster="../backend/videoImage/<?php echo $result['news_featuredimage'] ?>" height="450" controls>
                                      <source src="../backend/newsVideos/<?php echo $videoName; ?>" type="video/mp4">
                                      <!-- <source src="movie.ogg" type="video/ogg"> -->
                                    Your browser does not support the video tag.
                                </video>
                                    
                            </div>
                            </center>

							<?php
								$area = 'news_detailpage';
								$specificArea = 'below_newsPhoto';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
								<div style="width:100%;border:1px black solid">
						
								<a href="#"><img width="100%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>

							<p class="f1-s-11 cl6 p-b-25" style="font-size:18px;">
								
								<?php 
								
								$area = 'news_detailpage';
								$specificArea = 'below_newsFirstPara';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;

								$string = $result['news_deails'];

								function Search($search, $string){ 
								    $position = strpos($string, $search, 0);   
								    if (is_numeric($position)){ 
								        return  $position; 
								    } 
								    else{ 
								        return "Not Found"; 
								    } 
								} 
								  
								// Driver Code 
								$search = "\n"; 
								$position = Search($search, $string);
								foreach($advertisement1 as $key){
								$image =$key['advertisement_image']; 
								
								
								$advertisementImageBelowFirstParaName="<br><img  src='../backend/advertisementImage/$image'

								 alt='Below News Advertisement' width='100%'height='90px' >";
								}
								//$string = 'very '; 

								echo substr_replace( $string, $advertisementImageBelowFirstParaName."<hr>", $position , 0);
 								?>
							
							</p>	
							
							<?php
								$area = 'news_detailpage';
								$specificArea = 'below_newsLastPara';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
								<div style="width:100%;border:1px black solid">
						
								<a href="#"><img width="100%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
							

							
						</div>
						<?php
								$area = 'news_detailpage';
								$specificArea = 'above_newsComment';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
								<div style="height:90px;width:100%;border:1px black solid">
						
								<a href="#"><img width="100%" height="100%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
						
						
						
						


<!-- FB COMMENT FROM HERE -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>

<?php	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						// echo $actual_link;
						?>

<div class="fb-comments" data-href="<?php echo $actual_link; ?>" data-numposts="5" data-width=""></div>
<!-- FB COMMENT ENDS HERE -->




<center><section class="bg0">
	<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
								<span>अन्य<span>
								</h3>
							</div>
				<div class="card-group">
										<?php
 										 $category=getAllNewsByCategoryIdEnglish($conn,$categoryID);
									// print_r($category);
												 foreach($category as $key){ 
											$encryptedURL=encryptionFunction($key['news_id']);
											$Subdetail = SelectSubCategoryDetailsFromIdEnglish($conn,$key['subcategory_id']);
											
									?>
									<div class="col-sm-4">
												  <div class="card" id="grow" style="margin:3px;border-radius:20px">
												  	<?php if($key['subcategory_id']=='76'){
												  		$videoName =$key['news_video'];
													
												?>
												  	<a href="videoNewsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												  		<video width="auto" height="250" poster="../backend/videoImage/<?php echo $key['news_featuredimage'] ?>" controls class="card-img-top">
                                      <source src="../backend/newsVideos/<?php echo $videoName; ?>" type="video/mp4">
                                      <!-- <source src="movie.ogg" type="video/ogg"> -->
                                    Your browser does not support the video tag.
                                    </video>
												    <!-- <img id="cardImage" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="..."> -->
												</a>
												    <div class="card-body">
												      <h5><a href="videoNewsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $key['news_title']; ?></a>
												      	</h5>
												      	<?php }else{


												      		?>
												      		<a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >

												    <img id="cardImage" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="...">
												</a>
												    <div class="card-body">
												      <h5><a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $key['news_title']; ?></a>

												      <?php	} ?></h5>
												       <p class="card-text"><small class="text-muted"><?php echo 'Written By:'. $key['news_writtenby']; ?><br/>
															<?php $datetime = $key['created_at']; 
															$time_elapsed = timeAgo($datetime);
															echo $time_elapsed;?></small></p>
												    </div>
												  </div>
												  </div>
												  <?php } ?>
										</div>
										
	</section></center>




					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">

												
						
						<!-- Side Advertisement -->
						<?php 
						
						$specificArea = 'below_newsFirstSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						
						$specificArea = 'below_newsSecondSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>

						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									<span>Popular News</span>
								</h3>
							</div>
							<?php
							$latestNewsDetails=GetLatestThreeNewsEnglish($conn);
							
							
								# code...
							
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
												<?php  

												$comdatetime = $latestNewsDetail['created_at'];
												$time_elapsed = timeAgo($comdatetime);
												echo $time_elapsed;?>
											</span>
										</span>
									</div>
								</li>
								<?php
							}?>
							</ul>
						</div>
						<?php 

						$specificArea = 'below_newsThirdSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 

						$specificArea = 'below_newsFourthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>

						<!-- Tag -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									<span>Tags</span>
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
							<?php $result=getSubCategoriesDetailsEnglish($conn);
							foreach($result as $key){
								$encryptedURL=encryptionFunction($key['subcategory_id']);
							?>
								<a href="subCategoryViewAll.php?ref=<?php echo $encryptedURL; ?>" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									<?php echo $key['subcategory_name']; ?>
								</a>
								<?php } ?>
							</div>								
						</div>
						<!-- Side Advertisement -->
						<?php 

						$specificArea = 'below_newsFifthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 

						$specificArea = 'below_newsSixthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 

						$specificArea = 'below_newsSeventhSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
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

