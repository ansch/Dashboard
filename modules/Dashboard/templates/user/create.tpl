{* purpose of this template: show output of create action in user area *}
{include file='user/header.tpl'}
<div class="dashboard-create dashboard-create">
{gt text='Create' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/user/create.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/user/create.tpl</em> or <em>/config/templates/Dashboard/user/create.tpl</em>.</p>

</div>
</div>
{include file='user/footer.tpl'}
