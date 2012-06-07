{* purpose of this template: boxes delete confirmation view in user area *}
{include file='user/header.tpl'}
<div class="dashboard-boxx dashboard-delete">
{gt text='Delete boxx' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>

    <p class="z-warningmsg">{gt text='Do you really want to delete this boxx ?'}</p>

    <form class="z-form" action="{modurl modname='Dashboard' type='user' func='delete' ot='boxx' id=$boxx.id}" method="post">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" id="confirmation" name="confirmation" value="1" />
            <fieldset>
                <legend>{gt text='Confirmation prompt'}</legend>
                <div class="z-buttons z-formbuttons">
                    {gt text='Delete' assign='deleteTitle'}
                    {button src='14_layer_deletelayer.png' set='icons/small' text=$deleteTitle title=$deleteTitle class='z-btred'}
                    <a href="{modurl modname='Dashboard' type='user' func='view' ot='boxx'}">{icon type='cancel' size='small' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
                </div>
            </fieldset>

            {notifydisplayhooks eventname='dashboard.ui_hooks.boxes.form_delete' id="`$boxx.id`" assign='hooks'}
            {foreach from=$hooks key='hookName' item='hook'}
            <fieldset>
                <legend>{$hookName}</legend>
                {$hook}
            </fieldset>
            {/foreach}
        </div>
    </form>
</div>
</div>
{include file='user/footer.tpl'}
