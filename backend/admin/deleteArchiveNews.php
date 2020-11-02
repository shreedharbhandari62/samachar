<?php
  include 'layouts/header.php';
  $archiveId=$_GET['ref'];
  if(deleteArchiveNews($conn, $archiveId)){
    showMsg('News Deleted Successfully');
    redirection('manageArchiveNews.php');
  }