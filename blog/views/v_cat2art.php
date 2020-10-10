<main class="content">
    <div class="container">
        <article class="article">
            <?foreach($allArtOfCat as $article) :?>
                <h1><?=$article['title']?></h1>
                <p><?=$article['content']?></p>
                <time><?=$article['dt_add']?></time>
                <p><a href="<?=BASE_URL?>article/<?=$article['id_article']?>">Read more</a></p>
            <?endforeach;?>
        </article>
    </div>
</main>
