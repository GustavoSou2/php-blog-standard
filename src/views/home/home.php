<?php

$user = unserialize($_COOKIE['user']);

$newsController = new Rr64\App\Controller\NewsController;
$news = $newsController->getNews();


function differenceBetweenDate($date)
{
    $today = new DateTime();
    $diff = $today->diff(new DateTime($date));
    $days = $diff->format('%a');
    return $days == 0 ? 'Postado hoje' : $diff->format('%a') . 'dias';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📣 Blog</title>

</head>

<body id="home">
    <header class="topbar">
        <span class="logo">KDev</span>
        <section class="user">
            <button type="button" class="add-post" data-bs-toggle="modal" data-bs-target="#exampleModal">Criar postagem</button>
            <span><?= $user['username'] ?></span>
            <div class="circle-avatar"><?= $user['username'][0] ?></div>
            <a href="/logout" class="log-out" id="logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </section>
    </header>
    <main class="content">
        <section class="search">
            <label for="search_field" class="search--field-container">
                🔍
                <input type="text" id="search_field" class="search--field" placeholder="Pesquisar">
            </label>
        </section>
        <section class="posts">
            <?php if (!empty($news) && sizeof($news) != 0) : ?>
                <!--  -->
                <?php for ($i = 0; $i < sizeof($news); $i++) : ?>
                    <div class="post--container">
                        <div class="post--user">
                            <div class="circle-avatar"><?= $news[$i]['username'][0] ?></div>
                            <div class="post--user-info">
                                <span class="post--user-name"><?= $news[$i]['username'] ?></span>
                                <span class="post--user-date"><?= date("M d", strtotime($news[$i]['post_date'])) ?> (<?= differenceBetweenDate($news[$i]['post_date']) ?>)</span>
                            </div>
                        </div>
                        <div class="post--title"><?= $news[$i]['title'] ?></div>
                        <div class="post--content"><?= $news[$i]['content'] ?></div>
                    </div>
                <?php endfor; ?>
            <?php else : ?>
                <section class="list-empty">
                    <img src="https://ouch-cdn2.icons8.com/nC3HaCGSAW-r9xtJ9b1iDjFqhqxykpUZxThkxKwePnk/rs:fit:684:456/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9zdmcvMy82/YTk5NTJiMi1mNWVh/LTRkNDAtYjZlMi1h/ZGQzODUwYTIwMjUu/c3Zn.png" alt="" class="list-is-empty" srcset="">
                    <span>Nenhuma postagem 😥</span>
                </section>
            <?php endif; ?>
        </section>
    </main>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form--container" action="/home" method="POST">
                        <section class="form--presentation">
                            <span class="form--presentation-title">Criar postagem</span>
                            <span class="form--presentation-description">Escreva uma nova postagem ✏️</span>
                        </section>
                        <div class="form--group">
                            <label for="validationServer01" class="form-label">Título</label>
                            <input type="text" name="title" class="form-control" id="validationServer01" required>
                        </div>
                        <div class="form--group">
                            <label for="validationTextarea" class="form-label">Conteúdo</label>
                            <textarea class="form-control" name="content" id="validationTextarea" rows="5" placeholder="Digite o conteúdo" required></textarea>
                        </div>

                        <div class="button--group">
                            <button type="button" class="button--close" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="button--add">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="css/home.css">
</body>

</html>