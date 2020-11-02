<?php
include 'layouts/header.php';
$ref=$_GET['ref'];
$data=getDeletedNewsByID($conn,$ref);
if(restoreDeletedNewsEnglish($conn,$data)){
    deleteTrashNewsFromTrashNotPhoto($conn,$ref);
    redirection('manageNewsEnglish.php');
}
?>