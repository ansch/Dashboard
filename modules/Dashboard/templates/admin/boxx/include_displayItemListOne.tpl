{* purpose of this template: inclusion template for display of related Boxes in admin area *}

<h4>
    <a href="{modurl modname='Dashboard' type='admin' func='display' ot='boxx' id=$item.id}">
        {$item.userid}
    </a>
    <a id="boxxItem{$item.id}Display" href="{modurl modname='Dashboard' type='admin' func='display' ot='boxx' id=$item.id theme='Printer'}" title="{gt text='Open quick view window'}" style="display: none">
        {icon type='view' size='extrasmall' __alt='Quick view'}
    </a>
</h4>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
        document.observe('dom:loaded', function() {
            dashboardInitInlineWindow($('boxxItem{{$item.id}}Display'), '{{$item.userid|replace:"'":""}}');
        });
    /* ]]> */
    </script>

