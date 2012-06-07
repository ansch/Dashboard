{* purpose of this template: boxes display view in user area *}
{include file='user/header.tpl'}
<div class="dashboard-boxx dashboard-display">
{gt text='Boxx' assign='templateTitle'}
{assign var='templateTitle' value=$boxx.userid|default:$templateTitle}
{pagesetvar name='title' value=$templateTitle|@html_entity_decode}
<div class="z-frontendcontainer">
    <h2>{$templateTitle|notifyfilters:'dashboard.filter_hooks.boxes.filter'}</h2>


<dl id="Dashboard_body">
    <dt>{gt text='Boxorder'}</dt>
    <dd>{$boxx.boxorder}</dd>
    <dt>{gt text='Block'}</dt>
    <dd>{$boxx.block}</dd>
    <dt>{gt text='Plugin'}</dt>
    <dd>{$boxx.plugin}</dd>
    <dt>{gt text='Page'}</dt>
    <dd>{$boxx.page}</dd>
    <dt>{gt text='Boxdata'}</dt>
    <dd>{$boxx.boxdata}</dd>
</dl>
    {include file='user/include_standardfields_display.tpl' obj=$boxx}

{if !isset($smarty.get.theme) || $smarty.get.theme ne 'Printer'}
{if count($boxx._actions) gt 0}
    <p>{strip}
    {foreach item='option' from=$boxx._actions}
        <a href="{$option.url.type|dashboardActionUrl:$option.url.func:$option.url.arguments}" title="{$option.linkTitle|safetext}" class="z-icon-es-{$option.icon}">
            {$option.linkText|safetext}
        </a>
    {/foreach}
    {/strip}</p>
{/if}

{* include display hooks *}
{notifydisplayhooks eventname='dashboard.ui_hooks.boxes.display_view' id=$boxx.id urlobject=$currentUrlObject assign='hooks'}
{foreach key='hookname' item='hook' from=$hooks}
    {$hook}
{/foreach}

{/if}

</div>
</div>
{include file='user/footer.tpl'}

