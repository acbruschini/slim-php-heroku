<?php
var_dump($_FILES);
$carpeta = "testdir/";

if (isset($_FILES["archivo"]) && !$_FILES["archivo"]["error"]) // y otras validaciones
{
    $destino = $carpeta.$_FILES["archivo"]["name"];
    if (!is_dir($carpeta))
    {
        mkdir($carpeta, 0700);
    }
    move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino);

    echo pathinfo($_FILES["archivo"]["tmp_name"], PATHINFO_EXTENSION);

    echo "FIJATE SI SE SUBIO";
}
?>