<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=trim($_POST["name"]);
    $email=trim($_POST["email"]);
    $password=trim($_POST["password"]);
     
    if(empty(validateRegister($name,$email,$password))){

        if(saveRegisterData($name,$email,$password)){
            setMessages("success","register done successfully");

        header("location: index.php");
        exit;

        }else{
            setMessages("danger","issue in saving data");
            header("location: index.php?page=register");
            exit;


        }
        


    }else{

        setMessages("danger","register filed");
        header("location: index.php?page=register");
        exit;



    }



   







}

?>