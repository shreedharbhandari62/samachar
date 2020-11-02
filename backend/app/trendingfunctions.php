<?php

function insertTrending($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tbltrending (`trending_topic`,`trending_rank`,`is_active`) VALUES (:trending_topic, :trending_rank, :is_active)");   

    $stmtinsert->bindParam(':trending_topic', $data['trending_topic']);
    $stmtinsert->bindParam(':trending_rank', $data['trending_rank']);
    $stmtinsert->bindParam(':is_active', $data['is_active']); 

	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function updateTrending($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tbltrending SET trending_topic=:trending_topic, trending_rank=:trending_rank, is_active=:is_active WHERE trending_id=:trending_id");

    $stmtupdate->bindParam(':trending_topic', $data['trending_topic']);
    $stmtupdate->bindParam(':trending_rank', $data['trending_rank']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':trending_id', $ref);

    if ($stmtupdate->execute()) {
        return true;
    }else{
        return false;
    }
}


function getAllTrending($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbltrending ORDER BY trending_id DESC");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function selectTrendingFromId($conn,$trendingId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbltrending WHERE trending_id=:trending_id");
    $stmtSelect->bindParam(':trending_id',$trendingId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}

function deleteTrending($conn, $trendingId){
    $stmtdelete=$conn->prepare("DELETE FROM tbltrending WHERE trending_id=:trending_id");
    $stmtdelete->bindParam(':trending_id', $trendingId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
function GetTrendingTopics($conn){
    $value="active";
    $stmtSelect = $conn->prepare("SELECT * FROM tbltrending WHERE is_active=:is_active ORDER BY trending_rank LIMIT 10");
    $stmtSelect->bindParam(':is_active',$value);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}



// English Trending
function insertTrendingEnglish($conn, $data){
    $stmtinsert=$conn->prepare("INSERT INTO tbltrendingenglish (`trending_topic`,`trending_rank`,`is_active`) VALUES (:trending_topic, :trending_rank, :is_active)");   

    $stmtinsert->bindParam(':trending_topic', $data['trending_topic']);
    $stmtinsert->bindParam(':trending_rank', $data['trending_rank']);
    $stmtinsert->bindParam(':is_active', $data['is_active']); 

    if ($stmtinsert->execute()) {
        return true;
    }
    return false;
}

function updateTrendingEnglish($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tbltrendingenglish SET trending_topic=:trending_topic, trending_rank=:trending_rank, is_active=:is_active WHERE trending_id=:trending_id");

    $stmtupdate->bindParam(':trending_topic', $data['trending_topic']);
    $stmtupdate->bindParam(':trending_rank', $data['trending_rank']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':trending_id', $ref);

    if ($stmtupdate->execute()) {
        return true;
    }else{
        return false;
    }
}


function getAllTrendingEnglish($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbltrendingenglish ORDER BY trending_id DESC");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function selectTrendingFromIdEnglish($conn,$trendingId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbltrendingenglish WHERE trending_id=:trending_id");
    $stmtSelect->bindParam(':trending_id',$trendingId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}

function deleteTrendingEnglish($conn, $trendingId){
    $stmtdelete=$conn->prepare("DELETE FROM tbltrendingenglish WHERE trending_id=:trending_id");
    $stmtdelete->bindParam(':trending_id', $trendingId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
function GetTrendingTopicsEnglish($conn){
    $value="active";
    $stmtSelect = $conn->prepare("SELECT * FROM tbltrendingenglish WHERE is_active=:is_active ORDER BY trending_rank LIMIT 10");
    $stmtSelect->bindParam(':is_active',$value);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
