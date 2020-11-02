<?php include 'layouts/header.php'; 
  

  
?>

   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <?php include'layouts/sidebar.php'; ?>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Add News
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Video</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Add Video
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
           



            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN  widget-->
                    <div class="widget yellow">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add Video</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                            <form method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Heading/Title</label>
                                <div class="controls">
                                    <input type="text" class="span6 " required name="news_title" />
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">News Category</label>
                                <div class="controls">
                                    <input type="text" class="span6" readonly value ="अन्य"  name="category_name" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">News Subcategory</label>
                                <div class="controls">
                                    <input type="text" class="span6" readonly value ="फोटो - भिडियो" name="subcategory_name" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Writer</label>
                                <div class="controls">
                                    <input type="text" class="span6 " required  name="news_writtenby" />
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Video Thumbnail</label>
                                <div class="controls">
                                    <input type="file" class="span6"   name="news_featuredimage" accept="image/png, image/jpeg, image/gif"/>                              
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">News Video</label>
                                <div class="controls">
                                    <input type="file" class="span6" required name="news_video"  accept="video/mp4" />                              
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">News Details</label>
                                <div class="controls">
                                    <textarea class="span12 ckeditor"  name="news_deails" rows="6"></textarea>
                                 </div>                               
                            </div>    
                            <div class="control-group">
                                <label class="control-label"> Status</label>
                                <div class="controls">
                                    <select required data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" name="is_active" id="selCSI">
                                        <option value="">Select</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Top Video</label>
                                <div class="controls">
                                    <select required data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" name="top_news" id="selCSI">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>       
                             <div class="form-actions">
                                <button class="btn btn-success" name="addVideo" type="submit">Add Video</button>
                                <a href="manageVideoNews.php" class="btn btn-xs btn-danger"> Cancel </a>
                            </div>   
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END EXTRAS widget-->
                </div>
            </div>



            

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <!-- <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script> -->
   <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- <script src="js/jquery.blockui.js"></script> -->

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="assets/chart-master/Chart.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="js/easy-pie-chart.js"></script>
   <script src="js/sparkline-chart.js"></script>
   <script src="js/home-page-calender.js"></script>
   <script src="js/home-chartjs.js"></script>

   <!-- END JAVASCRIPTS -->   

   <!--script for this page-->
   <script src="js/form-component.js"></script>
</body>
<!-- END BODY -->
</html>
<?php
if(isset($_POST['addVideo'])){

    $fileName1 = $_FILES['news_featuredimage']['name'];
    $tmp_name1=$_FILES['news_featuredimage']['tmp_name'];
    $fileExt1 = explode('.', $fileName1);
    $fileActualExt1 = strtolower(end($fileExt1));
    $fileNameNew1 = uniqid('',true).".".$fileActualExt1;
    $path='../videoImage/'.$fileNameNew1;
 
    move_uploaded_file($tmp_name1, $path);


    $name = $_FILES['news_video']['name'];
    $type = explode('.',$name);
    $type = end($type);
    $size= $_FILES['news_video']['size'];
    $random = rand()*rand()+rand();
    $tmp= $_FILES['news_video']['tmp_name'];
    $videoName = $random.'.'.$type;

   if($type !='mp4' && $type !='MP4' && $type !='flv')
   {
   $message ="Video Format Not Supported";
    }
   else
    {
    move_uploaded_file($tmp, '../newsVideos/'.$random.'.'.$type);
    }
if(insertNewsWithVideo($conn, $_POST, $fileNameNew1, $videoName)){
    echo '<script language="javascript">';
    echo '</script>';
    showMsg('Video Added Successfully');
    redirection('manageVideoNews.php');
    
}else{
    echo '<script language="javascript">';
    echo 'alert("Failed to create new Admin ")';
    echo '</script>';
}

}

?>