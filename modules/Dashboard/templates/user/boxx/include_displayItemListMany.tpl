{* purpose of this template: inclusion template for display of related Boxes in user area *}

{if isset($items) && $items ne null}
<ul class="relatedItemList Boxx">
{foreach name='relLoop' item='item' from=$items}
    <li>
    <a href="{modurl modname='Dashboard' type='user' func='display' ot='boxx' id=$item.id}">
        {$item.userid}
    </a>
    <a id="boxxItem{$item.id}Display" href="{modurl modname='Dashboard' type='user' func='display' ot='boxx' id=$item.id theme='Printer' forcelongurl=true}" title="{gt text='Open quick view window'}" style="display: none">
        {icon type='view' size='extrasmall' __alt='Quick view'}
    </a>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
        document.observe('dom:loaded', function() {
            dashboardInitInlineWindow($('boxxItem{{$item.id}}Display'), '{{$item.userid|replace:"'":""}}');
        });
    /* ]]> */
    </script>

    </li>
{/foreach}
</ul>
{/if}

