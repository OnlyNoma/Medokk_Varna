<h1>Нова послуга:</h1>
<?if($alertMessage != null):?>
    <div class="errorMessage">
        <?=$alertMessage?>
    </div>
<?endif;?>
<div class="page review_comment">
    <form action="" method="post">
        <label>Назва:</label>
        <input type="text" name="title" id="title" required>
        <label>Опис:</label>
        <textarea name="description" required></textarea>
        <label>Ціна:</label>
        <input type="text" name="price" id="price" required>
        <input type="submit" name="submit" value="Додати" >
        <div style="clear: both"></div>
    </form>
</div>