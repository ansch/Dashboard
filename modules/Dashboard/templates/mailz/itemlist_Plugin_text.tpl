{* Purpose of this template: Display plugins in text mailings *}
{foreach item='item' from=$items}
        {$item.name}
        {modurl modname='Dashboard' type='user' func='display' ot=$objectType id=$item.id fqurl=true}
-----
{foreachelse}
    {gt text='No plugins found.'}
{/foreach}
