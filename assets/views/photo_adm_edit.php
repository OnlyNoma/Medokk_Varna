<h1>Редагування</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="page settings tabs panel">
        <input type="submit" name="submit" value="Сохранить" >
    </div>
    <div class="page settings tabs review_comment">
        <div class="left">
            <label>Фотографии:</label>
            <div class="m_cont">
                <input type="file" name="photo[]" class="multiple" onchange='viewAddImg(this,event);'>
            </div>
            <div class="buttons">
                <div class="addInput">Добавить фотку</div>
            </div>
            <select name="category" required>
                <?foreach($category_all as $p):?>
                    <option value="<?=$p->id?>"><?=$p->title?></option>
                <?endforeach;?>
            </select>
            <label onclick="viewCat(this)" style="cursor: pointer; padding: 10px; 0">Додати нову категорію</label>
            <div class="hiddenCat">
                <input type="text" id="cat">
                <div class="buttons">
                    <div class="addCat">Додати</div>
                </div>
            </div>
        </div>
        <div class="view_img_mult pvPhotos">
            <h2>Картинки, которые будут добавлены:</h2>
            <?foreach($category->photos->find_all() as $pic):?>
                <div class='blob_container' style="width: 180px;">
                    <span class='delete' onclick='deletePicture(this,<?=$pic->id?>)'></span>
                    <img src ='/img/photos/<?=$pic->path?>'>
                </div>
            <?endforeach;?>
        </div>
    </div>
</form>