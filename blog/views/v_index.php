<main class="content">
    <div class="container">
        <div class="row">
            <aside class="col">
                <?foreach($categories as $category) :?>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?=BASE_URL?>categories/<?=$category['id_cat']?>"><?=$category['title_categori']?></a></li>
                    </ul>
                <?endforeach;?>
            </aside>
        </div>
        <div class="container__article">
            <article class="article">
                <?foreach($articles as $article) :?>
                    <h1><?=$article['title']?></h1>
                    <p><?=$article['content']?></p>
                    <time><?=$article['dt_add']?></time>
                    <p><a href="<?=BASE_URL?>article/<?=$article['id_article']?>">Read more</a></p>
                <?endforeach;?>
            </article>
        </div>
    </div>
</main>
