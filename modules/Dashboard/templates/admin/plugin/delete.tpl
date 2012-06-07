{* purpose of this template: plugins delete confirmation view in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-plugin dashboard-delete">
{gt text='Delete plugin' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='delete' size='small' __alt='Delete'}
    <h3>{$templateTitle}</h3>
</div>

    <p class="z-warningmsg">{gt text='Do you really want to delete this plugin ?'}</p>

    <form class="z-form" action="{modurl modname='Dashboard' type='admin' func='delete' ot='plugin' id=$plugin.id}" method="post">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" id="confirmation" name="confirmation" value="1" />
            <fieldset>
                <legend>{gt text='Confirmation prompt'}</legend>
                <div class="z-buttons z-formbuttons">
                    {gt text='Delete' assign='deleteTitle'}
                    {button src='14_layer_deletelayer.png' set='icons/small' text=$deleteTitle title=$deleteTitle class='z-btred'}
                    <a href="{modurl modname='Dashboard' type='admin' func='view' ot='plugin'}">{icon type='cancel' size='small' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
                </div>
            </fieldset>

            {notifydisplayhooks eventname='dashboard.ui_hooks.plugins.form_delete' id="`$plugin.id`" assign='hooks'}
            {foreach from=$hooks key='hookName' item='hook'}
            <fieldset>
                <legend>{$hookName}</legend>
                {$hook}
            </fieldset>
            {/foreach}
        </div>
    </form>
</div>
{include file='admin/footer.tpl'}
