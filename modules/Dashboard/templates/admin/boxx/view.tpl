{* purpose of this template: boxes view view in admin area *}
<div class="dashboard-boxx dashboard-view">
{include file='admin/header.tpl'}
{gt text='Boxx list' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='view' size='small' alt=$templateTitle}
    <h3>{$templateTitle}</h3>
</div>


    {checkpermissionblock component='Dashboard::' instance='.*' level="ACCESS_ADD"}
        {gt text='Create boxx' assign='createTitle'}
        <a href="{modurl modname='Dashboard' type='admin' func='edit' ot='boxx'}" title="{$createTitle}" class="z-icon-es-add">
            {$createTitle}
        </a>
    {/checkpermissionblock}

    {assign var='all' value=0}
    {if isset($showAllEntries) && $showAllEntries eq 1}
        {gt text='Back to paginated view' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='admin' func='view' ot='boxx'}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
        {assign var='all' value=1}
    {else}
        {gt text='Show all entries' assign='linkTitle'}
        <a href="{modurl modname='Dashboard' type='admin' func='view' ot='boxx' all=1}" title="{$linkTitle}" class="z-icon-es-view">
            {$linkTitle}
        </a>
    {/if}

<table class="z-datatable">
    <colgroup>
        <col id="cuserid" />
        <col id="cboxorder" />
        <col id="cblock" />
        <col id="cplugin" />
        <col id="cpage" />
        <col id="cboxdata" />
        <col id="citemactions" />
    </colgroup>
    <thead>
    <tr>
        <th id="huserid" scope="col" class="z-right">
            {sortlink __linktext='Userid' sort='userid' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='boxx'}
        </th>
        <th id="hboxorder" scope="col" class="z-right">
            {sortlink __linktext='Boxorder' sort='boxorder' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='boxx'}
        </th>
        <th id="hblock" scope="col" class="z-right">
            {sortlink __linktext='Block' sort='block' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='boxx'}
        </th>
        <th id="hplugin" scope="col" class="z-left">
            {sortlink __linktext='Plugin' sort='plugin' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='boxx'}
        </th>
        <th id="hpage" scope="col" class="z-right">
            {sortlink __linktext='Page' sort='page' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='boxx'}
        </th>
        <th id="hboxdata" scope="col" class="z-left">
            {sortlink __linktext='Boxdata' sort='boxdata' currentsort=$sort sortdir=$sdir all=$all modname='Dashboard' type='admin' func='view' ot='boxx'}
        </th>
        <th id="hitemactions" scope="col" class="z-right z-order-unsorted">{gt text='Actions'}</th>
    </tr>
    </thead>
    <tbody>

    {foreach item='boxx' from=$items}
    <tr class="{cycle values='z-odd, z-even'}">
        <td headers="huserid" class="z-right">
            {$boxx.userid|notifyfilters:'dashboard.filterhook.boxes'}
        </td>
        <td headers="hboxorder" class="z-right">
            {$boxx.boxorder}
        </td>
        <td headers="hblock" class="z-right">
            {$boxx.block}
        </td>
        <td headers="hplugin" class="z-left">
            {$boxx.plugin}
        </td>
        <td headers="hpage" class="z-right">
            {$boxx.page}
        </td>
        <td headers="hboxdata" class="z-left">
            {$boxx.boxdata}
        </td>
        <td headers="hitemactions" class="z-right z-nowrap z-w02">
            {if count($boxx._actions) gt 0}
            {strip}
                {foreach item='option' from=$boxx._actions}
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
            {gt text='No boxes found.'}
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

