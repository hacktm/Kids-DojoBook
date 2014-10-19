<?php

// Turn off all error reporting
error_reporting(0);

function register($arr){
	global $link;
	extract($arr);
	//$user = $_POST['user'];
	//$pass = $_POST['pass'];
	//$email = $_POST['email'];

	$sql = "INSERT INTO `users` VALUES('', '$user', '$pass', '$email','','','','','')";
	$res = mysqli_query($link, $sql) or die ("Account not added in Database.");
	mail($email,"DojoBook Regitration", "Welcome to DojoBook, Thanks you for registration.<br><br>Your username: $user");
	header('Location:/index.php?pagina=login');

}

function login($arr){
	global $link;
	extract($arr);
	//$user = $_POST['user'];
	//$pass = $_POST['pass'];

	$sql = "SELECT * FROM `users` WHERE `user`='$user' AND `pass`='$pass'";
	$res = mysqli_query($link, $sql) or die ("This account was not exist in database.");
	$row = mysqli_fetch_assoc($res);
	if(!empty($row)){
		session_start();
		$_SESSION['id'] = $row['id'];
		$_SESSION['user'] = $row['user'];
			$_SESSION['email'] = $row['email'];
		header('Location:/index.php?pagina=member_area');
	}
	else{
		header('Location:/index.php?pagina=error');
	}
}
function bagapoza($arr){

	var_dump($_FILE);
	global $link;
	$target = "images/"; 
    $target = $target . basename( $arr['small_img']['name']); 
	
    if ($arr["small_img"]["error"] > 0) {
      echo "Error: " . $arr["small_img"]["error"] . "<br>";
    }else if($arr['small_img']['type']=='image/jpeg' || $arr['small_img']['type']=='image/pjpeg' || $arr['small_img']['type']=='image/gif'){
      $photo = $arr['small_img']['name'];
      $sql = "UPDATE `users` SET `photo`='$photo'";
      mysqli_query($link,$sql) ;
    }
	if(move_uploaded_file($arr['small_img']['tmp_name'], $target)) { 

	echo "The file ". basename( $arr['small_img']['name']). " has been uploaded, and your information has been added to the directory"; 
	} else { 

	echo "Sorry, there was a problem uploading your file."; 
	}
}

function getUserById($id){
	global $link;
	$sql = "SELECT * FROM `users` WHERE `id`='$id'";
	$res = mysqli_query($link, $sql) or die ("Account not in Database.");
	$row = mysqli_fetch_assoc($res);
	return $row;

}
function modifyProfile($arr_data,$id){
	global $link;
	extract($arr_data);
	$sql = "UPDATE `users` SET `facebook`='$facebook', `twitter`='$twitter', `yahoo`='$yahoo', `phone`='$phone' WHERE `id`='$id'";
	mysqli_query($link, $sql) or die ("Account not added in Database.");
} 
function intrebariblog($arr){
	global $link;
	extract($arr);
	$sql = "INSERT INTO `question` VALUES('', '$addQuestion')";
	$res = mysqli_query($link, $sql) or die ("Question not added in Database.");

}
function  scuipaBlog(){
	global $link;
	$sql = "SELECT * FROM `question`";
	$res = mysqli_query($link, $sql) or die ("That question doesn't exists.");
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		array_push($data,$row);
	}
	return $data;
}
?>

