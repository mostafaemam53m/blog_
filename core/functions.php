<?php
function setMessages($type, $message)
{
    $_SESSION['message'] = [
        'type' => $type,
        'text' => $message,
    ];
}

function showMessages()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];

        echo "<div class='text-center'><div class='alert alert-$type'>$text</div></div>";

        unset($_SESSION['message']);
    }
}
 

function saveRegisterData($user_name,$email,$password){
    
    $connection=$GLOBALS['connection'];
    $validPassword =password_hash($password,PASSWORD_DEFAULT);
    $user_name = mysqli_real_escape_string($connection, $user_name);
    $email = mysqli_real_escape_string($connection, $email);
    $validPassword = mysqli_real_escape_string($connection, $validPassword);
    
    $query = "INSERT INTO userdata (user_name, email, password) VALUES ('$user_name', '$email', '$validPassword')";
    $result= mysqli_query($connection,$query);
if ($result) {
    $_SESSION['user_name'] = $user_name;
    return true;
} else {
    setMessages("danger", "Failed to register");
    return false;
}

}




function loginData($email, $password)
{
    $connection = $GLOBALS['connection'];

     $email = mysqli_real_escape_string($connection, $email);

    $query = "SELECT * FROM userdata WHERE email='$email'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        return "Database query failed.";
    }

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_name"] = $user["user_name"]; 
            return null;  
        } else {
            return "Wrong password.";
        }
    } else {
        return "Wrong email.";
    }
}
 

?>