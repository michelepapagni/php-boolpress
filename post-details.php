<?php
    if (empty($_GET['slug']))
    {
        die('Errore nel caricamento della pagina');
    }

    $slug = $_GET['slug'];

    include 'database.php';

    $post = [];

    foreach ($posts as $databasePost)
    {
        if ($databasePost['slug'] == $slug)
        {
            $post = $databasePost;
        }
    }

    $date = DateTime::createFromFormat('d/m/Y H:i:s', $post['published_at']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Post Details - <?php echo $post['title']; ?></title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>

        <div class="container">
            <div class="post" data-slug="<?php echo $post['slug']; ?>">
                <h1><?php echo $post['title']; ?></h1>
                <small>Pubblicato il <?php echo $date->format('d F'); ?> alle <?php echo $date->format('H'); ?></small>

                <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" width="300">
                <p><?php echo $post['content']; ?></p>
                <ul>
                    Tag:
                    <?php foreach ($post['tag'] as $tag) { ?>
                        <li>
                            <a href="http://localhost/Boolean/php-boolpress/posts.php?tag=<?php echo $tag; ?>">
                                <?php echo $tag; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="templates">
            <div class="comment-template">
                <div class="comment">
                    <h3>
                        <span class="name"></span> -
                        <span class="mail"></span>
                    </h3>
                    <p></p>
                </div>
            </div>
        </div>
        <script src="js/app.js" charset="utf-8"></script>
    </body>
</html>
