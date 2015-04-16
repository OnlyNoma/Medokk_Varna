<h1>Редагування послуги: <i><?=$services->title?></i></h1>
<?if($alertMessage != null):?>
    <div class="errorMessage">
        <?=$alertMessage?>
    </div>
<?endif;?>
<div class="page review_comment">
    <form action="" method="post">
        <label>Назва:</label>
        <input type="text" name="title" id="title" required value="<?=$services->title?>">
        <label>Опис:</label>
        <textarea name="description" required><?=$services->description?></textarea>
        <label>Ціна:</label>
        <input type="text" name="price" id="price" required value="<?=$services->price?>">
        <input type="submit" name="submit" value="Додати" >
        <div style="clear: both"></div>
    </form>
</div>