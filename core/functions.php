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

    $query="INSERT INTO userdata (id,user_name,email) values(,'$user_name','$email','$validPassword')";
   $reslte= mysqli_query($connection,$query);
   if ($reslte) {
    $_SESSION['user_name'] = $user_name;
    return true;
} else {
    setMessages("danger", "Failed to register");
    return false;
}

}

?>