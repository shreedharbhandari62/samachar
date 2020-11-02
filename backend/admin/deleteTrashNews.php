<?php
include 'layouts/header.php';
$ref=$_GET['ref'];
if(deleteTrashNewsFromTrash($conn,$ref)){
    redirection('manageTrash.php');
}
?>