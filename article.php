<?php
require_once 'includes/config.php';

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
    <?php

    $article = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id` =".(int) $_GET['categorie']);
    if( mysqli_num_rows($article) <=0){
        ?>
        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">

                            <h3>Статья не найдена</h3>
                            <div class="block__content">
                                <div class="full-text">
                                    Запрашиваемая Вами статья не найдена!
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="content__right col-md-4">
                        <?php include "includes/sidebar.php"?>


                    </section>
                </div>
            </div>
        </div>
    <?php
    }
    else
        {
        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection,"UPDATE  `articles` SET `views` = `views` + 1 WHERE `id` =".(int) $_GET['categorie']);
        ?>
        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                                <a>Просмотров:<?php echo $art['views']; ?></a>
                            <h3><?php echo $art['title']; ?></h3>
                            <div class="block__content">
                                <img src="static/images/<?php echo $art['image']; ?>" style="max-width: 100%;">
                                <div class="full-text">
                                    <?php echo $art['text']; ?>
                                </div>
                            </div>
                            </div>

                        <div class="block">
                            <a href="#comment-add-form">Добавить свой</a>
                            <h3>Комментарии</h3>
                            <div class="block__content">
                                <div class="articles articles__vertical">

                                    <?php
                                    $comments = mysqli_query($connection,"SELECT * FROM `comments`  WHERE `articles_id` =".(int) $_GET['categorie'] . " ORDER BY `id` DESC");
                                            if (mysqli_num_rows($comments)<=0){
                                                echo "Нет комментариев!";
                                            }
                                            else {
                                                while ($comment = mysqli_fetch_assoc($comments)) {
                                                    ?>
                                                    <article class="article">
                                                        <div class="article__image"
                                                             style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email']); ?>?s=125);"></div>
                                                        <div class="article__info">
                                                            <div class="article__info__meta"></div>
                                                            <a href="/article.php?categorie=<?php echo $comment['articles_id']; ?>"><?php echo $comment['author']; ?></a>

                                                            <div class="article__info__preview"><?php echo $comment['text']; ?>
                                                                ...
                                                            </div>

                                                    </article>
                                                    <?php
                                                }
                                            }
                                    ?>






                                </div>
                            </div>
                        </div>
                        <div id="comment-add-form" class="block">

                            <h3>Добавить комментарий</h3>
                            <div class="block__content">
                                <form class="form" method="post" action="#comment-add-form">
                                    <?php
                                    if (isset($_POST['do_post']))
                                    {
                                       $errors = array();
                                       if ($_POST['name'] == ''){
                                           $errors[] = 'Введите имя!';
                                       }
                                        if ($_POST['email'] == ''){
                                            $errors[] = 'Введите email!';
                                        }
                                        if ($_POST['text'] == ''){
                                            $errors[] = 'Введите текст!';
                                        }
                                        if (empty($errors)){
                                           $name = $_POST['name'];
                                            $email = $_POST['email'];
                                            $text = $_POST['text'];
                                            $id = $art['id'];


//                                           Mozhem dobavit
                                            mysqli_query($connection, "INSERT INTO `comments`(`author`,`email`,`text`,`articles_id`)
                                            VALUES ($name,$email,$text,$id)");
                                            echo '<span style="color:green; font-weight: bold; margin-bottom: 10px; display: block;">Комментарий успешно добавлен!</span>';
                                        } else{
                                           echo '<span style="color: red; font-weight: bold; margin-bottom: 10px; display: block;">'.$errors['0'].'</span>';

                                        }
                                    }
                                    ?>

                                    <div class="form__group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="name" class="form__control" placeholder="Имя" value="<?php echo $_POST['name'];?>">
                                            </div>

                                            <div class="col-md-4">
                                                <input type="text" name="email" class="form__control" placeholder="Email" value="<?php echo $_POST['email'];?>">
                                        </div>
                                    </div>
                                        <div class="form__group" style="margin-top: 10px">
                                            <textarea class="form__control" name="text" placeholder="Текст комментария..."><?php echo $_POST['text'];?></textarea>
                                        </div>
                                        <div class="form__group">
                                            <input type="submit" name="do_post" value="Добавить комментарий" class="form__control">
                                        </div>

                                </form>
                            </div>
                        </div>

                    </section>
                    <section class="content__right col-md-4">
                        <?php include "includes/sidebar.php"?>


                    </section>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <?php include "includes/footer.php"?>

</div>
</body>
</html>
