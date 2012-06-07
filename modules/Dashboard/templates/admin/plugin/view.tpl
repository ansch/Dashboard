{* purpose of this template: plugins view view in admin area *}
<div class="dashboard-plugin dashboard-view">
{include file='admin/header.tpl'}
{gt text='Plugin list' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='view' size='small' alt=$templateTitle}
    <h3>{$templateTitle}</h3>
</div>


    {checkpermissionblock component='Dashboard::' instance='.*' level="ACCESS_ADD"}
        {gt text='Create plugin' assign='createTitle'}
        <a href="{modurl modname='Dashboard' type='admin' func='edit' ot='plugin'}" title="{$createTitle}" class="z-icon-es-add">
            {$createTitle}
        </a>
    {/checkpermissionblock}

    {assign var='all' value=0}
    {if isset($showAllEntries) && $showAllEntries eq 1}
        {gt text='Back to paginated view' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='admin' func='view' ot='plugin'}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
        {assign var='all' value=1}
    {else}
        {gt text='Show all entries' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='admin' func='view' ot='plugin' all=1}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
    {/if}

<table class="z-datatable">
    <colgroup>
        <col id="cactive" />
        <col id="cname" />
        <col id="ctitle" />
        <col id="cboxsize" />
        <col id="cpluginfile" />
        <col id="cajax" />
        <col id="citemactions" />
    </colgroup>
    <thead>
    <tr>
        <th id="hactive" scope="col" class="z-right">
            {sortlink __linktext='Active' sort='active' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='plugin'}
        </th>
        <th id="hname" scope="col" class="z-left">
            {sortlink __linktext='Name' sort='name' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='plugin'}
        </th>
        <th id="htitle" scope="col" class="z-left">
            {sortlink __linktext='Title' sort='title' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='plugin'}
        </th>
        <th id="hboxsize" scope="col" class="z-right">
            {sortlink __linktext='Boxsize' sort='boxsize' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='plugin'}
        </th>
        <th id="hpluginfile" scope="col" class="z-left">
            {sortlink __linktext='Pluginfile' sort='pluginfile' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='plugin'}
        </th>
        <th id="hajax" scope="col" class="z-right">
            {sortlink __linktext='Ajax' sort='ajax' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='plugin'}
        </th>
        <th id="hitemactions" scope="col" class="z-right z-order-unsorted">{gt text='Actions'}</th>
    </tr>
    </thead>
    <tbody>

    {foreach item='plugin' from=$items}
    <tr class="{cycle values='z-odd, z-even'}">
        <td headers="hactive" class="z-right">
            {$plugin.active}
        </td>
        <td headers="hname" class="z-left">
            {$plugin.name|notifyfilters:'dashboard.filterhook.plugins'}
        </td>
        <td headers="htitle" class="z-left">
            {$plugin.title}
        </td>
        <td headers="hboxsize" class="z-right">
            {$plugin.boxsize}
        </td>
        <td headers="hpluginfile" class="z-left">
            {$plugin.pluginfile}
        </td>
        <td headers="hajax" class="z-right">
            {$plugin.ajax}
        </td>
        <td headers="hitemactions" class="z-right z-nowrap z-w02">
            {if count($plugin._actions) gt 0}
            {strip}
                {foreach item='option' from=$plugin._actions}
                    <a href="{$option.url.type|dashboardActionUrl:$option.url.func:$option.url.arguments}" title="{$option.linkTitle|safetext}"{if $option.icon eq 'preview'} target="_blank"{/if}>
                        {icon type=$option.icon size='extrasmall' alt=$option.linkText|safetext}
                    </a>
                {/foreach}
            {/strip}
            {/if}
        </td>
    </tr>
    {foreachelse}
        <tr class="z-admintableempty">
          <td class="z-left" colspan="7">
            {gt text='No plugins found.'}
          </td>
        </tr>
    {/foreach}

    </tbody>
</table>

    {if !isset($showAllEntries) || $showAllEntries ne 1}
        {pager rowcount=$pager.numitems limit=$pager.itemsperpage display='page'}
    {/if}
</div>
{include file='admin/footer.tpl'}

