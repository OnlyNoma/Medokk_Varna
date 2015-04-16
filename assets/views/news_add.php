<h1>Новый отзыв:</h1>
<?if($alertMessage != null):?>
    <div class="errorMessage">
        <?=$alertMessage?>
    </div>
<?endif;?>
<div class="page review_comment">
    <form action="" method="post">
        <label>Назва:</label>
        <input type="text" name="title" id="title" required>
        <label>Текст:</label>
        <textarea name="text" required></textarea>
        <input type="submit" name="submit" value="Додати" >
        <div style="clear: both"></div>
    </form>
</div>