<?php
  include 'layouts/header.php';
  $subcategory_id=$_GET['ref'];
  if(deleteSubCategory($conn, $subcategory_id)){
    showMsg('SubCategory Deleted Successfully');
    redirection('manageSubCategory.php');
  }