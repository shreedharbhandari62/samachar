<?php
  include 'layouts/header.php';
  $newsId=$_GET['ref'];
  $news = selectNewsFromIdEnglish($conn,$newsId);
  
  unlink('../newsVideos/'.$news['news_video']);
  unlink('../videoImage/'.$news['news_featuredimage']);
  	
  if(deleteNewsEnglish($conn, $newsId)){
  	
    showMsg('Video News Deleted Successfully');
    redirection('manageVideoNewsEnglish.php');
  } 