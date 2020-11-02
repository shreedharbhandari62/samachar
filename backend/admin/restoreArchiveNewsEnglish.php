<?php
include 'layouts/header.php';
$ref=$_GET['ref'];
$data=selectNewsArchiveId($conn,$ref);
if(restoreArchivedNewsEnglish($conn,$data)){
    removeFromArchive($conn,$ref);
    redirection('manageArchiveNews.php');
}
?>