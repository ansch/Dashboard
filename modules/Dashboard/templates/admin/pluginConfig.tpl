{* purpose of this template: show output of plugin config action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-pluginconfig dashboard-pluginconfig">
{gt text='Plugin config' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Plugin config'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/pluginConfig.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/pluginConfig.tpl</em> or <em>/config/templates/Dashboard/admin/pluginConfig.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
