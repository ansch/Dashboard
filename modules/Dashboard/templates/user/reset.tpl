{* purpose of this template: show output of reset action in user area *}
{include file='user/header.tpl'}
<div class="dashboard-reset dashboard-reset">
{gt text='Reset' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/user/reset.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/user/reset.tpl</em> or <em>/config/templates/Dashboard/user/reset.tpl</em>.</p>

</div>
</div>
{include file='user/footer.tpl'}
