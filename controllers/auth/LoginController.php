<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email=$_POST["email"];
    $password=$_POST["password"];
$error=validatelogin($email,$password);

    if(empty($error)){

        if(empty(loginData($email,$password))){
            setMessages("success", "User Login Sucessfully");
            header("location: ./index.php");
            exit;
        }else{
            setMessages("danger", "Invaild email or password");
            header("location: ./index.php?page=login");
            exit;
        }


    }else{
        setMessages("danger", $error);
        header("location: ./index.php?page=login");
        exit;

    }

  




}
?>