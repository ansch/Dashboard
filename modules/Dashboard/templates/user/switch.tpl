{* purpose of this template: show output of switch action in user area *}
{include file='user/header.tpl'}
<div class="dashboard-switch dashboard-switch">
{gt text='Switch' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/user/switch.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/user/switch.tpl</em> or <em>/config/templates/Dashboard/user/switch.tpl</em>.</p>

</div>
</div>
{include file='user/footer.tpl'}
