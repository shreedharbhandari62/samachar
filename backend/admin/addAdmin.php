<?php include 'layouts/header.php'; ?>
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
                     Add Admin
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Admin</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Add Admin
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
                            <h4><i class="icon-reorder"></i> Add Admin Form </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form  method="POST" id="signup" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <input type="text" class="span6" id="admin_fname" name="admin_fname" />
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                    <div class="fname-error error"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" class="span6" id="admin_lname" name="admin_lname" />
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                    <div class="lname-error error"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
                                    <input type="text" class="span6" id="admin_username" name="admin_username"/>
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                    <div class="username-error error"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" class="span6" id="admin_password" name="admin_password"/>
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                    <div class="password-error error"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm Password</label>
                                <div class="controls">
                                    <input type="password" class="span6" id="admin_confirmpassword" name="admin_confirmpassword"/>
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                    <div class="confirmpassword-error error"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="email" class="span6 " name="admin_email" id="admin_email" />
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                    <div class="email-error error"></div>
                                </div>
                            </div>                           
                            <div class="control-group">
                                <label class="control-label">Phone no</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="admin_phone" id="admin_phone"/>
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                    <div class="phone-error error"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Status</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" required class=" chzn-select-deselect span6" tabindex="-1" name="is_active" id="selCSI">
                                        <option value="">Select</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="control-group">
                                <label class="control-label">Textarea</label>
                                <div class="controls">
                                    <textarea class="span6 " rows="3"></textarea>
                                </div>
                            </div> -->
                            <div class="form-actions">
                                <button type="submit" id="submit" class="btn btn-success" name="submitBtn">Submit</button>
                                <a href="manageAdmin.php" class="btn btn-xs btn-danger"> Cancel </a>
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
// if(isset($_POST['submitBtn'])){
// // print_r($_POST);
// if(insertAdminUser($conn, $_POST)){
//     echo '<script language="javascript">';
//     echo '</script>';
//     showMsg('User Created Successfully');
//     redirection('manageAdmin.php');
    
// }else{
//     echo '<script language="javascript">';
//     echo 'alert("Failed to create new Admin ")';
//     echo '</script>';
// }

// }

