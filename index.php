<?php
require 'includes/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

<?php require_once "includes/header.php"?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/articles.php">Все записи</a>
              <h3>Новейшее_в_блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles = mysqli_query($connection,"SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10");

                        while ( $art = mysqli_fetch_assoc($articles))
                        {
                           ?>
                            <article class="article">
                                <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image'];?>);"></div>
                                <div class="article__info">
                                    <a href="/categorie.php?categorie=<?php echo $art['id'];?>"><?php echo $art['title'];?></a>
                                    <div class="article__info__meta">
                                        <?php
                                        $art_cat = false;
                                        foreach ($categories as $cat){
                                            if ( $cat['id'] == $art['categorie_id']){
                                                $art_cat = $cat;
                                                break;
                                            }
                                        }
                                        ?>
                                        <small>Категория: <a href="categorie.php?categorie=<?php echo $art_cat['id'];?>"><?php echo $art_cat['title'];?></a></small>
                                    </div>
                                    <div class="article__info__preview"><?php echo mb_substr($art['text'],0,50,'utf-8');?>...</div>
                                </div>
                            </article>
                    <?php
                        }
                    ?>


                </div>
              </div>
            </div>

            <div class="block">
              <a href="/categorie.php?categorie=7">Все записи</a>
              <h3>Безопасность [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles = mysqli_query($connection,"SELECT * FROM `articles` WHERE `categorie_id` = 7 ORDER BY `id` DESC LIMIT 10");

                    while ( $art = mysqli_fetch_assoc($articles))
                    {
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image'];?>);"></div>
                            <div class="article__info">
                                <a href="/categorie.php?categorie=<?php echo $art['id'];?>"><?php echo $art['title'];?></a>
                                <div class="article__info__meta">
                                    <?php
                                    $art_cat = false;
                                    foreach ($categories as $cat){
                                        if ( $cat['id'] == $art['categorie_id']){
                                            $art_cat = $cat;
                                            break;
                                        }
                                    }
                                    ?>
                                    <small>Категория: <a href="categorie.php?categorie=<?php echo $art_cat['id'];?>"><?php echo $art_cat['title'];?></a></small>
                                </div>
                                <div class="article__info__preview"><?php echo mb_substr($art['text'],0,50,'utf-8');?>...</div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/categorie.php?categorie=4">Все записи</a>
              <h3>Программирование [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles = mysqli_query($connection,"SELECT * FROM `articles` WHERE `categorie_id` = 4 ORDER BY `id` DESC LIMIT 10");

                    while ( $art = mysqli_fetch_assoc($articles))
                    {
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image'];?>);"></div>
                            <div class="article__info">
                                <a href="/categorie.php?categorie=<?php echo $art['id'];?>"><?php echo $art['title'];?></a>
                                <div class="article__info__meta">
                                    <?php
                                    $art_cat = false;
                                    foreach ($categories as $cat){
                                        if ( $cat['id'] == $art['categorie_id']){
                                            $art_cat = $cat;
                                            break;
                                        }
                                    }
                                    ?>
                                    <small>Категория: <a href="categorie.php?categorie=<?php echo $art_cat['id'];?>"><?php echo $art_cat['title'];?></a></small>
                                </div>
                                <div class="article__info__preview"><?php echo mb_substr($art['text'],0,50,'utf-8');?>...</div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>

                </div>
              </div>
            </div>
          </section>
            <?php require_once 'includes/sidebar.php'; ?>


<?php require_once 'includes/footer.php'; ?>

  </div>

</body>
</html>
