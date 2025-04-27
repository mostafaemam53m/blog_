<?php
session_unset();
session_destroy();

setMessages("success","User LogOut Sucessfully");
header("Location: index.php?page=login");

?>