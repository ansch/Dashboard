{* purpose of this template: show output of default config action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-defaultconfig dashboard-defaultconfig">
{gt text='Default config' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Default config'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/defaultConfig.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/defaultConfig.tpl</em> or <em>/config/templates/Dashboard/admin/defaultConfig.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
