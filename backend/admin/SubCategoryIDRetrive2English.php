
<?php
include '../app/call.php';

$subCategoryName=$_GET['subCategoryName'];
 
	
 $subCategoryId=subCategoryIdFetchByNameEnglish($conn,$subCategoryName);


if(isset($subCategoryId)){
    foreach($subCategoryId as $row => $value){
        foreach($value as $key){
        	echo "<option value=$key>$key</option>";            
        }
    }
    }


?>