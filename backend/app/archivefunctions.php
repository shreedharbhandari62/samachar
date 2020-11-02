<?php

function insertToArchive($conn){
    $stmtinsert=$conn->prepare("INSERT INTO tblarchive (news_id, news_writtenby, news_writerImage, news_title, category_id, subcategory_id, is_bannerNews, news_deails, news_image, news_featuredimage, created_at, is_active, top_news, news_visit, news_video, news_language) 
    	SELECT news_id, news_writtenby, news_writerImage, news_title, category_id, subcategory_id, is_bannerNews, news_deails, news_image, news_featuredimage, created_at, is_active, top_news,news_visit, news_video, news_language
    	FROM tblnews 
    	WHERE created_at < DATE_SUB(curdate(), INTERVAL 30 DAY)");
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function deleteNewsToArchive($conn){
    $stmtdelete=$conn->prepare("DELETE FROM tblnews 
    	WHERE created_at < DATE_SUB(curdate(), INTERVAL 30 DAY)");
    
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}

function getAllArchiveNewsDetails($conn){
    
    $stmtSelect = $conn->prepare("SELECT * FROM tblarchive ORDER BY archive_id DESC");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
} 

function selectNewsArchiveId($conn,$archiveId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblarchive WHERE archive_id=:archive_id");
    $stmtSelect->bindParam(':archive_id',$archiveId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}

function deleteArchiveNews($conn, $archiveId){
    $news = selectNewsArchiveId($conn,$archiveId);
    if ($news['news_video']=='') {
     	   
		     
           unlink('../newsImage/'.$news['news_image']);
           unlink('../newsFeaturedImage/'.$news['news_featuredimage']);
		                
		     
		   
		    if (!unlink('../newsWriterImage/'.$news['news_writerImage'])) {  
		        echo ("file_pointer cannot be deleted due to an error");  
		    }  
		    else {  
		        echo ("file_pointer has been deleted");  
		    }
	}else{
		unlink('../newsVideos/'.$news['news_video']);
		unlink('../videoImage/'.$news['news_featuredimage']);
	}
    $stmtdelete=$conn->prepare("DELETE FROM tblarchive WHERE archive_id=:archive_id");
    $stmtdelete->bindParam(':archive_id', $archiveId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}

function restoreArchivedNews($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tblnews (`news_title`,`news_writtenby`,`category_id`,`subcategory_id`,`is_bannerNews`,`news_deails`,`news_image`,`news_featuredimage`,`is_active`,`top_news`,`news_writerImage`,`news_video`) VALUES (:news_title, :news_writtenby, :category_id, :subcategory_id, :is_bannerNews, :news_deails, :news_image, :news_featuredimage, :is_active, :top_news, :news_writerImage, :news_video)");
	$stmtinsert->bindParam(':news_title', $data['news_title']);
    $stmtinsert->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtinsert->bindParam(':category_id', $data['category_id']);
    $stmtinsert->bindParam(':subcategory_id', $data['subcategory_id']);
    $stmtinsert->bindParam(':is_bannerNews', $data['is_bannerNews']);
    $stmtinsert->bindParam(':news_deails', $data['news_deails']);
    $stmtinsert->bindParam(':news_image', $data['news_image']);
    $stmtinsert->bindParam(':news_featuredimage', $data['news_featuredimage']);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_news', $data['top_news']);
    $stmtinsert->bindParam(':news_writerImage', $data['news_writerImage']);
    $stmtinsert->bindParam(':news_video', $data['news_video']);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function removeFromArchive($conn, $archiveId){
    
    $stmtdelete=$conn->prepare("DELETE FROM tblarchive WHERE archive_id=:archive_id");
    $stmtdelete->bindParam(':archive_id', $archiveId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}



// English Archive


function insertToArchiveEnglish($conn){
    $stmtinsert=$conn->prepare("INSERT INTO tblarchive (news_id, news_writtenby, news_writerImage, news_title, category_id, subcategory_id, is_bannerNews, news_deails, news_image, news_featuredimage, created_at, is_active, top_news, news_visit, news_video, news_language) 
        SELECT news_id, news_writtenby, news_writerImage, news_title, category_id, subcategory_id, is_bannerNews, news_deails, news_image, news_featuredimage, created_at, is_active, top_news,news_visit, news_video, news_language
        FROM tblnewsenglish 
        WHERE created_at < DATE_SUB(curdate(), INTERVAL 30 DAY)");
    
    if ($stmtinsert->execute()) {
        return true;
    }
    return false;
}

function deleteNewsToArchiveEnglish($conn){
    $stmtdelete=$conn->prepare("DELETE FROM tblnewsenglish 
        WHERE created_at < DATE_SUB(curdate(), INTERVAL 30 DAY)");
    
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}






function restoreArchivedNewsEnglish($conn, $data){
    $stmtinsert=$conn->prepare("INSERT INTO tblnewsenglish (`news_title`,`news_writtenby`,`category_id`,`subcategory_id`,`is_bannerNews`,`news_deails`,`news_image`,`news_featuredimage`,`is_active`,`top_news`,`news_writerImage`,`news_video`) VALUES (:news_title, :news_writtenby, :category_id, :subcategory_id, :is_bannerNews, :news_deails, :news_image, :news_featuredimage, :is_active, :top_news, :news_writerImage, :news_video)");
    $stmtinsert->bindParam(':news_title', $data['news_title']);
    $stmtinsert->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtinsert->bindParam(':category_id', $data['category_id']);
    $stmtinsert->bindParam(':subcategory_id', $data['subcategory_id']);
    $stmtinsert->bindParam(':is_bannerNews', $data['is_bannerNews']);
    $stmtinsert->bindParam(':news_deails', $data['news_deails']);
    $stmtinsert->bindParam(':news_image', $data['news_image']);
    $stmtinsert->bindParam(':news_featuredimage', $data['news_featuredimage']);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_news', $data['top_news']);
    $stmtinsert->bindParam(':news_writerImage', $data['news_writerImage']);
    $stmtinsert->bindParam(':news_video', $data['news_video']);
    
    if ($stmtinsert->execute()) {
        return true;
    }
    return false;
}

