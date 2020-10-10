<main class="content">
    <div class="container">
        <article class="one__article">
            <h1 class="article__title"><?=$article['title']?></h1>
            <p class="text"><?=$article['content']?></p>
            <p class="dt__add">
                <time><?=$article['dt_add']?></time>
            </p>
            <p>Категория: <strong><?=$article['title_categori']?></strong></p>
            <?if($flag):?>
                <p><a href="<?=BASE_URL?>edit/<?=$article['id_article']?>">Edit article</a></p>
                <p><a href="<?=BASE_URL?>delete/<?=$article['id_article']?>">Remove article</a></p>
            <?else :?>
                <b><?=$userNickname?></b>
            <?endif;?>
        </article>
    </div>
</main>
