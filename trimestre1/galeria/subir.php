<?php
$target_dir = "fotos/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        // echo "The file " . basename($_FILES["foto"]["name"]) . " has been uploaded.";
        header("Location: index.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "<br><a href='index.php'>Inicio</a>";