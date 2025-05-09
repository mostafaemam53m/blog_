<?php
session_start();
require_once("./config/db.php");
require_once("./core/functions.php");
require_once("./core/validations.php");
require_once("./views/layouts/header.php");
showMessages();
$page=isset($_GET['page']) ? $_GET['page']: "home";

switch ($page){

    case "home":
        include("./views/home.php");
        break;
    case "login":
        include("./views/auth/login.php");
        break;
    case "register":
        include("./views/auth/register.php");
        break;
    case "logout":
         include("./controllers/auth/LogoutController.php");
        break;
    case "logout":
        include "./controllers/auth/LogoutController.php";
        break;
     case "sign-up":
        include "./controllers/auth/RegisterController.php";
        break;
    case "auth-login":
        include "./controllers/auth/LoginController.php";
        break;

    case "blogs":
     include "./views/blog/index.php";
     break;
    case "add-blog":
    include "./views/blog/create.php";
     break;
    case "edit-blog":
        include "./views/blog/edit.php";
          break;

    case "show-blog":
            include "./views/blog/show.php";
              break;
    
    case "store-blog":
    include "./controllers/auth/BlogController.php";
    break;
    case "update-store-blog":
        include "./controllers/auth/BlogController.php";
        break;

        default:
        include("./views/maintenance.php");


}

require_once("./views/layouts/footer.php");




?>