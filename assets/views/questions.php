<h1>Питання і відповіді</h1>
<div class="edit_recalls edit_our_works">
    <form method="post" action="/questions/delete/" class="delete_form">
        <?if($alertMessage != null):?>
            <div class="errorMessage">
                <?=$alertMessage?>
            </div>
        <?endif;?>
        <table>
            <?$i=0;?>
            <?if($vr_count == 0):?>
                <tr><th><h3>Даних для відображення немає :-(</h3></th></tr>
            <?else:?>
                <tr><th></th><th>#</th><th>Ім'я</th><th>Питання</th><th>Відповідь</th><th>Дія</th></tr>
                <?foreach($questions as $vr): $i++;?>
                    <tr>
                        <td style="padding: 0; text-align: center"><input type="checkbox" name="dell[]" value="<?=$vr->id?>"></td>
                        <td><span><?=$i?></span></td>
                        <td><span><?=$vr->name?></span></td>
                        <td><span><?=$vr->question?></span></td>
                        <td><span><?=$vr->answer?></span></td>
                        <td>
                            <a href="/questions/answer/<?=$vr->id?>"><img src="/img/edit.gif"></a>
                            <a href="/questions/delete/<?=$vr->id?>"><img src="/img/delete.gif"></a>
                        </td>
                    </tr>
                <?endforeach;?>
            <?endif;?>
        </table>
        <input type="submit" name="submit" value="Видалити відмічене"/>
    </form>
</div>