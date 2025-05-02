<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['action'] == "store") {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $image = $_FILES['image'];

        $error = bolgValidations($title, $content, $image);

        if (!empty($error)) {
            setMessages("danger", $error);
            header("location: ./index.php?page=add-blog");
            exit;
        }

        if (storeBlog($title, $content, $image)) {
            setMessages("success", "Blog Created Sucessfully");
            header("location: ./index.php?page=blogs");
            exit;
        } else {
            setMessages("danger", "Fail Blog create");
            header("location: ./index.php?page=add-blog");
            exit;
        }
    } elseif ($_GET['action'] == 'delete' && isset($_POST['id'])) {
        $id = $_POST['id'];
        if (deleteBlog($id)) {
            setMessages("success", "Blog Deleted Sucessfully");
            header("location: ./index.php?page=blogs");
            exit;
        } else {
            setMessages("danger", "Fail Blog Deleted");
            header("location: ./index.php?page=blogs");
            exit;
        }
    } elseif ($_GET['action'] == 'update' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $image = $_FILES['image'];
        if (updateBlog($id,$title, $content, $image)) {
            setMessages("success", "Blog Updated Sucessfully");
            header("location: ./index.php?page=blogs");
            exit;
        } else {
            setMessages("danger", "Fail Blog Updated");
            header("location: ./index.php?page=edit-blog");
            exit;
        }
    }
}



?>