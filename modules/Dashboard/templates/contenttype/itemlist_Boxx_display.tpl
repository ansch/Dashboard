{* Purpose of this template: Display boxes within an external context *}

{foreach item='item' from=$items}
    <h3>{$item.userid}</h3>
    <p><a href="{modurl modname='Dashboard' type='user' func='display' ot=$objectType id=$item.id}">{gt text='Read more'}</a></p>
{/foreach}
