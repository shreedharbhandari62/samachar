<?php
  include 'layouts/header.php';
  $category_id=$_GET['ref'];
  if(deleteCategoryEnglish($conn, $category_id)){
    showMsg('Category Deleted Successfully');
    redirection('manageCategoryEnglish.php');
  }