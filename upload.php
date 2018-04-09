<?php
$maxSize = 1000000;
$uploadDirectory = 'upload/';
$extensions = ['png', 'gif', 'jpg'];
/*if (isset($_POST['submit'])) {
    foreach ($_FILES as $value) {
        foreach ($value as $property) {
            foreach ($property as $key => $value2) {
                $fileName = $value['name'][$value2];
                $fileSize = $value['size'][$value2];
                $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $newFileName = 'image' . uniqid() . '.' . $extension;

                if (!in_array($extension, $extensions)) {
                    echo "L'extension du fichier n'est pas autorisée";
                }

                if ($fileSize > $maxSize) {
                    echo "Le fichier est trop lourd";
                }

                $destination = $uploadDirectory.$newFileName;
                move_uploaded_file($value['tmp_name'][$value2], $destination);
            }

        }

    }

}*/
if (isset($_POST['submit'])) {

    $errors = [];

    foreach ($_FILES as $files) {
        foreach ($files['name'] as $fileName) {
            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        }

        if (!in_array($extension, $extensions)) {
            $errors['extension'] = "L'extension du fichier n'est pas autorisée";
            echo $errors['extension'];
        }
        foreach ($files['size'] as $fileSize) {
            if ($fileSize > $maxSize) {
                $errors['size'] = "Le fichier est trop lourd";
                echo $errors['size'];
            }
        }

        if (empty($errors)) {
            foreach ($files['tmp_name'] as $fileTmp) {
                $newFileName = 'image' . uniqid() . '.' . $extension;
                $destination = $uploadDirectory.$newFileName;
                if(move_uploaded_file($fileTmp, $destination)) {
                    echo "Fichiers importés avec succès";
                    header("Location: form.php");
                } else {
                    echo "Echec de l'envoi";
                }
            }
        }
    }
}










	
