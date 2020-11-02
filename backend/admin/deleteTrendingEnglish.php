<?php
  include 'layouts/header.php';
  $trending_id=$_GET['ref'];
  if(deleteTrendingEnglish($conn, $trending_id)){
    showMsg('Trending Topic Deleted Successfully');
    redirection('manageTrendingEnglish.php');
  }