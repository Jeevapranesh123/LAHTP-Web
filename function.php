<?php


    $conn=NULL;
    $db_servername = "localhost";
    $db_username = "jeeva";
    $db_password = "1234";
    $db_name="testing";


    function get_db_connection() {
        global $conn;
        global $db_servername;
        global $db_username;
        global $db_password;
        global $db_name;

        if ($conn != NULL) {
            return $conn;
        } else {
            $conn = mysqli_connect($db_servername,$db_username,$db_password,$db_name);
            if (!$conn) {
                die("Connection failed: ".mysqli_connect_error());
            } else {
                return $conn;
            }
    }
}


function get_hashed_passwd($password) {
	return md5(strrev($password));
}

function add_session($email, $token, $expiry) {
    $conn=get_db_connection();
    $mysqltime = date('Y-m-d H:i:s', $expiry);
    $query = "INSERT INTO `testing`.`session`(`email`, `token`, `expiry`) VALUES ('$email', '$token', '$mysqltime');";
    if (mysqli_query($conn, $query)) {
       setcookie('email', $email ,$expiry,'/');
       setcookie('token', $token ,$expiry,'/');
       return true;
    } else {
       return mysqli_error($conn);
    }
}

function verify_session($email, $token){
    $conn=get_db_connection();
    $sql="SELECT * FROM testing.session WHERE email='$email' AND token = '$token';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if((int)$row['active']==1){
            $expiry =strtotime($row['expiry']);
            if($expiry>time()){
                return 1;
            }
            else{
                return 0;
            }
        }else{
            return 0;
            }
    }else{
         return 0;
    }
}



function login($email,$password){
    $conn=get_db_connection();
    $flag=0;
    // $hashed=password_verify($password, $hash);
    // print($hashed);
    $sql = " SELECT * FROM testing.user where Email='$email';" ;
    // print("SELECT * FROM testing.user where Email='$email'" . "\n");
    if ($result = mysqli_query($conn, $sql)){
        print("Succes");
    }else{
        print("Fail");
    }
    $result = mysqli_query($conn, $sql);
    // var_dump($result);
    // die();
    // print(mysqli_errno($conn));
    //  die();
    // mysqli_errno($conn);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        print_r($row);
        if(password_verify($password, $row['Password'])){
            $token=get_hashed_passwd(strrev(rand(1000,9999)));
            $expiry=time()+(24*60*60);
            print($expiry);
            // die();
            add_session($email, $token, $expiry,$conn);
            header("Location:cover.php");
        }else{
            $error="badpass";
            header("Location:signin.php?error=$error");
        }
    }else{
        $error="invaliduser";
        header("Location:signin.php?error=$error");
    }
}



function signup($username,$email,$password){
    $conn=get_db_connection();
    $hashed=password_hash($password, PASSWORD_BCRYPT );
    print($hashed);
    $flag=0;
    $sql="SELECT * FROM testing.user Where Name='$username';"; 
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
    if ($count>0) {//Checking for Existing username
        echo mysqli_num_rows($result);
        $error="usernametaken";
        header("Location:index.php?error=$error");//Sending error as username taken
        $flag=1;
    }

    $sql="SELECT * FROM testing.user Where Email='$email';";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
    if ($count > 0) {//Checking for Existing User Mail-Id
        $error="userexist";
        header("Location:index.php?error=$error");
        $flag=1;
        
    }
        
    if($flag!=1) {//Verification of New user
        echo "3";
        $otp1=rand(1000,9999);
        $is_verfied=0;
        $sql="INSERT INTO `testing`.`user` (`Name`, `Email`, `Password`,`otp`,`is_verified`) VALUES ('$username', '$email', '$hashed','$otp1','$is_verfied');";
        if ($query=mysqli_query($conn,$sql) === TRUE) {// Succesfull Entry
            echo "N record created successfully";
            header("Location:otp.php");
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) ;
            if(mysqli_errno($conn)==1062){//Duplicate Entry for email
                $error="user exist";
                // header("Location:index.php?error=$error");
            }
        }

}

}


function verify_otp($email,$otp){
    $conn=get_db_connection();
    $sql="SELECT Email,otp FROM `user`WHERE Email='$email';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        if ($row['otp']==$otp){
            $success="userverified";
            header("Location:signin.php?success=$success");
        }else{
            $error="invalidotp";
            header("Location:otp.php?error=$error");
        }
    }else{
        $error="invalidemail";
        header("Location:otp.php?error=$error");
    }
    
}

// function resend_otp($email){
//     $conn=get_db_connection();
//     $otp1=rand(1000,9999);
//     $sql="UPDATE `user` SET `otp` = '$otp1' WHERE `user`.`Email` = '$email'";
//     $result = mysqli_query($conn, $sql);
//     if($result){
//         echo "otp sent";
//         header("Location:otp.php?resent=1");
//     }else{
//         echo "0";
//     }

// }
