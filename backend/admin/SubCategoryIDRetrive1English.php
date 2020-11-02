<?php
session_start();
include '../app/call.php';


$categoryName = $_POST['categoryName'];
$optionText='<option value="">Select Subcategory</option>';
$categoryId=subCategoryIdFetch1English($conn,$categoryName);
$abc = implode("", $categoryId);
$subcategories = getSubCategoriesByCategoryIdEnglish($conn, $abc);

if($subcategories)
{		
	foreach ($subcategories as $key => $subcategory) 
	{
		$optionText.= '<option value="'.$subcategory['subcategory_name'].'">'.$subcategory['subcategory_name'].'</option>';
	}

	echo $optionText;
}

else
{
	echo $optionText=0;
}
?>