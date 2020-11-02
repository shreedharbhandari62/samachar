<?php
function insertContact($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tblcontact (`name`,`email`,`website`,`message`) VALUES (:name, :email,:website,:message)");

	$stmtinsert->bindParam(':name', $data['name']);
	$stmtinsert->bindParam(':email', $data['email']);
	$stmtinsert->bindParam(':website', $data['website']);
	$stmtinsert->bindParam(':message', $data['message']);
	if ($stmtinsert->execute()) {
		return true;

	}
	return false; 
}
function getAllContacts($conn){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcontact");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function deleteContact($conn, $contactId){
	$stmtdelete=$conn->prepare("DELETE FROM tblcontact WHERE contact_id=:contact_id");
	$stmtdelete->bindParam(':contact_id', $contactId);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}
function selectContactFromId($conn,$contactID){
    $stmtSelect = $conn->prepare("SELECT * FROM tblcontact WHERE contact_id=:contact_id");
    $stmtSelect->bindParam(':contact_id',$contactID);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function updateContact($conn,$contactID){
	$value = 1;
	$stmtupdate=$conn->prepare("UPDATE tblcontact SET reply=:reply WHERE contact_id=:contact_id");

	$stmtupdate->bindParam(':reply', $value);
	
	
	$stmtupdate->bindParam(':contact_id', $contactID);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}