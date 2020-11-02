<?php

function insertAdvertisement($conn, $data, $fileNameNew1){
	$stmtinsert=$conn->prepare("INSERT INTO tbladvertisement (`advertisement_area`,`advertisement_specific_area`,`advertisement_name`,`advertisement_url`,`advertisement_image`,`advertisement_expiry_date`,`status`) VALUES (:advertisement_area, :advertisement_specific_area, :advertisement_name, :advertisement_url, :advertisement_image, :advertisement_expiry_date, :status)");
    
    $stmtinsert->bindParam(':advertisement_area', $data['advertisement_area']);
    $stmtinsert->bindParam(':advertisement_specific_area', $data['advertisement_specific_area']);
    $stmtinsert->bindParam(':advertisement_name', $data['advertisement_name']);
    $stmtinsert->bindParam(':advertisement_url', $data['advertisement_url']);
    $stmtinsert->bindParam(':advertisement_image', $fileNameNew1);
    $stmtinsert->bindParam(':advertisement_expiry_date', $data['advertisement_expiry_date']);
    $stmtinsert->bindParam(':status', $data['status']);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}
function selectAllAdvertisement($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbladvertisement ");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function getSpecificAreas($conn,$areaName){
    $stmtSelect = $conn->prepare("SELECT * FROM tbladvertisement WHERE advertisement_area=:advertisement_area");
    $stmtSelect->bindParam(':advertisement_area',$areaName);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function deleteAdvertisement($conn, $advertisement_id){
    $advertisement = selectAdvertisementFromId($conn,$advertisement_id);
    if(file_exists('../advertisementImage/'.$advertisement['advertisement_image'])){
        unlink('../advertisementImage/'.$advertisement['advertisement_image']);
    }
        
    $stmtdelete=$conn->prepare("DELETE FROM tbladvertisement WHERE advertisement_id=:advertisement_id");
    $stmtdelete->bindParam(':advertisement_id', $advertisement_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
function selectAllAdvertisementSpecificArea($conn,$area,$specificArea){
    $stmtSelect = $conn->prepare("SELECT advertisement_id,advertisement_category,advertisement_image,status,advertisement_expiry_date,advertisement_url FROM tbladvertisement WHERE advertisement_area=:advertisement_area AND advertisement_specific_area=:advertisement_specific_area");
    $stmtSelect->bindParam(':advertisement_area',$area);
    $stmtSelect->bindParam(':advertisement_specific_area',$specificArea);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function selectAdvertisementFromId($conn,$advertisementId){   
    $stmtSelect= $conn->prepare("SELECT * FROM tbladvertisement WHERE advertisement_id=:advertisement_id");
    $stmtSelect->bindParam(':advertisement_id',$advertisementId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function updateDateOfAdvertisement($conn, $data){

    $stmtupdate=$conn->prepare("UPDATE tbladvertisement SET advertisement_expiry_date=:advertisement_expiry_date, advertisement_url= :advertisement_url WHERE advertisement_id=:advertisement_id");

    $stmtupdate->bindParam(':advertisement_expiry_date', $data['advertisement_expiry_date']);
    $stmtupdate->bindParam(':advertisement_url', $data['advertisement_url']);
    $stmtupdate->bindParam(':advertisement_id', $data['advertisement_id']);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function alterEnumValues($conn){
    $stmtalter = $conn->prepare("ALTER TABLE tbladvertisement MODIFY COLUMN `advertisement_specific_area`
    ENUM('first_top','second_top','first_banner','second_banner','third_banner','देश','राजनिती','अर्थतन्त्र','बिचार','कूटनीति','सुरक्षा','जलवायु तथा वातावरण','विज्ञान तथा प्रविधि','अन्तर्राष्ट्रिय','कानून तथा न्यायपालिका','अन्य','first_side','second_side','third_side','fourth_side','fifth_side','sixth_side','seventh_side','eighth_side','nineth_side','tenth_side','eleventh_side','twelveth_side','first_bottom','below_categoryTitleFirst','below_categoryTitleSecond','below_categoryNewsFirstSide','below_categoryNewsSecondSide','below_categoryNewsThirdSide','below_categoryNewsFourthSide','below_categoryNewsFifthSide','below_categoryNewsSixthSide','below_categoryNewsList','above_categoryFooter','below_subcategoryTitleFirst','below_subcategoryTitleSecond','below_subcategoryNewsFirstSide','below_subcategoryNewsSecondSide','below_subcategoryNewsThirdSide','below_subcategoryNewsFourthSide','below_subcategoryNewsFifthSide','below_subcategoryNewsSixthSide','below_subcategoryNewsList','above_subcategoryFooter','below_searchResultNavbarFirst','below_searchResultNavbarSecond','below_searchResultFirstSide','below_searchResultSecondSide','below_searchResultThirdSide','below_searchResultFourthSide','below_searchResultFifthSide','below_searchResultSixthSide','below_searchResultNewsList','above_searchResultFooter','below_newsTitle','below_newsPhoto','below_newsFirstSide','below_newsSecondSide','below_newsThirdSide','below_newsFourthSide','below_newsFifthSide','below_newsSixthSide','below_newsSeventhSide','below_newsFirstPara','below_newsLastPara','above_newsComment')");
    if ($stmtalter->execute()) {
        return true;
    }
    return false;

}

?>