{* Purpose of this template: Display boxes in html mailings *}
{*
<ul>
{foreach item='item' from=$items}
    <li>
        <a href="{modurl modname='Dashboard' type='user' func='display' ot=$objectType id=$item.id fqurl=true}
">{$item.userid}
</a>
    </li>
{foreachelse}
    <li>{gt text='No boxes found.'}</li>
{/foreach}
</ul>
*}

{include file='contenttype/itemlist_Boxes_display_description.tpl'}
