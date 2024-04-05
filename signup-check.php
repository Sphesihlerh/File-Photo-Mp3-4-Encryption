<?php 
session_start(); 
include "connection.php";

if (isset($_POST['email']) && isset($_POST['password'])
 && isset($_POST['lastname']) && isset($_POST['Id_no'])
    && isset($_POST['firstname']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['firstname']);
        $nam1 = validate($_POST['lastname']);
           $nam2 = validate($_POST['Id_no']);

	$user_data = 'email='. $uname. '&firstname='. $name. '&lastname='. $nam1.'&Id_no='. $nam2;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}
        
        else if(empty($nam1)){
        header("Location: signup.php?error=Last name is required&$user_data");
	    exit();
	}
        
        else if(empty($nam2)){
        header("Location: signup.php?error=Id number is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM login_user WHERE email='$uname' ";
		$result = mysqli_query($conn, $sql);

		
	   
           $sql2 = "INSERT INTO login_user(email, password, firstname) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
         
	           	
           }
		}
	
	
