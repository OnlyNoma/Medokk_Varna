<h1>Редагування новини: <i><?=$news->title?></i></h1>
<?if($alertMessage != null):?>
    <div class="errorMessage">
        <?=$alertMessage?>
    </div>
<?endif;?>
<div class="page review_comment">
    <form action="" method="post">
        <label>Назва:</label>
        <input type="text" name="title" id="title" required value="<?=$news->title?>">
        <label>Текст:</label>
        <textarea name="text" required><?=$news->text?></textarea>
        <input type="submit" name="submit" value="Додати" >
        <div style="clear: both"></div>
    </form>
</div>