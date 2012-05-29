{* Purpose of this template: Display plugins in html mailings *}
{*
<ul>
{foreach item='item' from=$items}
    <li>
        <a href="{modurl modname='Dashboard' type='user' func='display' ot=$objectType id=$item.id fqurl=true}
">{$item.name}
</a>
    </li>
{foreachelse}
    <li>{gt text='No plugins found.'}</li>
{/foreach}
</ul>
*}

{include file='contenttype/itemlist_Plugins_display_description.tpl'}
