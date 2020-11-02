<?php
    session_start();
    $msg='';
    include '../app/call.php';
    if(checkAdminLogin()){
    redirection('index.php');
    }
    if(isset($_POST['loginbtn'])){
    $admin_username=$_POST['admin_username'];
    $admin_password=md5($_POST['admin_password']);
    $stmtLogin=$conn->prepare("SELECT * FROM tbladmin WHERE admin_username=:admin_username AND admin_password=:admin_password");
    $stmtLogin->bindParam(':admin_username', $admin_username);
    $stmtLogin->bindParam('admin_password', $admin_password);
    $stmtLogin->setFetchMode(PDO:: FETCH_ASSOC);
    if($stmtLogin->execute()){
        if($stmtLogin->rowcount()>0){
            $adminInfo= $stmtLogin->fetch();
            $_SESSION['admin'] ['username']=$adminInfo['admin_username'];
            $_SESSION['admin'] ['status']=$adminInfo['is_active'];
            $_SESSION['admin'] ['fname']=$adminInfo['admin_fname'];
            $_SESSION['admin'] ['lastname']=$adminInfo['admin_lname'];
            $_SESSION['admin'] ['password']=$adminInfo['admin_password'];
            
             redirection('index.php');
        }
        else {
            $msg="Invalid email or password";
        }
        
    }
 }
?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="index.html">
            <img class="center" alt="logo" src="img/admin-login-png-5.png" width="160px!important" height="20px!important">
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>
        <div class="metro double-size green">
            <form method="POST">
                <div class="input-append lock-input">
                    <input type="text" name="admin_username" required placeholder="Username">
                </div>
            
        </div>
        <div class="metro double-size yellow">
            <form action="index.html">
                <div class="input-append lock-input">
                    <input type="password" name="admin_password" required class="" placeholder="Password">
                </div>
            
        </div>
        <div class="metro single-size terques login">
            
                <button type="submit" name="loginbtn" class="btn login-btn">
                    Login
                    <i class=" icon-long-arrow-right"></i>
                </button>
                <h6 style="color:red; font-size:20px; text-align:center;"><b><?php echo $msg;?></b></h6> 
            </form>
        </div>
        
    </div>
</body>
<!-- END BODY -->
</html>