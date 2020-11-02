<?php
include "layouts/header.php";
?>
<html>
    <head>
        <title>Himalaya Print</title>
    </head>
</html>

	<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.php" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					About Us
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>

	<!-- Page heading -->
	<div class="container p-t-4 p-b-35">
		<h2 class="f1-l-1 cl2">
			About Us
		</h2>
	</div>

	<!-- Content -->
	<section class="bg0 p-b-110">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						
						
						<p class="f1-s-11 cl6 p-b-25">
&quot;Every citizen has a right to information by constitutionally also citizen has a duty to aware wrongful
information. Every Journalist has right to live by constitutionally, also Every Journalist has a duty to follow
code of conduct by ethically.&quot;
-Himalaya Print						</p>

						<p class="f1-s-11 cl6 p-b-25">
<p><strong>Introduction:</strong></p>
<br/>

						  <p>  Himalaya Print (himalayaprint.com) is one of the leading digital media in
Nepal. It is available in Nepali and English language for readers convenient.
The online media is managed by Third Eye Multi-Media Pvt. Ltd. Our Company more info:</p>
<br/>
<p>Host Company Third Eye Multi-Media Pvt. Ltd,</p>
<p>Company address Kathmandu-29, Anmanagar</p>
<p>Company Certification/Date/</p>
<p>Company PAN/VAT No:</p>
<p>Contact 9800586527</p>
<p>Email Himalayaprint.com@gmail.com</p>
<p>Media Website Himalayaprint.com</p>
<p>Media Certification No/Date:</p>
<p>Media Certification Issued By Information Department	</p>
						</p>


<p class="f1-s-11 cl6 p-b-25">
    <p><strong>Objectives:</strong></p>
    <br/>
<p>- To provide reliable news/information among its readers within country and
across the globe.</p>
<p>- To establish fair Journalism through its unique principle and tools.</p>
<p>- To Contribute to the society from Journalism perspective. Make civilized
society through profession-based Journalism.</p>
<p>- To strictly reject any kind of wrongful power pressure.</p>
</p>

<p class="f1-s-11 cl6 p-b-25">
    <p><strong>Vision:</strong></p>
    <br/>
<p>- Our vision is to make highest knowledgeful society of 21th century.</p>

</p>
<p class="f1-s-11 cl6 p-b-25">
    <p><strong>Mission:</strong></p>
    <br/>
<p>- Our mission is to supportive/reach to highest knowledgeful society of
21th century through our independent Journalism.</p>

</p>


<p class="f1-s-11 cl6 p-b-25">
    <p><strong>Our Core Values:</strong></p>
    <br/>
<p>- Fair Journalism</p>
<p>- Independent</p>
<p>- Analytical</p>
<p>- Investigative</p>
<p>- Accuracy/responsibility</p>
</p>
						
						
					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-5 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-5">
						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Popular News
								</h3>
							</div>
							<?php
							$latestNewsDetails=GetLatestThreeNewsEnglish($conn);
							?>
							<ul class="p-t-35">
								<?php foreach ($latestNewsDetails as $latestNewsDetail ) {
									$imageName = $latestNewsDetail['news_featuredimage'];
								?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="newsDetail.php?ref=<?php echo $latestNewsDetail['news_id']; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">

										<img src="../backend/newsFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="newsDetail.php?ref=<?php echo $latestNewsDetail['news_id']; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $latestNewsDetail['news_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="newsDetail.php?ref=<?php echo $latestNewsDetail['news_id']; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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