{* purpose of this template: show output of change plugins state action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-changepluginsstate dashboard-changepluginsstate">
{gt text='Change plugins state' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Change plugins state'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/changePluginsState.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/changePluginsState.tpl</em> or <em>/config/templates/Dashboard/admin/changePluginsState.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
