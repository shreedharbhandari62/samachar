<?php
function retriveSubCategories($conn){
    $stmtSelect = $conn->prepare("SELECT category_name FROM tblsubcategory");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function getSubCategoriesByCategoryId($conn,$categoryId){	
	$stmtSelect= $conn->prepare("SELECT * FROM tblsubcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$categoryId);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();

}
function subCategoryIdFetch1($conn,$categoryName){
    $stmtSelect = $conn->prepare("SELECT category_id FROM tblcategory WHERE category_name=:category_name");
    $stmtSelect->bindParam(':category_name',$categoryName);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}
function subCategoryIdFetchByName($conn,$subCategoryName){
	$stmtSelect = $conn->prepare("SELECT subcategory_id FROM tblsubcategory WHERE subcategory_name=:subcategory_name");
    $stmtSelect->bindParam(':subcategory_name',$subCategoryName);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function insertNews($conn, $data, $fileNameNew, $fileNameNew1, $fileNameNew2){
	$stmtinsert=$conn->prepare("INSERT INTO tblnews (`news_writtenby`,`news_writerImage`,`news_title`,`category_id`,`subcategory_id`,`is_bannerNews`,`news_deails`,`news_image`,`news_featuredimage`,`is_active`,`top_news`) VALUES (:news_writtenby, :news_writerImage, :news_title, :category_id, :subcategory_id,:is_bannerNews,:news_details, :news_image, :news_featuredimage, :is_active, :top_news)");

    $stmtinsert->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtinsert->bindParam(':news_writerImage', $fileNameNew2);
	$stmtinsert->bindParam(':news_title', $data['news_title']);
    $stmtinsert->bindParam(':category_id', $data['category_id']);
    $stmtinsert->bindParam(':subcategory_id', $data['subcategory_id']);
    $stmtinsert->bindParam(':is_bannerNews', $data['is_bannerNews']);
    $stmtinsert->bindParam(':news_details', $data['news_details']);
    $stmtinsert->bindParam(':news_image', $fileNameNew);
    $stmtinsert->bindParam(':news_featuredimage', $fileNameNew1);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_news', $data['top_news']);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}
function insertNewsWithVideo($conn, $data, $fileNameNew1,$videoName){
    $num1=20;
    $num2=76;
    $stmtinsert=$conn->prepare("INSERT INTO tblnews (`news_writtenby`,`news_title`,`category_id`,`subcategory_id`,`news_deails`,`news_video`,`news_featuredimage`,`is_active`,`top_news`) VALUES (:news_writtenby, :news_title, :category_id, :subcategory_id,:news_deails, :news_video,:news_featuredimage, :is_active, :top_news)");

    $stmtinsert->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtinsert->bindParam(':news_title', $data['news_title']);
    $stmtinsert->bindParam(':category_id', $num1);
    $stmtinsert->bindParam(':subcategory_id', $num2);
    $stmtinsert->bindParam(':news_deails', $data['news_deails']);
    $stmtinsert->bindParam(':news_video', $videoName);
    $stmtinsert->bindParam(':news_featuredimage', $fileNameNew1);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_news', $data['top_news']);
    
    if ($stmtinsert->execute()) {
        return true;
    }
    return false;
}
function updateVideoNews($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_writtenby=:news_writtenby, news_title=:news_title,  news_deails=:news_deails , is_active=:is_active,top_news=:top_news WHERE news_id=:news_id");

    $stmtupdate->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtupdate->bindParam(':news_title', $data['news_title']);
    $stmtupdate->bindParam(':news_deails', $data['news_deails']);
    $stmtupdate->bindParam(':top_news', $data['top_news']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateVideo($conn, $data, $ref,$videoName){
    $news = selectNewsFromId($conn,$ref);
    
    if(file_exists('../newsVideos/'.$news['news_video'])){
        unlink('../newsVideos/'.$news['news_video']);
    }
    
    
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_video=:news_video WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_video', $videoName);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateVideoThumbnail($conn, $data, $ref,$videoThumbnailName){
    $news = selectNewsFromId($conn,$ref);
    
    if(file_exists('../videoImage/'.$news['news_featuredimage'])){
        unlink('../videoImage/'.$news['news_featuredimage']);
    }
    
    
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_featuredimage=:news_featuredimage WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_featuredimage', $videoThumbnailName);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function insertNewsIntoTrash($conn, $data, $newsId){
    

	$stmtinsert=$conn->prepare("INSERT INTO tblnewstrash (`news_id`,`news_title`,`news_writtenby`,`category_id`,`subcategory_id`,`is_bannerNews`,`news_deails`,`news_image`,`news_featuredimage`,`is_active`,`top_news`,`news_writerImage`,`news_video`,`news_visit`,`news_language`) VALUES (:news_id, :news_title, :news_writtenby, :category_id, :subcategory_id, :is_bannerNews, :news_deails, :news_image, :news_featuredimage, :is_active, :top_news, :news_writerImage, :news_video, :news_visit, :news_language)");
    $stmtinsert->bindParam(':news_id', $data['news_id']);
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
    $stmtinsert->bindParam(':news_visit', $data['news_visit']);
    $stmtinsert->bindParam(':news_language', $data['news_language']);

	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}
function getDeletedNewsByID($conn,$ref){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewstrash WHERE trash_id=:trash_id");
    $stmtSelect->bindParam(':trash_id',$ref);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}

function restoreDeletedNews($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tblnews (`news_title`,`news_writtenby`,`category_id`,`subcategory_id`,`is_bannerNews`,`news_deails`,`news_image`,`news_featuredimage`,`is_active`,`top_news`,`news_writerImage`,`news_video`,`news_visit`) VALUES (:news_title, :news_writtenby, :category_id, :subcategory_id,:is_bannerNews,:news_deails, :news_image, :news_featuredimage, :is_active, :top_news, :news_writerImage, :news_video, :news_visit)");
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
    $stmtinsert->bindParam(':news_visit', $data['news_visit']);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function getAllNewsDetails($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_video=:news_video ORDER BY news_id DESC");
    $stmtSelect->bindParam(':news_video',$value);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
} 
function getAllVideoNewsDetails($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_video<>:news_video ORDER BY news_id DESC"); 
    $stmtSelect->bindParam(':news_video',$value);   
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getVideoNewsSubCategoryId($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_video<>:news_video"); 
    $stmtSelect->bindParam(':news_video',$value);   
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function getAVideoNews($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_video<>:news_video ORDER BY news_id DESC LIMIT 2"); 
    $stmtSelect->bindParam(':news_video',$value);   
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getAllTrashNewsDetails($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewstrash ORDER BY trash_id DESC");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getCategoryNameByCategoryId($conn,$categoryId){   
    $stmtSelect= $conn->prepare("SELECT category_name FROM tblcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$categoryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function getSubCategoryNameByCategoryId($conn,$subCategoryId){   
    $stmtSelect= $conn->prepare("SELECT subcategory_name FROM tblsubcategory WHERE subcategory_id=:subcategory_id");
    $stmtSelect->bindParam(':subcategory_id',$subCategoryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function selectNewsFromId($conn,$newsId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_id=:news_id");
    $stmtSelect->bindParam(':news_id',$newsId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function updateNews($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_writtenby=:news_writtenby, news_title=:news_title, is_bannerNews=:is_bannerNews, news_deails=:news_deails , is_active=:is_active,top_news=:top_news WHERE news_id=:news_id");

    $stmtupdate->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtupdate->bindParam(':news_title', $data['news_title']);
    $stmtupdate->bindParam(':is_bannerNews', $data['is_bannerNews']);
    $stmtupdate->bindParam(':news_deails', $data['news_deails']);
    $stmtupdate->bindParam(':top_news', $data['top_news']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateNewsImages($conn, $ref,$fileNameNew,$fileNameNew1){
    $news = selectNewsFromId($conn,$ref);    
     
            unlink('../newsImage/'.$news['news_image']);            
       
       unlink('../newsFeaturedImage/'.$news['news_featuredimage']);
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_image=:news_image,
        news_featuredimage=:news_featuredimage WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_image', $fileNameNew);
    $stmtupdate->bindParam(':news_featuredimage', $fileNameNew1);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateWriterImage($conn, $ref, $fileNameNew1){
    $news = selectNewsFromId($conn,$ref);
    unlink('../newsWriterImage/'.$news['news_writerImage']);
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_writerImage=:news_writerImage WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_writerImage', $fileNameNew1);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function deleteNews($conn, $newsId){
    
    $stmtdelete=$conn->prepare("DELETE FROM tblnews WHERE news_id=:news_id");
    $stmtdelete->bindParam(':news_id', $newsId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}

function selectNewsFromTrash($conn,$trashId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewstrash WHERE trash_id=:trash_id");
    $stmtSelect->bindParam(':trash_id',$trashId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}

function deleteTrashNewsFromTrash($conn, $trashId){
    
    $news = selectNewsFromTrash($conn,$trashId);    
             
    
    unlink('../newsImage/'.$news['news_image']);     
    
    unlink('../newsFeaturedImage/'.$news['news_featuredimage']);
    if ($news['news_writerImage'] != '') {   
    unlink('../newsWriterImage/'.$news['news_writerImage']);
    }
    
    $stmtdelete=$conn->prepare("DELETE FROM tblnewstrash WHERE trash_id=:trash_id");
    $stmtdelete->bindParam(':trash_id', $trashId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}

function deleteTrashNewsFromTrashNotPhoto($conn, $newsId){
    
    $stmtdelete=$conn->prepare("DELETE FROM tblnewstrash WHERE trash_id=:trash_id");
    $stmtdelete->bindParam(':trash_id', $newsId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}

function UpdateNewsVisitPage($conn,$data,$ref){
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_visit=:news_visit  WHERE news_id=:news_id");

    $stmtupdate->bindParam(':news_visit', $data);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}

function getHPSpecialNews($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE subcategory_id=78 ORDER BY news_id DESC LIMIT 3"); 
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function getAllNews($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}






// English News

function retriveSubCategoriesEnglish($conn){
    $stmtSelect = $conn->prepare("SELECT category_name FROM tblsubcategoryenglish");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getSubCategoriesByCategoryIdEnglish($conn,$categoryId){   
    $stmtSelect= $conn->prepare("SELECT * FROM tblsubcategoryenglish WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$categoryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();

}
function subCategoryIdFetch1English($conn,$categoryName){
    $stmtSelect = $conn->prepare("SELECT category_id FROM tblcategoryenglish WHERE category_name=:category_name");
    $stmtSelect->bindParam(':category_name',$categoryName);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function subCategoryIdFetchByNameEnglish($conn,$subCategoryName){
    $stmtSelect = $conn->prepare("SELECT subcategory_id FROM tblsubcategoryenglish WHERE subcategory_name=:subcategory_name");
    $stmtSelect->bindParam(':subcategory_name',$subCategoryName);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function insertNewsEnglish($conn, $data, $fileNameNew, $fileNameNew1, $fileNameNew2){
    $stmtinsert=$conn->prepare("INSERT INTO tblnewsenglish (`news_writtenby`,`news_writerImage`,`news_title`,`category_id`,`subcategory_id`,`is_bannerNews`,`news_deails`,`news_image`,`news_featuredimage`,`is_active`,`top_news`) VALUES (:news_writtenby, :news_writerImage, :news_title, :category_id, :subcategory_id,:is_bannerNews,:news_details, :news_image, :news_featuredimage, :is_active, :top_news)");

    $stmtinsert->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtinsert->bindParam(':news_writerImage', $fileNameNew2);
    $stmtinsert->bindParam(':news_title', $data['news_title']);
    $stmtinsert->bindParam(':category_id', $data['category_id']);
    $stmtinsert->bindParam(':subcategory_id', $data['subcategory_id']);
    $stmtinsert->bindParam(':is_bannerNews', $data['is_bannerNews']);
    $stmtinsert->bindParam(':news_details', $data['news_details']);
    $stmtinsert->bindParam(':news_image', $fileNameNew);
    $stmtinsert->bindParam(':news_featuredimage', $fileNameNew1);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_news', $data['top_news']);
    
    if ($stmtinsert->execute()) {
        return true;
    }
    return false;
}
function insertNewsWithVideoEnglish($conn, $data, $fileNameNew1,$videoName){
    $num1=20;
    $num2=76;
    $stmtinsert=$conn->prepare("INSERT INTO tblnewsenglish (`news_writtenby`,`news_title`,`category_id`,`subcategory_id`,`news_deails`,`news_video`,`news_featuredimage`,`is_active`,`top_news`) VALUES (:news_writtenby, :news_title, :category_id, :subcategory_id,:news_deails, :news_video,:news_featuredimage, :is_active, :top_news)");

    $stmtinsert->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtinsert->bindParam(':news_title', $data['news_title']);
    $stmtinsert->bindParam(':category_id', $num1);
    $stmtinsert->bindParam(':subcategory_id', $num2);
    $stmtinsert->bindParam(':news_deails', $data['news_deails']);
    $stmtinsert->bindParam(':news_video', $videoName);
    $stmtinsert->bindParam(':news_featuredimage', $fileNameNew1);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_news', $data['top_news']);
    
    if ($stmtinsert->execute()) {
        return true;
    }
    return false;
}
function updateVideoNewsEnglish($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tblnewsenglish SET news_writtenby=:news_writtenby, news_title=:news_title,  news_deails=:news_deails , is_active=:is_active,top_news=:top_news WHERE news_id=:news_id");

    $stmtupdate->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtupdate->bindParam(':news_title', $data['news_title']);
    $stmtupdate->bindParam(':news_deails', $data['news_deails']);
    $stmtupdate->bindParam(':top_news', $data['top_news']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateVideoEnglish($conn, $data, $ref,$videoName){
    $news = selectNewsFromIdEnglish($conn,$ref);
    
    if(file_exists('../newsVideos/'.$news['news_video'])){
        unlink('../newsVideos/'.$news['news_video']);
    }
    
    
    $stmtupdate=$conn->prepare("UPDATE tblnewsenglish SET news_video=:news_video WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_video', $videoName);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateVideoThumbnailEnglish($conn, $data, $ref,$videoThumbnailName){
    $news = selectNewsFromIdEnglish($conn,$ref);
    
    if(file_exists('../videoImage/'.$news['news_featuredimage'])){
        unlink('../videoImage/'.$news['news_featuredimage']);
    }
    
    
    $stmtupdate=$conn->prepare("UPDATE tblnewsenglish SET news_featuredimage=:news_featuredimage WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_featuredimage', $videoThumbnailName);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}



function restoreDeletedNewsEnglish($conn, $data){
    $stmtinsert=$conn->prepare("INSERT INTO tblnewsenglish (`news_title`,`news_writtenby`,`category_id`,`subcategory_id`,`is_bannerNews`,`news_deails`,`news_image`,`news_featuredimage`,`is_active`,`top_news`,`news_writerImage`,`news_video`,`news_visit`) VALUES (:news_title, :news_writtenby, :category_id, :subcategory_id,:is_bannerNews,:news_deails, :news_image, :news_featuredimage, :is_active, :top_news, :news_writerImage, :news_video, :news_visit)");
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
    $stmtinsert->bindParam(':news_visit', $data['news_visit']);
    
    if ($stmtinsert->execute()) {
        return true;
    }
    return false;
}

function getAllNewsDetailsEnglish($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewsenglish WHERE news_video=:news_video ORDER BY news_id DESC");
    $stmtSelect->bindParam(':news_video',$value);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
} 
function getAllVideoNewsDetailsEnglish($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewsenglish WHERE news_video<>:news_video ORDER BY news_id DESC"); 
    $stmtSelect->bindParam(':news_video',$value);   
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getVideoNewsSubCategoryIdEnglish($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewsenglish WHERE news_video<>:news_video"); 
    $stmtSelect->bindParam(':news_video',$value);   
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function getAVideoNewsEnglish($conn){
    $value='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewsenglish WHERE news_video<>:news_video ORDER BY news_id DESC LIMIT 2"); 
    $stmtSelect->bindParam(':news_video',$value);   
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getCategoryNameByCategoryIdEnglish($conn,$categoryId){   
    $stmtSelect= $conn->prepare("SELECT category_name FROM tblcategoryenglish WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$categoryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function getSubCategoryNameByCategoryIdEnglish($conn,$subCategoryId){   
    $stmtSelect= $conn->prepare("SELECT subcategory_name FROM tblsubcategoryenglish WHERE subcategory_id=:subcategory_id");
    $stmtSelect->bindParam(':subcategory_id',$subCategoryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function selectNewsFromIdEnglish($conn,$newsId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewsenglish WHERE news_id=:news_id");
    $stmtSelect->bindParam(':news_id',$newsId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function updateNewsEnglish($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tblnewsenglish SET news_writtenby=:news_writtenby, news_title=:news_title, is_bannerNews=:is_bannerNews, news_deails=:news_deails , is_active=:is_active,top_news=:top_news WHERE news_id=:news_id");

    $stmtupdate->bindParam(':news_writtenby', $data['news_writtenby']);
    $stmtupdate->bindParam(':news_title', $data['news_title']);
    $stmtupdate->bindParam(':is_bannerNews', $data['is_bannerNews']);
    $stmtupdate->bindParam(':news_deails', $data['news_deails']);
    $stmtupdate->bindParam(':top_news', $data['top_news']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateNewsImagesEnglish($conn, $ref,$fileNameNew,$fileNameNew1){
    $news = selectNewsFromIdEnglish($conn,$ref);    
     
        unlink('../newsImage/'.$news['news_image']);            
    
       unlink('../newsFeaturedImage/'.$news['news_featuredimage']);
    $stmtupdate=$conn->prepare("UPDATE tblnewsenglish SET news_image=:news_image,
        news_featuredimage=:news_featuredimage WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_image', $fileNameNew);
    $stmtupdate->bindParam(':news_featuredimage', $fileNameNew1);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function updateWriterImageEnglish($conn, $ref, $fileNameNew1){
    $news = selectNewsFromIdEnglish($conn,$ref);
    unlink('../newsWriterImage/'.$news['news_writerImage']);
    $stmtupdate=$conn->prepare("UPDATE tblnewsenglish SET news_writerImage=:news_writerImage WHERE news_id=:news_id");
    $stmtupdate->bindParam(':news_writerImage', $fileNameNew1);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function deleteNewsEnglish($conn, $newsId){
    
    $stmtdelete=$conn->prepare("DELETE FROM tblnewsenglish WHERE news_id=:news_id");
    $stmtdelete->bindParam(':news_id', $newsId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}




function UpdateNewsVisitPageEnglish($conn,$data,$ref){
    $stmtupdate=$conn->prepare("UPDATE tblnewsenglish SET news_visit=:news_visit  WHERE news_id=:news_id");

    $stmtupdate->bindParam(':news_visit', $data);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}

function getHPSpecialNewsEnglish($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewsenglish WHERE subcategory_id=78 ORDER BY news_id DESC LIMIT 3"); 
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function getAllNewsEnglish($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnewsenglish");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}


?>