<?php

function validateRequired($value, $fieldName)
{
    return empty($value) ? "$fieldName is required" : null;
}

function validateUserName($name){

    return preg_match("/^[a-zA-Z0-9_]{3,20}$/",$name) ? null: "Invaild user name dont use spac or (! @ # $ %)";
}
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "Invaild email";
}

function validatepassword($pass){


    return preg_match('/^.{6,}$/', $pass) ? null: "password  must be more than 6 char or number";


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

    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validatePassword($pass)) {
        return $error;
    }

    

}

function loginData($email,$pass){
    $login_data=[
        "email"=>$email,
        "password"=>$pass

    ];

    foreach($login_data as $fieldName=>$value){

        if($error=validateRequired($$value,$fieldName)){
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

?>