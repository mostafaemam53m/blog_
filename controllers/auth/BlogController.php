<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $conn=$GLOBALS['connection'];
    $title=$_POST["title"];
    $image=$_FILES["image"];
    $content=$_POST["content"];

    $title = mysqli_real_escape_string($conn, $title);
$content = mysqli_real_escape_string($conn, $content);
// $relativePath = mysqli_real_escape_string($conn, $relativePath);

$error=bolgValidations($title,$image,$content);

if (!empty($error)) {
    setMessages("danger", $error);
    header("location: ./index.php?page=add-blog");
    exit;
}else{

    if(empty(storeBlog($title,$image,$content))){

        setMessages("success", "the blog add suceefully");
        header("location: ./index.php?page=blogs");
        exit;
    }else{

        setMessages("danger", "filed to add blog");
            header("location: ./index.php?page=add-blog");
            exit;


    }
}


}





?>