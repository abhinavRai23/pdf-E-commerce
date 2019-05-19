<?php

function file_upload( $file, $file_name, $max_file_size, $isbn){
        $target_dir = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$file_name.'/';
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.<br>";
        //     $uploadOk = 0;
        // }
        // Check file size
        if ($file["size"] > $max_file_size) {
            echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($file_name=="poster" && ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" )) {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.<br/>";
            $uploadOk = 0;
        }else if($file_name!="poster" && $imageFileType!='pdf'){
            echo $file_name." ".$imageFileType."<br>";
            echo "Sorry, expectred pdf file.<br/>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return 1;
        } else {
            // if everything is ok, try to upload file
            try{
                move_uploaded_file($file["tmp_name"], $target_file);
            }
            catch( Exception $e ){
                echo "SomeThing went Wrong: ".$e;
            }
            return 0;
        }
    }
