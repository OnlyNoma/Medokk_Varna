<h1>Відгуки</h1>
<div class="edit_recalls edit_our_works">
    <form method="post" action="/recalls/delete/" class="delete_form">
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
                <tr><th></th><th>#</th><th>Прізвище</th><th>Ім'я</th><th>Email адреса</th><th>Відгук</th><th>Дія</th></tr>
                <?foreach($recalls as $vr): $i++;?>
                    <tr>
                        <td style="padding: 0; text-align: center"><input type="checkbox" name="dell[]" value="<?=$vr->id?>"></td>
                        <td><span><?=$i?></span></td>
                        <td><span><?=$vr->firstname?></span></td>
                        <td><span><?=$vr->lastname?></span></td>
                        <td><span><?=$vr->email?></span></td>
                        <td><span><?=$vr->recall?></span></td>
                        <td>
                            <a href="/recalls/delete/<?=$vr->id?>"><img src="/img/delete.gif"></a>
                        </td>
                    </tr>
                <?endforeach;?>
            <?endif;?>
        </table>
        <input type="submit" name="submit" value="Видалити відмічене"/>
    </form>
</div>