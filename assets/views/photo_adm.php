<h1>Фотогалерея</h1>
<div class="edit_recalls edit_our_works">
    <form method="post" action="/photogallery/delete/" class="delete_form">
        <div class="page settings tabs panel">
            <a href="/photogallery/add/" class="subm_link">Додати</a>
            <div style="clear: both"></div>
        </div>
        <table>
            <?$i=0;?>
            <?if($ph_count == 0):?>
                <tr><th><h3>Данных для отображения нету :-(</h3></th></tr>
            <?else:?>
                <tr><th></th><th>#</th><th>Картинка</th><th>Категорія</th></tr>
                <?foreach($category as $com):?>
                    <?foreach($com->photos->find_all() as $photos): $i++;?>
                    <tr>
                        <td style="padding: 0; text-align: center"><input type="checkbox" name="dell[]" value="<?=$photos->id?>"></td>
                        <td><span><?=$i?></span></td>
                        <td>
                            <img src="/img/photos/<?=$photos->path?>">
                        </td>
                        <td><span><?=$com->title?></span></td>
                        <td>
                            <a href="/photogallery/edit/<?=$com->id?>"><img src="/img/edit.gif"></a>
                            <a href="/photogallery/delete/<?=$photos->id?>"><img src="/img/delete.gif"></a>
                        </td>
                    </tr>
                     <?endforeach;?>
                <?endforeach;?>
            <?endif;?>
        </table>
        <input type="submit" name="submit" value="Удалить виделенное"/>
    </form>
</div>