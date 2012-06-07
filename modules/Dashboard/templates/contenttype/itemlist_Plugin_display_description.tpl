{* Purpose of this template: Display plugins within an external context *}

<dl>
{foreach item='item' from=$items}
    <dt>{$item.name}</dt>
{if $item.title}
    <dd>{$item.title|truncate:200:"..."}</dd>
{/if}
    <dd><a href="{modurl modname='Dashboard' type='user' func='display' ot=$objectType id=$item.id}">{gt text='Read more'}</a></dd>
{foreachelse}
    <dt>{gt text='No entries found.'}</dt>
{/foreach}
</dl>
