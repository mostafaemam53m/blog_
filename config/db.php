<?php  

$dataBaseName="blog_db";
$connection=mysqli_connect("localhost","root","",$dataBaseName);

try {
    if(!$connection){
        header("location: ./views/maintenance.php");
        exit;
    }
} catch (Exception $th) {
    header("location: ./views/maintenance.php");
}

?>