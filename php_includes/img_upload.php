<?php
include_once('db_con.php');

if(isset($_POST["sumit"])) {
$target_dir = "../image/subject/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    if(isset($_POST["subject"]) && isset($_POST["category"])){
    $isTopic= $_POST["isTopic"];
    $subject= $_POST["subject"];
    $category= $_POST["category"];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $location= "subject/". basename( $_FILES["fileToUpload"]["name"]);
            $query= "INSERT into subject (subject_of, isTopic, subject_name, subject_img) values ('$category', '$isTopic' ,'$subject', '$location')";
            $result= mysqli_query($db_conx, $query);
            header("location: ../admin/add_subjects.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if(isset($_POST["savedata"])){
    $sub_id=$_POST["sub_id"];
    $chap_no=$_POST["chap_no"];
    mkdir("../image/figures/".$sub_id);
    mkdir("../image/figures/".$sub_id."/".$chap_no);
    $target_dir = "../image/figures/".$sub_id."/".$chap_no."/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
        $title= $_POST["title"];
        $fig_no= $_POST["fig_no"];
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            rename($target_dir . basename($_FILES["fileToUpload"]["name"]),$target_dir . $fig_no.".".$imageFileType);
            // $location= "figures/".$sub_id."/".$chap_no."/". $fig_no ."." .$imageFileType;
            // $query= "INSERT into figures (title,fig_url) values ('$title', '$location')";
            // $result= mysqli_query($db_conx, $query);
            header("location: ../admin/add_figures.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}else{
        echo "bla";
}
?>