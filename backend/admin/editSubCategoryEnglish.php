<?php include 'layouts/header.php';
$categoryName=retriveCategoriesEnglish($conn);
$ref=$_GET['ref'];
$result=SelectSubCategoryDetailsFromIdEnglish($conn,$ref);
$categoryNameAndID=selectNameBYIDEnglish($conn,$result['category_id']);
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
                     Edit Subcatagory
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">English Sub-Catagory</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Update English Sub-Catagory
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
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Update sub-catagory Form </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form method="POST" class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label"> Catagory Name</label>
                                <div class="controls">
                                <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" onchange="fetchId(this.value)"  id="selCSI" readonly>
                                        <option value="<?php echo $categoryNameAndID['category_name']; ?>"><?php echo $categoryNameAndID['category_name']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category Id</label>
                                <div class="controls">
                                    <select name="category_id" id="categoryid" class="span6" readonly>
                                    <option value="<?php echo $categoryNameAndID['category_id']; ?>"><?php echo $categoryNameAndID['category_id']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sub-Category Name</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="subcategory_name" value="<?php echo $result['subcategory_name']; ?>"/>
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sub-Category Description</label>
                                <div class="controls">
                                <textarea name="subcategory_descrption" class="span6"><?php echo $result['subcategory_descrption']; ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Status</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" name="is_active" id="selCSI">
                                    <optgroup label="Select status">                        
                                                    <option <?php if($result['is_active']=='active')
                                                     echo 'selected="selected"'; ?>
                                                    value="active">Active</option>
                                                    <option <?php if($result['is_active']=='inactive')
                                                     echo 'selected="selected"'; ?>
                                                    value="inactive">Inactive</option>
                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" name="updateBtn">Update</button>
                                <a href="manageSubCategoryEnglish.php" class="btn btn-xs btn-danger"> Cancel </a>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
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
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>

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
</body>
<!-- END BODY -->
</html>
<?php
if(isset($_POST['updateBtn'])){
    if(UpdateSubCategoryEnglish($conn,$_POST,$ref)){
        
        redirection('manageSubCategoryEnglish.php');
    }else{
        echo '<script language="javascript">';
        echo 'alert("Failed to update SubCategory ")';
        echo '</script>';
    }

}
?>