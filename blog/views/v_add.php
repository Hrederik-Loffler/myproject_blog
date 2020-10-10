<main class="content">
    <div class="container">
        <div class="fields">
            <form class="form" method="POST">
                <select name="id_cat" id="id_cat">
                    <?foreach($cats as $cat):?>
                        <option value="<?=$cat['id_cat']?>"
                            <?=($cat['id_cat'] == $fields['id_cat'] ? 'selected' : '')?>>
                            <?=$cat['title_categori']?>
                        </oprion>
                    <?endforeach;?>
                </select>
            
                <div class="form-group">
                    <label for="article-title" class="form_c"></label>
                    <input type="text" class="form-control" name="title" id="article-title" placeholder="Заголовок" value="<?=$fields['title']?>">
                </div>

                <div class="form-group">
                    <textarea cols="50" rows="15" name="content"><?=$fields['content']?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                <div class="error">
                    <? foreach($errors as $error) :?>
                        <p><?=$error?></p>
                    <? endforeach;?>
                </div>
                
            </form>
        </div>
    </div>
</main>


