<?php
    require_once "upload.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Upload de fichiers</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
    </head>

    <body>
        <h1 class="page-header text-center">Upload multiple de fichiers</h1>
        <div class="container">
            <form method="POST" enctype="multipart/form-data" action="upload.php">
                Fichier (jpg, png ou gif. Max. 1Mo) : <input id='image' name="image[]" type="file" multiple="multiple"/>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> <!-- Taille max 1Mo -->
                <input type="submit" value="Submit" name="submit" />
            </form>
        </div>
        
        <h2>Fichiers téléchargés :</h2>
        <div class="container">
            <div class="row">
                <?php
                $uploadDirectory = 'upload/';
                $files = scandir($uploadDirectory);
                foreach ($files as $file) {
                    $fileDirectory = $uploadDirectory . $file;
                    if (($file != '.') && ($file != '..')) {
                        ?>
                        <div class="col img-thumbnail">
                            <img src="upload/<?= $file ?>">
                            <p><?= $file ?></p>
                            <?php if (file_exists($fileDirectory)) {
                                ?>
                                <form method="post" action="delete.php">
                                    <button type="submit" class="btn btn-danger" name="submit" id="submit" value="<?= $fileDirectory ?>">Supprimer</button>
                                </form>

                            <?php } ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

        </div>
    </body>
</html>


