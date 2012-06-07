{* Purpose of this template: Display boxes in text mailings *}
{foreach item='item' from=$items}
        {$item.userid}
        {modurl modname='Dashboard' type='user' func='display' ot=$objectType id=$item.id fqurl=true}
-----
{foreachelse}
    {gt text='No boxes found.'}
{/foreach}
