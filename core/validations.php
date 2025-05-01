<?php

function validateRequired($value, $fieldName)
{
    return empty($value) ? "$fieldName is required" : null;
}

function validateUserName($name){

    return preg_match("/^[a-zA-Z0-9_]{3,20}$/",$name) ? null:"Invalid username. Do not use spaces or special characters (! @ # $ %)."
;
}
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "Invaild email";
}

function validatePassword($pass){


    return preg_match('/^.{6,}$/', $pass) ? null: "Password must be at least 6 characters.";


}

function validateRegister($name,$email,$pass){

    $user_data=[
        "user_name"=>$name,
        "email"=>$email,
        "password"=>$pass

    ];

    foreach($user_data as $fieldName=>$value){
        if ($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }
    if ($error = validateUserName($name)) {
        return $error;
    }

    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validatePassword($pass)) {
        return $error;
    }

    

}

function validatelogin($email,$pass){
    $login_data=[
        "email"=>$email,
        "password"=>$pass

    ];

    foreach($login_data as $fieldName=>$value){

        if($error=validateRequired($value,$fieldName)){
            return $error;
        }
    }
    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validatePassword($pass)) {
        return $error;
    }

}


function bolgValidations($title,$image,$content){
    $blogData=[
        "title"=>$title,
        "image"=>$image,
        "content"=>$content
    ];

    foreach($blogData as $index=>$value){
        if($error=validateRequired($value,$index)){
            return $error;
        }
    }

}

?>