?>
<script type="text/javascript">
$(document).ready(function(){
	var admin_fname="";
	var admin_lname="";
  var admin_username="";
  var admin_password="";
  var admin_confirmpassword="";
	var admin_email="";
  var admin_phone="";

	var name_reg = /^[a-z]+$/i;
	var username_reg = /^[a-z]+[0-9a-zA-Z_.]*$/;
  var password_reg = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;
	var email_reg = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
  var phone_reg =/^[0-9]{10}$/;

	$('#admin_fname').focusout(function(){
		var store = $("#admin_fname").val();
		if (store.length=="") {
			$(".fname-error").html("First Name is required!");
			$("#admin_fname").addClass("border-red");
			$("#admin_fname").removeClass("border-green");
			admin_fname="";
		}else if(name_reg.test(store)){
			$(".fname-error").html("");
			$("#admin_fname").addClass("border-green");
      $("#admin_fname").removeClass("border-red");
			admin_fname = store;


		}else{
			$(".fname-error").html("Intergers, Spaces or Special Symbols are not allowed!");
			$("#admin_fname").addClass("border-red");
			$("#admin_fname").removeClass("border-green");
			admin_fname="";
		}

	})
	$('#admin_lname').focusout(function(){
		var store = $("#admin_lname").val();
		if (store.length=="") {
			$(".lname-error").html("Last Name is required!");
			$("#admin_lname").addClass("border-red");
			$("#admin_lname").removeClass("border-green");
			admin_lname="";
		}else if(name_reg.test(store)){
			$(".lname-error").html("");
			$("#admin_lname").addClass("border-green");
      $("#admin_lname").removeClass("border-red");
			admin_lname = store;
		}else{
			$(".lname-error").html("Intergers, Spaces or Special Symbols are not allowed!");
			$("#admin_lname").addClass("border-red");
			$("#admin_lname").removeClass("border-green");
			admin_lname="";
		}
	})

  $('#admin_password').focusout(function(){
    var store = $("#admin_password").val();
    if (store.length=="") {
      $(".password-error").html("Password is required!");
      $("#admin_password").addClass("border-red");
      $("#admin_password").removeClass("border-green");
      admin_password="";
    }else if(password_reg.test(store)){
      $(".password-error").html("<div class='text-success'><i class='fa fa-check-circle'></i>Strong Password!</div>");
      $("#admin_password").addClass("border-green");
      admin_password = store;
    }else{
      $(".password-error").html("8 characters or longer. Should contain at least one:Capital letter, small letter, number");
      $("#admin_password").addClass("border-red");
      $("#admin_password").removeClass("border-green");
      admin_password="";
    }
  })

  $('#admin_confirmpassword').focusout(function(){
    var store = $("#admin_confirmpassword").val();
    if (store.length=="") {
      $(".confirmpassword-error").html("Confirm Password is required!");
      $("#admin_confirmpassword").addClass("border-red");
      $("#admin_confirmpassword").removeClass("border-green");
      admin_confirmpassword="";
    }else if(admin_password!=store){
      $(".confirmpassword-error").html("Passwords donot match!!");
      $("#admin_confirmpassword").addClass("border-red");
      $("#admin_confirmpassword").removeClass("border-green");
      admin_confirmpassword="";

    }else{
      $(".confirmpassword-error").html("");
      $("#admin_confirmpassword").addClass("border-green");
      $("#admin_confirmpassword").removeClass("border-red");
      admin_confirmpassword = store;
    }
  })

  $('#admin_username').focusout(function(){
    var store = $.trim($("#admin_username").val());
    if (store.length=="") {
      $(".username-error").html("Username is required!");
      $("#admin_username").addClass("border-red");
      $("#admin_username").removeClass("border-green");
      admin_username="";
    }else if(username_reg.test(store)){
      console.log(store);
      $.ajax({
        type : 'POST',
        url : 'validations.php',
        dataType : 'JSON',
        beforeSend : function(){
          $(".username-error").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
        },
        data : {'check_username':store },
        success : function(feedback){
          console.log(feedback['error']);
          if(feedback['error'] =='username_success'){
            $(".username-error").html("<div class='text-success'><i class='fa fa-check-circle'></i>Username Available!</div>");
            $("#admin_username").addClass("border-green");
            $("#admin_username").removeClass("border-red");
            admin_username = store;
          }else if(feedback['error'] =='username_fail' ){
            $(".username-error").html("Username Already Exixts!");
            $("#admin_username").addClass("border-red");
            $("#admin_username").removeClass("border-green");
            admin_username = "";
          }
        }
      })      
    }else{
      $(".username-error").html("Invalid Username Format!");
      $("#admin_username").addClass("border-red");
      $("#admin_username").removeClass("border-green");
      admin_username="";
    }

  })

	$('#admin_email').focusout(function(){
		var store = $.trim($("#admin_email").val());
		if (store.length=="") {
			$(".email-error").html("Email is required!");
			$("#admin_email").addClass("border-red");
			$("#admin_email").removeClass("border-green");
			admin_email="";
		}else if(email_reg.test(store)){
			
			$.ajax({
				type : 'POST',
				url : 'validations.php',
				dataType : 'JSON',
        beforeSend : function(){
          $(".email-error").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
        },
				data : {'check_email':store },
				success : function(feedback){
          console.log(feedback['error']);
					if(feedback['error'] =='email_success'){
						$(".email-error").html("<div class='text-success'><i class='fa fa-check-circle'></i>Email Available!</div>");
            $("#admin_email").addClass("border-green");
            $("#admin_email").removeClass("border-red");
            admin_email = store;
					}else if(feedback['error'] =='email_fail' ){
						$(".email-error").html("Email Already Exixts!");
            $("#admin_email").addClass("border-red");
            $("#admin_email").removeClass("border-green");
            admin_email = "";
					}
				}
			})			
		}else{
			$(".email-error").html("Invalid Email Format!");
			$("#admin_email").addClass("border-red");
			$("#admin_email").removeClass("border-green");
			admin_email="";
		}
	})

  $('#admin_phone').focusout(function(){
    var store = $("#admin_phone").val();
    if (store.length=="") {
      $(".phone-error").html("Phone No is required!");
      $("#admin_phone").addClass("border-red");
      $("#admin_phone").removeClass("border-green");
      admin_phone="";
    }else if(phone_reg.test(store)){
      $(".phone-error").html("");
      $("#admin_phone").addClass("border-green");
      $("#admin_phone").removeClass("border-red");
      admin_phone = store;
    }else{
      $(".phone-error").html("Should Have exactly 10 numbers and no letters!");
      $("#admin_phone").addClass("border-red");
      $("#admin_phone").removeClass("border-green");
      admin_phone="";
    }

  })
 
    
  $('#submit').click(function(){
    if (admin_fname.length == "") {
      $(".fname-error").html("First Name is required!");
      $("#admin_fname").addClass("border-red");
      $("#admin_fname").removeClass("border-green");
    }

    if (admin_lname.length == "") {
      $(".lname-error").html("Last Name is required!");
      $("#admin_lname").addClass("border-red");
      $("#admin_lname").removeClass("border-green");

    }
    if (admin_username.length == "") {
      $(".username-error").html("Username is required!");
      $("#admin_username").addClass("border-red");
      $("#admin_username").removeClass("border-green");
      
    }
    if (admin_password.length == "") {
      $(".password-error").html("Password is required!");
      $("#admin_password").addClass("border-red");
      $("#admin_password").removeClass("border-green");
      
    }
    if (admin_confirmpassword.length == "") {
      $(".confirmpassword-error").html("Confirm Password is required!");
      $("#admin_confirmpassword").addClass("border-red");
      $("#admin_confirmpassword").removeClass("border-green");
    }
    if (admin_email.length == "") {
      $(".email-error").html("Email is required!");
      $("#admin_email").addClass("border-red");
      $("#admin_email").removeClass("border-green");
      
    }
    if (admin_phone.length == "") {
      $(".phone-error").html("Phone no is required!");
      $("#admin_phone").addClass("border-red");
      $("#admin_phone").removeClass("border-green");
    }
    if (admin_fname.length != "" && admin_lname.length != "" && admin_username.length != "" && admin_password.length != "" && admin_confirmpassword.length != "" && admin_email.length != "" && admin_phone.length != "") {
      $.ajax({
        type : 'POST',
        url : 'validations.php?signup=true',
        data : $("#signup").serialize(),
        success : function(feedback){
          window.location.href="manageAdmin.php";   
        }
      })
    }
  })
})


</script>
