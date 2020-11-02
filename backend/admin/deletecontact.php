<?php
  include 'layouts/header.php';
  $contactId=$_GET['ref'];
  if(deleteContact($conn, $contactId)){
    showMsg('Contact Deleted Successfully');
    redirection('viewContact.php');
  }