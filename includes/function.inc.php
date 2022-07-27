<?php

/*function emptyInputSignup($name,$username,$pass,$cpass,$email,$phone){
    
    $result='';
    
    if(empty($name) || empty($username) || empty($pass)|| empty($cpass)|| empty($email)|| empty($phone) ){

       $result=true;
       return $result;
    } 

        $result=false;

   
    return $result;

}

 function invalidUsername($username){
    
    $result='';
    

    if(!preg_match("/^[a-zA-Z0-9*$/]",$username)){

       $result=true;
       return $result;
    }
   
        $result=false;
    

    return $result;

}

function invalidEmail($email){
    
     $result='';
    
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){

       $result=true;
    }

        $result=false;


    return $result;

}


function passMatch($pass,$cpass){
    
    $result='';
    
    if($pass !== $cpass){

       $result=true;
    }
    else{ 
        $result=false;
    }

    return $result;

}

function usernameExists($conn,$username,$email){
    
$sql ="SELECT * FROM user_form WHERE username = ? OR email = ?;";
$stmt =mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){

    header("location:../signup.php?error=stmtfail");
    exit();
}

mysqli_stmt_bind_param($stmt,"ss",$username,$email);
mysqli_stmt_execute($stmt);

$resultData=mysqli_stmt_get_result($stmt);

if($row= mysqli_fetch_assoc($resultData)){
    return $row;
}
else{
    $result=false;
    return $result;
   } 

mysqli_stmt_close($stmt);

}

function createUser($conn,$name,$username,$pass,$email,$phone){
    
    $sql ="INSERT INTO user_form (name,username,password,email,phoneno) VALUES(?,?,?,?,?); ";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
    
        header("location:../signup.php?error=stmtfail");
        exit();
    }

    $hashedPass = password_hash($pass,PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt,"",$name,$username,$hashedPass,$email,$phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../signup.php?error=none");
    exit();
 
    
}

function emptyInputLogin($username,$pass){
    
    $result='';
    
    if( empty($username) || empty($pass)){

       $result=true;
       return $result;
    } 

        $result=false;

   
    return $result;

}

function loginUser($conn,$username,$pass){
    
    $usernameExists=usernameExists($conn,$username,$username);
    
    if($usernameExists === false){

        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passHashed = $usernameExists["password"];
    $checkpass = password_verify();

}*/

?>
