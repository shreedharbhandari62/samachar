<?php
  include 'layouts/header.php';
  $newsId=$_GET['ref'];
  $data=selectNewsFromId($conn,$newsId);
  insertNewsIntoTrash($conn,$data,$newsId);
  if(deleteNews($conn, $newsId)){
    showMsg('News Deleted Successfully');
    redirection('manageNews.php');
  } 