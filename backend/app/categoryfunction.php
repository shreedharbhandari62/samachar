<?php
// Nepali Functions
function insertCategory($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tblcategory (`category_name`,`category_descrption`,`is_active`) VALUES (:category_name, :category_descrption,:is_active)");

	$stmtinsert->bindParam(':category_name', $data['category_name']);
    $stmtinsert->bindParam(':category_descrption', $data['category_descrption']);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false; 
}
function updateCategory($conn, $data){
	$stmtupdate=$conn->prepare("UPDATE tblcategory SET category_name=:category_name, category_descrption=:category_descrption, is_active=:is_active WHERE category_id=:category_id");

	$stmtupdate->bindParam(':category_name', $data['category_name']);
	$stmtupdate->bindParam(':category_descrption', $data['category_descrption']);
	$stmtupdate->bindParam(':is_active', $data['is_active']);
	$stmtupdate->bindParam(':category_id', $data['category_id']);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}
function getAllCategories($conn){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcategory");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function getCategoryById($conn, $categoryid){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcategory where category_id=:category_id");
 	$stmtSelect->bindParam(':category_id',$categoryid);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}
function deleteCategory($conn, $categoryId){
	$stmtdelete=$conn->prepare("DELETE FROM tblcategory WHERE category_id=:category_id");
	$stmtdelete->bindParam(':category_id', $categoryId);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}


// English functions
function insertCategoryEnglish($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tblcategoryenglish (`category_name`,`category_descrption`,`is_active`) VALUES (:category_name, :category_descrption,:is_active)");

	$stmtinsert->bindParam(':category_name', $data['category_name']);
    $stmtinsert->bindParam(':category_descrption', $data['category_descrption']);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false; 
}
function updateCategoryEnglish($conn, $data){
	$stmtupdate=$conn->prepare("UPDATE tblcategoryenglish SET category_name=:category_name, category_descrption=:category_descrption, is_active=:is_active WHERE category_id=:category_id");

	$stmtupdate->bindParam(':category_name', $data['category_name']);
	$stmtupdate->bindParam(':category_descrption', $data['category_descrption']);
	$stmtupdate->bindParam(':is_active', $data['is_active']);
	$stmtupdate->bindParam(':category_id', $data['category_id']);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}
function getAllCategoriesEnglish($conn){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcategoryenglish");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function getCategoryByIdEnglish($conn, $categoryid){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcategoryenglish where category_id=:category_id");
 	$stmtSelect->bindParam(':category_id',$categoryid);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}
function deleteCategoryEnglish($conn, $categoryId){
	$stmtdelete=$conn->prepare("DELETE FROM tblcategoryenglish WHERE category_id=:category_id");
	$stmtdelete->bindParam(':category_id', $categoryId);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}
?>