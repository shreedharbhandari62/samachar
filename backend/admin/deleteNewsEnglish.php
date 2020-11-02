<?php
  include 'layouts/header.php';
  $newsId=$_GET['ref'];
  $data=selectNewsFromIdEnglish($conn,$newsId);
  insertNewsIntoTrash($conn,$data,$newsId);
  if(deleteNewsEnglish($conn, $newsId)){
    showMsg('News Deleted Successfully');
    redirection('manageNewsEnglish.php');
  } 