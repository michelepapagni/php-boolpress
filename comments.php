<?php

    include 'data-comments.php';

    if (empty($_GET['slug']))
    {
        die('Si è verificato un errore');
    }

    $slug = $_GET['slug'];

    if (!array_key_exists($slug, $comments))
    {
        die('la chiave non esiste');
    }

    $availableComments = $comments[$slug];

    $json = json_encode($availableComments);

    echo $json;
?>
