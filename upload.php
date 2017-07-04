<?php
//Get file information
$target_dir = "Images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



if(isset($_POST["submit"])){
	//Ensure file is a valid image
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false){
	$uploadOk = 1;
	}
	else{
	$uploadOk = 0;
	}
}

//Make sure file is not already on the server
if(file_exists($target_file)){
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
if($uploadOk == 0){

}
else{
	//Upload file to server
	if(move_uploaded_file($_FILES["fileToUpload"]['tmp_name'],$target_file)){

	}
}

//Return to page sent from
if(isset($_SERVER['HTTP_REFERER'])){
	header("Location:".$_SERVER['HTTP_REFERER']);
}
?>