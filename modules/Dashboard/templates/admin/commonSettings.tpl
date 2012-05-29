{* purpose of this template: show output of common settings action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-commonsettings dashboard-commonsettings">
{gt text='Common settings' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Common settings'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/commonSettings.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/commonSettings.tpl</em> or <em>/config/templates/Dashboard/admin/commonSettings.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
