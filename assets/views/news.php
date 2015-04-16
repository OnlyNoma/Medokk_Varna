<h1>Новини</h1>
<div class="edit_recalls edit_our_works">
    <form method="post" action="/news/delete/" class="delete_form">
        <?if($alertMessage != null):?>
            <div class="errorMessage">
                <?=$alertMessage?>
            </div>
        <?endif;?>
        <div class="page settings tabs panel">
            <a href="/news/add/" class="subm_link">Нова новина</a>
            <div style="clear: both"></div>
        </div>
        <table>
            <?$i=0;?>
            <?if($vr_count == 0):?>
                <tr><th><h3>Даних для відображення немає :-(</h3></th></tr>
            <?else:?>
                <tr><th></th><th>#</th><th>Название</th><th>Текст</th><th>Дія</th></tr>
                <?foreach($news as $vr): $i++;?>
                    <tr>
                        <td style="padding: 0; text-align: center"><input type="checkbox" name="dell[]" value="<?=$vr->id?>"></td>
                        <td><span><?=$i?></span></td>
                        <td><span><?=$vr->title?></span></td>
                        <td><span><?=$vr->text?></span></td>
                        <td>
                            <a href="/news/edit/<?=$vr->id?>"><img src="/img/edit.gif"></a>
                            <a href="/news/delete/<?=$vr->id?>"><img src="/img/delete.gif"></a>
                        </td>
                    </tr>
                <?endforeach;?>
            <?endif;?>
        </table>
        <input type="submit" name="submit" value="Видалити відмічене"/>
    </form>
</div>