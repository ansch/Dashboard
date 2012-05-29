{* purpose of this template: boxes view view in user area *}
<div class="dashboard-boxes dashboard-view">
{include file='user/header.tpl'}
{gt text='Boxes list' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>


    {checkpermissionblock component='Dashboard::' instance='.*' level="ACCESS_ADD"}
        {gt text='Create boxes' assign='createTitle'}
        <a href="{modurl modname='Dashboard' type='user' func='edit' ot='boxes'}" title="{$createTitle}" class="z-icon-es-add">
            {$createTitle}
        </a>
    {/checkpermissionblock}

    {assign var='all' value=0}
    {if isset($showAllEntries) && $showAllEntries eq 1}
        {gt text='Back to paginated view' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='user' func='view' ot='boxes'}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
        {assign var='all' value=1}
    {else}
        {gt text='Show all entries' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='user' func='view' ot='boxes' all=1}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
    {/if}

<table class="z-datatable">
    <colgroup>
        <col id="cuserid" />
        <col id="cdbposition" />
        <col id="cblock" />
        <col id="cplugin" />
        <col id="cpage" />
        <col id="citemactions" />
    </colgroup>
    <thead>
    <tr>
        <th id="huserid" scope="col" class="z-right">
            {sortlink __linktext='Userid' sort='userid' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='boxes'}
        </th>
        <th id="hdbposition" scope="col" class="z-right">
            {sortlink __linktext='Dbposition' sort='dbposition' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='boxes'}
        </th>
        <th id="hblock" scope="col" class="z-right">
            {sortlink __linktext='Block' sort='block' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='boxes'}
        </th>
        <th id="hplugin" scope="col" class="z-left">
            {sortlink __linktext='Plugin' sort='plugin' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='boxes'}
        </th>
        <th id="hpage" scope="col" class="z-right">
            {sortlink __linktext='Page' sort='page' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='user' func='view' ot='boxes'}
        </th>
        <th id="hitemactions" scope="col" class="z-right z-order-unsorted">{gt text='Actions'}</th>
    </tr>
    </thead>
    <tbody>

    {foreach item='boxes' from=$items}
    <tr class="{cycle values='z-odd, z-even'}">
        <td headers="huserid" class="z-right">
            {$boxes.userid|notifyfilters:'dashboard.filterhook.boxes'}
        </td>
        <td headers="hdbposition" class="z-right">
            {$boxes.dbposition}
        </td>
        <td headers="hblock" class="z-right">
            {$boxes.block}
        </td>
        <td headers="hplugin" class="z-left">
            {$boxes.plugin}
        </td>
        <td headers="hpage" class="z-right">
            {$boxes.page}
        </td>
        <td headers="hitemactions" class="z-right z-nowrap z-w02">
            {if count($boxes._actions) gt 0}
            {strip}
                {foreach item='option' from=$boxes._actions}
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
          <td class="z-left" colspan="6">
            {gt text='No boxes found.'}
          </td>
        </tr>
    {/foreach}

    </tbody>
</table>

    {if !isset($showAllEntries) || $showAllEntries ne 1}
        {pager rowcount=$pager.numitems limit=$pager.itemsperpage display='page'}
    {/if}

    {notifydisplayhooks eventname='dashboard.ui_hooks.boxes.display_view' urlobject=$currentUrlObject assign='hooks'}
    {foreach key='hookname' item='hook' from=$hooks}
        {$hook}
    {/foreach}
</div>
</div>
{include file='user/footer.tpl'}

