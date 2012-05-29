{* purpose of this template: plugins display view in user area *}
{include file='user/header.tpl'}
<div class="dashboard-plugins dashboard-display">
{gt text='Plugins' assign='templateTitle'}
{assign var='templateTitle' value=$plugins.name|default:$templateTitle}
{pagesetvar name='title' value=$templateTitle|@html_entity_decode}
<div class="z-frontendcontainer">
    <h2>{$templateTitle|notifyfilters:'dashboard.filter_hooks.plugins.filter'}</h2>


<dl id="Dashboard_body">
    <dt>{gt text='Active'}</dt>
    <dd>{$plugins.active}</dd>
    <dt>{gt text='Title'}</dt>
    <dd>{$plugins.title}</dd>
    <dt>{gt text='Dbsize'}</dt>
    <dd>{$plugins.dbsize}</dd>
    <dt>{gt text='Dbfile'}</dt>
    <dd>{$plugins.dbfile}</dd>
    <dt>{gt text='Ajax'}</dt>
    <dd>{$plugins.ajax}</dd>
</dl>
    {include file='user/include_standardfields_display.tpl' obj=$plugins}

{if !isset($smarty.get.theme) || $smarty.get.theme ne 'Printer'}
{if count($plugins._actions) gt 0}
    <p>{strip}
    {foreach item='option' from=$plugins._actions}
        <a href="{$option.url.type|dashboardActionUrl:$option.url.func:$option.url.arguments}" title="{$option.linkTitle|safetext}" class="z-icon-es-{$option.icon}">
            {$option.linkText|safetext}
        </a>
    {/foreach}
    {/strip}</p>
{/if}

{* include display hooks *}
{notifydisplayhooks eventname='dashboard.ui_hooks.plugins.display_view' id=$plugins.id urlobject=$currentUrlObject assign='hooks'}
{foreach key='hookname' item='hook' from=$hooks}
    {$hook}
{/foreach}

{/if}

</div>
</div>
{include file='user/footer.tpl'}

