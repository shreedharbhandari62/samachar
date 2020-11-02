<?php
  include 'layouts/header.php';
  $trending_id=$_GET['ref'];
  if(deleteTrending($conn, $trending_id)){
    showMsg('Trending Topic Deleted Successfully');
    redirection('manageTrending.php');
  }