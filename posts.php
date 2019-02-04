<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Posts</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div class="container">
            <?php include 'database.php'; ?>

            <?php
                if (empty($_GET['tag'])) {
                    $title = 'Tutti i Posts';
                    $postsDaStampare = $posts;
                }
                else {
                    $title = 'Tutti i post del tag: '. $_GET['tag'];
                    $postsDaStampare = [];

                    foreach ($posts as $post)
                    {
                        if (in_array($_GET['tag'], $post['tag']))
                        {
                            $postsDaStampare[] = $post;
                        }
                    }
                }
            ?>

            <h1><?php echo $title; ?></h1>

            <?php foreach ($postsDaStampare as $post) { ?>
                <?php
                    $date = DateTime::createFromFormat('d/m/Y H:i:s', $post['published_at']);
                ?>
                <h3>
                    <a href="http://localhost/Boolean/php-boolpress/post-details.php?slug=<?php echo $post['slug']; ?>">
                        <?php echo $post['title']; ?>
                    </a>
                    <small>Pubblicato il <?php echo $date->format('d F'); ?> alle <?php echo $date->format('H'); ?></small>
                </h3>
                <p><?php echo substr($post['content'], 0, 150) ?>...</p>
            <?php } ?>

        </div>

        <script src="js/app.js" charset="utf-8"></script>
    </body>
</html>
