{extends "layout.tpl"}

{block "content"}
    <form action="/default/add" method="post">
        <label>Заголовок</label><br/>
        <input type="text" name="title" value="" /><br/>
        <label>Текст</label><br/>
        <textarea name="text"></textarea>><br/>
        <button type="submit">Добавить новость</button>
    </form>
    <br/>

    {if count($news)}
        {foreach $news as $item}
            <h2>{$item->title}</h2>
            <p>{$item->text}</p>
            <br/>
        {/foreach}
    {/if}
{/block}