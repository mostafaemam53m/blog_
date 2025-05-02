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
            // get id to use it in many triks

            $_SESSION["user_id"] = $user["id"]; 
            $_SESSION["user_name"] = $user["user_name"]; 
            return null;  
        } else {
            return "Wrong password.";
        }
    } else {
        return "Wrong email.";
    }
}
 
// to store blog

function storeBlog($title, $image, $content) {
    $title = trim($title);
    $content = trim($content);

    if ($image["error"] != 0) {
        return "Image upload error";
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    $fileType = $image['type'];
    $fileSize = $image['size'];
    $tmpName = $image['tmp_name'];

    if (!in_array($fileType, $allowedTypes)) {
        return "Type of image not supported";
    }

    if ($fileSize > $maxSize) {
        return "Image size is larger than 5MB";
    }

    // اسم فريد للصورة
    $image_name = time() . '_' . basename($image["name"]);
    $relativePath = "/assets/imgs/" . $image_name;
    $fullpath = realpath(__DIR__ . "/../assets/imgs") . "/" . $image_name;

    if (!move_uploaded_file($tmpName, $fullpath)) {
        return "Failed to upload the image";
    }

    $connection = $GLOBALS['connection'];
    $user_id = $_SESSION["user_id"]; 
    // تأكد أن الجلسة تحتوي user_id

    $query = "INSERT INTO posts (`title`, `content`, `user_id`, `image`, `create_at`) 
              VALUES ('$title', '$content', '$user_id', '$relativePath', NOW())";

    $excute = mysqli_query($connection, $query);

    return $excute ? null : "Failed to execute query";
}

//  find Blogs

function getBlogs(){
    $connection=$GLOBALS["connection"];
    $user_id=$_SESSION["user_id"];

    $query="SELECT * From posts WHERE user_id=$user_id";

    $excute=mysqli_query($connection,$query);


    return mysqli_fetch_all($excute, MYSQLI_ASSOC);

}


// to find certani blog


function findBlog($id){

    $connection=$GLOBALS["connection"];
 
    $query="SELECT * From posts WHERE user_id=$id";

    $excute=mysqli_query($connection,$query);

    
    if(mysqli_num_rows($excute)==0){

        setMessages("danger", "Blog Not Found");
        header("location: ./index.php?page=blogs");
        exit;
    }

    return mysqli_fetch_assoc($excute);

}

function deleteBlog($id){
    findBlog($id);
    $connection = $GLOBALS['connection'];
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $res = mysqli_query($connection,$sql);
    if($res){
        return true;
    }else{
        return false;
    }
}

function updateBlog($id,$title, $content, $image){
    $blog = findBlog($id);
    $connection = $GLOBALS['connection'];
    $imagePath = realpath(__DIR__.'/../'.$blog['image']);
    if($imagePath && $image && file_exists($imagePath)){
        unlink($imagePath);
    }
    $fileName = $image['name'];
    $fullPath = realpath(__DIR__ . "/../assets/imgs") . "/" . $fileName;
    $relativePath = "/assets/imgs/" . $fileName;
    
    if(!move_uploaded_file($image['tmp_name'],$fullPath)){
        die('fail to upload image');
    }
    $sql = "UPDATE posts SET title = '$title' , content = '$content' , image = '$relativePath' where id = '$id'";
    $res = mysqli_query($connection,$sql);
    if($res){
        return true;
    }else{
        return false;
    }
}
?>