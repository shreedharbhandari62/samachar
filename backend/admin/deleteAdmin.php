<?php
  include 'layouts/header.php';
  $admin_id=$_GET['ref'];
  if(deleteAdminUser($conn, $admin_id)){
    showMsg('User Deleted Successfully');
    redirection('manageAdmin.php');
  }