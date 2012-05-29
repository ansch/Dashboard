{* Purpose of this template: Display boxes within an external context *}

<dl>
{foreach item='item' from=$items}
    <dt>{$item.userid}</dt>
{if $item.plugin}
    <dd>{$item.plugin|truncate:200:"..."}</dd>
{/if}
    <dd><a href="{modurl modname='Dashboard' type='user' func='display' ot=$objectType id=$item.id}">{gt text='Read more'}</a></dd>
{foreachelse}
    <dt>{gt text='No entries found.'}</dt>
{/foreach}
</dl>
