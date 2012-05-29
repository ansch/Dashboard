{* purpose of this template: plugins view view in user area *}
<div class="dashboard-plugins dashboard-view">
{include file='user/header.tpl'}
{gt text='Plugins list' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>


    {checkpermissionblock component='Dashboard::' instance='.*' level="ACCESS_ADD"}
        {gt text='Create plugins' assign='createTitle'}
        <a href="{modurl modname='Dashboard' type='user' func='edit' ot='plugins'}" title="{$createTitle}" class="z-icon-es-add">
            {$createTitle}
        </a>
    {/checkpermissionblock}

    {assign var='all' value=0}
    {if isset($showAllEntries) && $showAllEntries eq 1}
        {gt text='Back to paginated view' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='user' func='view' ot='plugins'}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
        {assign var='all' value=1}
    {else}
        {gt text='Show all entries' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='user' func='view' ot='plugins' all=1}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
    {/if}

<table class="z-datatable">
    <colgroup>
        <col id="cactive" />
        <col id="cname" />
        <col id="ctitle" />
        <col id="cdbsize" />
        <col id="cdbfile" />
        <col id="cajax" />
        <col id="citemactions" />
    </colgroup>
    <thead>
    <tr>
        <th id="hactive" scope="col" class="z-right">
            {sortlink __linktext='Active' sort='active' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='plugins'}
        </th>
        <th id="hname" scope="col" class="z-left">
            {sortlink __linktext='Name' sort='name' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='plugins'}
        </th>
        <th id="htitle" scope="col" class="z-left">
            {sortlink __linktext='Title' sort='title' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='plugins'}
        </th>
        <th id="hdbsize" scope="col" class="z-right">
            {sortlink __linktext='Dbsize' sort='dbsize' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='plugins'}
        </th>
        <th id="hdbfile" scope="col" class="z-left">
            {sortlink __linktext='Dbfile' sort='dbfile' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='plugins'}
        </th>
        <th id="hajax" scope="col" class="z-right">
            {sortlink __linktext='Ajax' sort='ajax' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='plugins'}
        </th>
        <th id="hitemactions" scope="col" class="z-right z-order-unsorted">{gt text='Actions'}</th>
    </tr>
    </thead>
    <tbody>

    {foreach item='plugins' from=$items}
    <tr class="{cycle values='z-odd, z-even'}">
        <td headers="hactive" class="z-right">
            {$plugins.active}
        </td>
        <td headers="hname" class="z-left">
            {$plugins.name|notifyfilters:'dashboard.filterhook.plugins'}
        </td>
        <td headers="htitle" class="z-left">
            {$plugins.title}
        </td>
        <td headers="hdbsize" class="z-right">
            {$plugins.dbsize}
        </td>
        <td headers="hdbfile" class="z-left">
            {$plugins.dbfile}
        </td>
        <td headers="hajax" class="z-right">
            {$plugins.ajax}
        </td>
        <td headers="hitemactions" class="z-right z-nowrap z-w02">
            {if count($plugins._actions) gt 0}
            {strip}
                {foreach item='option' from=$plugins._actions}
                    <a href="{$option.url.type|dashboardActionUrl:$option.url.func:$option.url.arguments}" title="{$option.linkTitle|safetext}"{if $option.icon eq 'preview'} target="_blank"{/if}>
                        {icon type=$option.icon size='extrasmall' alt=$option.linkText|safetext}
                    </a>
                {/foreach}
            {/strip}
            {/if}
        </td>
    </tr>
    {foreachelse}
        <tr class="z-datatableempty">
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

    {notifydisplayhooks eventname='dashboard.ui_hooks.plugins.display_view' urlobject=$currentUrlObject assign='hooks'}
    {foreach key='hookname' item='hook' from=$hooks}
        {$hook}
    {/foreach}
</div>
</div>
{include file='user/footer.tpl'}

