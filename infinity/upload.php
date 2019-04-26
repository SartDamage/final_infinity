<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/global_variable.php';
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $errmsg = '"File is an image - '.$check["mime"].';" ';
        $uploadOk = 1;
    } else {
        $errmsg = "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_dir.$newfilename)) {
    $errmsg = "Sorry, file already exists.";
	echo $errmsg;
    $uploadOk = 0;
}
// Check file size					  
if ($_FILES["fileToUpload"]["size"] > 10485760) {
    $errmsg = "Sorry, your file is too large.";
		echo $errmsg;
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $errmsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errmsg = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
        $errmsg = "The file ". $newfilename. " has been uploaded.";
    } else {
        $errmsg = "Sorry, there was an error uploading your file.";
    }
	echo $errmsg;
}
?>