<?php 
    $filename = $_POST['file-name-submit'];

    if(file_put_contents($filename, $_POST['text-area'])){
        header('Location: index.php');
    }
?>