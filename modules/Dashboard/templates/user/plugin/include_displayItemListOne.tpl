{* purpose of this template: inclusion template for display of related Plugins in user area *}

<h4>
    <a href="{modurl modname='Dashboard' type='user' func='display' ot='plugin' id=$item.id}">
        {$item.name}
    </a>
    <a id="pluginItem{$item.id}Display" href="{modurl modname='Dashboard' type='user' func='display' ot='plugin' id=$item.id theme='Printer' forcelongurl=true}" title="{gt text='Open quick view window'}" style="display: none">
        {icon type='view' size='extrasmall' __alt='Quick view'}
    </a>
</h4>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
        document.observe('dom:loaded', function() {
            dashboardInitInlineWindow($('pluginItem{{$item.id}}Display'), '{{$item.name|replace:"'":""}}');
        });
    /* ]]> */
    </script>

