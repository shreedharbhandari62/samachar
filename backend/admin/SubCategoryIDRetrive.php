<?php
include '../app/call.php';

$categoryName=$_GET['categoryName'];
 
	
 $categoryId=subCategoryIdFetch($conn,$categoryName);


if(isset($categoryId)){
    foreach($categoryId as $row => $value){
        foreach($value as $key){
        	echo "<option value=$key>$key</option>";
            
        }
    }
    }

?>