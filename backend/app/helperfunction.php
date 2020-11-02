<?php

function redirection($path){
 	echo '<script>window.location.href="'.$path.'";</script>';
}
function checkAdminLogin(){
	if(isset($_SESSION['admin'] ['username'])){
        return true;
    }
	else{
    	return false;
	}
}

 function dump($data){
 	echo "<pre>";
 	print_r($data);
 	echo "</pre>";
 }
 function showMsg($msg){
 	$_SESSION['msg']='<div class="alert alert-block alert-success">
									<button class="close" type="button" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>									
									<strong class="green">YAY!!!!										
									</strong>
									'.$msg.'
								</div>';
 }

 function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "Just Now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return $minutes." minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return $hours." hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return $days." days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return $weeks." weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return $months." months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return $years." years ago";
        }
    }
}
?>