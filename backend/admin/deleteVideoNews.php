<?php
  include 'layouts/header.php';
  $newsId=$_GET['ref'];
  $news = selectNewsFromId($conn,$newsId);
  
  unlink('../newsVideos/'.$news['news_video']);
  unlink('../videoImage/'.$news['news_featuredimage']);
  	
  if(deleteNews($conn, $newsId)){
  	
    showMsg('Video News Deleted Successfully');
    redirection('manageVideoNews.php');
  } 