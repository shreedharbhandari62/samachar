<?php
  include 'layouts/header.php';
  $advertisement_id=$_GET['ref'];
  if(deleteAdvertisement($conn, $advertisement_id)){
    showMsg('Advertisement Deleted Successfully');
    redirection('manageAdvertisment.php');
  }