<?php
/**
 * Created by PhpStorm.
 * User: laiah
 * Date: 09/04/18
 * Time: 11:55
 */

if (isset($_POST['submit'])) {
    if(unlink($_POST['submit'])) {
        header("Location: form.php");
    }

}