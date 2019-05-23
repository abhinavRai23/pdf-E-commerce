<?php

function file_upload($file, $file_name, $max_file_size)
{
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $file_name . '/';
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // echo $target_file . "<br>";

    // Check file size
    if ($file["size"] > $max_file_size) {
        throw new Exception("Sorry, your file is too large.");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($file_name == "poster" && ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")) {
        throw new Exception("Sorry, only JPG, JPEG & PNG files are allowed");
        $uploadOk = 0;
    } else if ($file_name != "poster" && $imageFileType != 'pdf') {
        throw new Exception($file_name . " " . $imageFileType . ":- Sorry, expectred pdf file");
        $uploadOk = 0;
    }

    // echo $file["tmp_name"] . "<br>";
    //Check if $uploadOk is set to 0 by an error

    if ($uploadOk == 0) {
        return 0;
    } else {
        $move = move_uploaded_file($file["tmp_name"], $target_file); 
        if (!$move) {
            throw new Exception("File upload failed.");
            return 0;
        } else {
            return 1;
        }
    }
}
