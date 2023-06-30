<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$email = validate($_POST['email']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signupAdmin.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signupAdmin.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signupAdmin.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signupAdmin.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: signupAdmin.php?error=email is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signupAdmin.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM admin WHERE name ='$uname' AND password =  '$pass' AND  email = '$email' ";
		$sqlemail = "SELECT * FROM admin WHERE email = '$email' ";
		$result = mysqli_query($conn, $sql);
		$resultemail = mysqli_query($conn, $sqlemail);

		if ((mysqli_num_rows($result) > 0) || (mysqli_num_rows($resultemail) > 0)) {
			header("Location: signup.php?error=The username or email is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO admin(name,email,password,username,role) VALUES( '$name', '$email' ,'$pass','$uname', 'admin')";
           $result2 = mysqli_query($conn, $sql2);

           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
				header("Location: login.php");
	         exit();
           }else {
	           	header("Location: signupAdmin.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signupAdmin.php");
	exit();
}