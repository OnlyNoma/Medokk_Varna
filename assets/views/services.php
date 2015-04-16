<h1>Послуги</h1>
<div class="edit_recalls edit_our_works">
    <form method="post" action="/services/delete/" class="delete_form">
        <?if($alertMessage != null):?>
            <div class="errorMessage">
                <?=$alertMessage?>
            </div>
        <?endif;?>
        <div class="page settings tabs panel">
            <a href="/services/add/" class="subm_link">Нова послуга</a>
            <div style="clear: both"></div>
        </div>
        <table>
            <?$i=0;?>
            <?if($vr_count == 0):?>
                <tr><th><h3>Даних для відображення немає :-(</h3></th></tr>
            <?else:?>
                <tr><th></th><th>#</th><th>Назва</th><th>Опис</th><th>Ціна</th><th>Дія</th></tr>
                <?foreach($services as $vr): $i++;?>
                    <tr>
                        <td style="padding: 0; text-align: center"><input type="checkbox" name="dell[]" value="<?=$vr->id?>"></td>
                        <td><span><?=$i?></span></td>
                        <td><span><?=$vr->title?></span></td>
                        <td><span><?=$vr->description?></span></td>
                        <td><span><?=$vr->price?></span></td>
                        <td>
                            <a href="/services/edit/<?=$vr->id?>"><img src="/img/edit.gif"></a>
                            <a href="/services/delete/<?=$vr->id?>"><img src="/img/delete.gif"></a>
                        </td>
                    </tr>
                <?endforeach;?>
            <?endif;?>
        </table>
        <input type="submit" name="submit" value="Видалити відмічене"/>
    </form>
</div>