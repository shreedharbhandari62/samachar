<?php
  include 'layouts/header.php';
  $subcategory_id=$_GET['ref'];
  if(deleteSubCategoryEnglish($conn, $subcategory_id)){
    showMsg('SubCategory Deleted Successfully');
    redirection('manageSubCategoryEnglish.php');
  }