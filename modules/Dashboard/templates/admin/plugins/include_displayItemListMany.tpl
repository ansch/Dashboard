{* purpose of this template: inclusion template for display of related Plugins in admin area *}

{if isset($items) && $items ne null}
<ul class="relatedItemList Plugins">
{foreach name='relLoop' item='item' from=$items}
    <li>
    <a href="{modurl modname='Dashboard' type='admin' func='display' ot='plugins' id=$item.id}">
        {$item.name}
    </a>
    <a id="pluginsItem{$item.id}Display" href="{modurl modname='Dashboard' type='admin' func='display' ot='plugins' id=$item.id theme='Printer'}" title="{gt text='Open quick view window'}" style="display: none">
        {icon type='view' size='extrasmall' __alt='Quick view'}
    </a>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
        document.observe('dom:loaded', function() {
            dashboardInitInlineWindow($('pluginsItem{{$item.id}}Display'), '{{$item.name|replace:"'":""}}');
        });
    /* ]]> */
    </script>

    </li>
{/foreach}
</ul>
{/if}
