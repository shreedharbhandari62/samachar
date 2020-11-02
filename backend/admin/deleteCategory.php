<?php
  include 'layouts/header.php';
  $category_id=$_GET['ref'];
  if(deleteCategory($conn, $category_id)){
    showMsg('Category Deleted Successfully');
    redirection('manageCatagory.php');
  }