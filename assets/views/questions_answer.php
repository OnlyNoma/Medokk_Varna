<h1>Додати відповідь: </h1>
<?if($alertMessage != null):?>
    <div class="errorMessage">
        <?=$alertMessage?>
    </div>
<?endif;?>
<p><b>Написав(ла):</b> <?=$questions->name?></p>
<p><b>Питання:</b> <?=$questions->question?></p>
<div class="page review_comment">
    <form action="" method="post">
        <label>Відповідь:</label>
        <textarea name="answer" required><?=$questions->answer?></textarea>
        <input type="submit" name="submit" value="Додати" >
        <div style="clear: both"></div>
    </form>
</div>